<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Str;
use ReflectionClass;

$baseDir = realpath(__DIR__ . '/..');
$serviceProvider = $baseDir . '/src/PlumeServiceProvider.php';
$viewsDir = $baseDir . '/resources/views';
$docsDir = $baseDir . '/docs';
$outputFile = $baseDir . '/plume-api.json';

if (!file_exists($serviceProvider)) {
    die("PlumeServiceProvider not found at $serviceProvider\n");
}

$content = file_get_contents($serviceProvider);
preg_match_all("/Blade::component\('plume::(.*?)', (.*?)::class\)/", $content, $matches);

$classAliases = [];
foreach ($matches[1] as $index => $alias) {
    $className = trim($matches[2][$index], '\\');
    if (!str_starts_with($className, 'deokon')) {
        $className = 'deokon\\Plume\\View\\Components\\' . $className;
    }
    $classAliases[$className] = 'x-plume::' . $alias;
}

$components = [];

// 1. Process Class-Based Components
foreach ($classAliases as $className => $tagName) {
    if (!class_exists($className)) {
        echo "Skipping $className (not found)\n";
        continue;
    }

    $reflector = new ReflectionClass($className);
    if ($reflector->isAbstract()) continue;

    $constructor = $reflector->getConstructor();
    $props = [];
    if ($constructor) {
        foreach ($constructor->getParameters() as $param) {
            $name = $param->getName();
            $t = $param->getType();
            $typeStr = 'mixed';
            if ($t) {
                $typeStr = method_exists($t, 'getName') ? $t->getName() : (string)$t;
            }
            
            $default = 'null';
            if ($param->isDefaultValueAvailable()) {
                $val = $param->getDefaultValue();
                if (is_string($val)) $default = "'$val'";
                elseif (is_bool($val)) $default = $val ? 'true' : 'false';
                elseif (is_null($val)) $default = 'null';
                elseif (is_array($val)) $default = '[]';
                else $default = (string) $val;
            }

            $props[$name] = [
                'type' => $typeStr,
                'default' => $default,
                'description' => '-'
            ];
        }
    }

    $alias = str_replace('x-plume::', '', $tagName);
    $viewName = str_replace('.', '-', $alias);
    $viewPath = $viewsDir . '/components-class/' . $viewName . '.blade.php';
    
    if (!file_exists($viewPath)) {
        $subPath = str_replace('.', '/', $alias);
        $candidate = $viewsDir . '/components-class/' . $subPath . '.blade.php';
        if (file_exists($candidate)) {
            $viewPath = $candidate;
        } else {
            $candidate = $viewsDir . '/components-class/' . $subPath . '/index.blade.php';
            if (file_exists($candidate)) {
                $viewPath = $candidate;
            }
        }
    }

    $docData = parseBladeDocBlock($viewPath);
    
    $description = $docData['description'] ?: "No description provided.";
    $usage = $docData['usage'];

    foreach ($props as $name => &$info) {
        if (isset($docData['props'][$name])) {
            $info['description'] = $docData['props'][$name];
        }
    }

    $components[$tagName] = [
        'path' => 'plume/' . str_replace($baseDir . '/', '', $viewPath),
        'props' => $props,
        'slots' => $docData['slots'],
        'description' => $description,
        'usage' => $usage,
        'doc_url' => 'https://plume.dennisokon.com/docs/' . str_replace('.', '-', $alias)
    ];
}

// 2. Process Anonymous Components
if (file_exists($viewsDir . '/components')) {
    $anonFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsDir . '/components'));
    foreach ($anonFiles as $file) {
        if ($file->isDir() || $file->getExtension() !== 'blade') continue;

        $relativePath = str_replace($viewsDir . '/components/', '', $file->getPathname());
        $alias = str_replace(['/index.blade.php', '.blade.php', '/'], ['', '', '.'], $relativePath);
        $tagName = 'x-plume::' . $alias;

        if (isset($components[$tagName])) continue;

        $viewContent = file_get_contents($file->getPathname());
        $props = [];
        if (preg_match('/@props\(\s*(.*?)\s*\)/s', $viewContent, $propBlock)) {
            foreach (explode("\n", $propBlock[1]) as $line) {
                $line = trim($line);
                if (preg_match("/\'(.+?)\'\s*=>\s*(.+?)(?:,|$)/", $line, $propMatch)) {
                    $key = trim($propMatch[1], "'\" ");
                    $default = trim($propMatch[2], "'\" ,");
                    $type = 'mixed';
                    if ($default === 'true' || $default === 'false') $type = 'bool';
                    if (is_numeric($default)) $type = 'int';
                    if ($default === '[]') $type = 'array';
                    $props[$key] = [
                        'type' => $type, 
                        'default' => $default,
                        'description' => '-'
                    ];
                }
            }
        }

        $docData = parseBladeDocBlock($file->getPathname());
        $description = $docData['description'] ?: "No description provided.";
        $usage = $docData['usage'];

        foreach ($props as $name => &$info) {
            if (isset($docData['props'][$name])) {
                $info['description'] = $docData['props'][$name];
            }
        }

        $components[$tagName] = [
            'path' => 'plume/' . str_replace($baseDir . '/', '', $file->getPathname()),
            'props' => $props,
            'slots' => $docData['slots'],
            'description' => $description,
            'usage' => $usage,
            'doc_url' => 'https://plume.dennisokon.com/docs/' . str_replace('.', '-', $alias)
        ];
    }
}

