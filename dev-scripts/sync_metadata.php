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
                'default' => $default
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

    $description = "No description provided.";
    $usage = null;
    if (file_exists($viewPath)) {
        $viewContent = file_get_contents($viewPath);
        if (preg_match('/@description\s+(.+?)(?=\s*@|\s*--}})/s', $viewContent, $descMatch)) {
            $description = trim($descMatch[1]);
        }
        if (preg_match('/@usage\s*(.+?)(?=\s*@|\s*--}})/s', $viewContent, $usageMatch)) {
            $usage = trim($usageMatch[1]);
        }
        
        // Update Blade Header
        updateBladeHeader($viewPath, $tagName, $description, $props, $usage);
    }

    $components[$tagName] = [
        'path' => 'plume/' . str_replace($baseDir . '/', '', $viewPath),
        'props' => $props,
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
        if (preg_match('/@props\(\[\s*(.*?)\s*\]\)/s', $viewContent, $propBlock)) {
            foreach (explode("\n", $propBlock[1]) as $line) {
                $line = trim($line);
                if (preg_match("/\'(.+?)\'\s*=>\s*(.+?)(?:,|$)/", $line, $propMatch)) {
                    $key = trim($propMatch[1], "'\" ");
                    $default = trim($propMatch[2], "'\" ,");
                    $type = 'mixed';
                    if ($default === 'true' || $default === 'false') $type = 'bool';
                    if (is_numeric($default)) $type = 'int';
                    if ($default === '[]') $type = 'array';
                    $props[$key] = ['type' => $type, 'default' => $default];
                }
            }
        }

        $description = "No description provided.";
        $usage = null;
        if (preg_match('/@description\s+(.+?)(?=\s*@|\s*--}})/s', $viewContent, $descMatch)) {
            $description = trim($descMatch[1]);
        }
        if (preg_match('/@usage\s*(.+?)(?=\s*@|\s*--}})/s', $viewContent, $usageMatch)) {
            $usage = trim($usageMatch[1]);
        }

        // Update Blade Header
        updateBladeHeader($file->getPathname(), $tagName, $description, $props, $usage);

        $components[$tagName] = [
            'path' => 'plume/' . str_replace($baseDir . '/', '', $file->getPathname()),
            'props' => $props,
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
            $md .= "| `{$name}` | `{$info['type']}` | `{$info['default']}` | - |\n";
        }
        $md .= "\n";
    }

    if ($data['usage']) {
        $md .= "## Usage\n\n";
        $md .= "```blade\n" . $data['usage'] . "\n```\n";
    }

    file_put_contents($mdFile, $md);
}
echo "Updated " . count($components) . " documentation files in plume/docs/\n";
echo "Synced total " . count($components) . " components.\n";

/**
 * Updates or injects the documentation header in a Blade file.
 */
function updateBladeHeader($path, $tagName, $description, $props, $usage) {
    $content = file_get_contents($path);
    
    $header = "{{--\n";
    $header .= "@component {$tagName}\n";
    $header .= "@description {$description}\n";
    
    foreach ($props as $name => $info) {
        $header .= "@prop {$info['type']} \\\${$name} (Default: {$info['default']})\n";
    }
    
    if ($usage) {
        $header .= "@usage\n{$usage}\n";
    }
    $header .= "--}}\n";

    // Check if a header already exists
    if (preg_match('/^{{--.*?--}}/s', $content, $match)) {
        // Only update if it changed to avoid unnecessary git noise
        if ($match[0] !== $header) {
            $newContent = preg_replace('/^{{--.*?--}}/s', trim($header), $content);
            file_put_contents($path, $newContent);
        }
    } else {
        // Prepend new header
        file_put_contents($path, $header . $content);
    }
}