ksort($components);

// 3. Update plume-api.json
file_put_contents($outputFile, json_encode(['components' => $components], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "Updated plume-api.json\n";

// 4. Update plume/docs/*.md
if (!file_exists($docsDir)) {
    mkdir($docsDir, 0755, true);
}

foreach ($components as $tagName => $data) {
    $slug = str_replace('.', '-', str_replace('x-plume::', '', $tagName));
    $mdFile = $docsDir . '/' . $slug . '.md';
    
    $title = Str::title(str_replace('-', ' ', $slug));
    $md = "# {$title}\n\n";
    $md .= $data['description'] . "\n\n";
    
    if (!empty($data['props'])) {
        $md .= "## Properties\n\n";
        $md .= "| Prop | Type | Default | Description |\n";
        $md .= "| :--- | :--- | :--- | :--- |\n";
        foreach ($data['props'] as $name => $info) {
            $md .= "| `{$name}` | `{$info['type']}` | `{$info['default']}` | {$info['description']} |\n";
        }
        $md .= "\n";
    }

    if (!empty($data['slots'])) {
        $md .= "## Slots\n\n";
        $md .= "| Slot | Description |\n";
        $md .= "| :--- | :--- |\n";
        foreach ($data['slots'] as $name => $desc) {
            $md .= "| `{$name}` | {$desc} |\n";
        }
        $md .= "\n";
    }

    if ($data['usage']) {
        $md .= "## Usage\n\n";
        if (str_contains($data['usage'], '```') || str_starts_with($data['usage'], '#')) {
            $md .= $data['usage'] . "\n";
        } else {
            $md .= "```blade\n" . $data['usage'] . "\n```\n";
        }
    }

    file_put_contents($mdFile, $md);
}
echo "Updated " . count($components) . " documentation files in plume/docs/\n";
echo "Synced total " . count($components) . " components.\n";

/**
 * Parses the custom DocBlock in a Blade file.
 */
function parseBladeDocBlock($path) {
    $data = [
        'description' => '',
        'usage' => '',
        'props' => [],
        'slots' => []
    ];

    if (!file_exists($path)) return $data;

    $content = file_get_contents($path);
    
    // Find the first occurrence of {{-- and the FIRST occurrence of --}} after it
    $startMarker = '{{--';
    $endMarker = '--}}';
    
    $startPos = strpos($content, $startMarker);
    if ($startPos === false) return $data;
    
    $endPos = strpos($content, $endMarker, $startPos);
    if ($endPos === false) return $data;

    $block = trim(substr($content, $startPos + strlen($startMarker), $endPos - ($startPos + strlen($startMarker))));
    
    // Improved logic: Identify all @tags and their positions
    $tags = ['description', 'usage', 'prop', 'component', 'slot'];
    $tagPositions = [];
    
    foreach ($tags as $tag) {
        $pattern = '/^@' . $tag . '/m';
        if (preg_match_all($pattern, $block, $matches, PREG_OFFSET_CAPTURE)) {
            foreach ($matches[0] as $matchInfo) {
                $tagPositions[] = [
                    'tag' => $tag,
                    'pos' => $matchInfo[1]
                ];
            }
        }
    }
    
    // Sort positions to process in order
    usort($tagPositions, fn($a, $b) => $a['pos'] <=> $b['pos']);
    
    for ($i = 0; $i < count($tagPositions); $i++) {
        $current = $tagPositions[$i];
        $start = $current['pos'] + strlen($current['tag']) + 1; // +1 for the @
        $end = ($i + 1 < count($tagPositions)) ? $tagPositions[$i + 1]['pos'] : strlen($block);
        
        $value = trim(substr($block, $start, $end - $start));
        
        if ($current['tag'] === 'description') {
            $data['description'] = $value;
        } elseif ($current['tag'] === 'usage') {
            $data['usage'] = $value;
        } elseif ($current['tag'] === 'prop') {
            if (preg_match('/\$(\\w+)/', $value, $m)) {
                $name = $m[1];
                $parenPos = strpos($value, ')');
                if ($parenPos !== false) {
                    $data['props'][$name] = trim(substr($value, $parenPos + 1));
                }
            }
        } elseif ($current['tag'] === 'slot') {
            $parts = preg_split('/\s+/', $value, 2);
            $name = $parts[0] ?? 'default';
            $description = $parts[1] ?? '-';
            $data['slots'][$name] = $description;
        }
    }

    return $data;
}