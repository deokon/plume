<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Str;
use ReflectionClass;

$baseDir = realpath(__DIR__ . '/..'); // The 'plume' directory
$serviceProvider = $baseDir . '/src/PlumeServiceProvider.php';
$viewsDir = $baseDir . '/resources/views/components-class';
$outputFile = $baseDir . '/plume-api.json';

if (!file_exists($serviceProvider)) {
    die("PlumeServiceProvider not found at $serviceProvider\n");
}

$content = file_get_contents($serviceProvider);
// Match Blade::component('plume::alias', \Class\Path::class)
// and Blade::component('plume::alias', Class::class)
preg_match_all("/Blade::component\('plume::(.*?)', (.*?)::class\)/", $content, $matches);

$aliases = [];
foreach ($matches[1] as $index => $alias) {
    $className = trim($matches[2][$index], '\\');
    // Handle relative classes if any (Plume uses full paths usually)
    if (!str_starts_with($className, 'deokon')) {
        $className = 'deokon\\Plume\\View\\Components\\' . $className;
    }
    $aliases[$className] = 'x-plume::' . $alias;
}

$components = [];

foreach ($aliases as $className => $tagName) {
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

    // Resolve View Path from Alias
    // Alias 'accordion.item' -> views/components-class/accordion-item.blade.php ?
    // Or maybe it matches the directory structure?
    // Let's guess based on common patterns in this project.
    $viewName = str_replace('.', '-', str_replace('x-plume::', '', $tagName));
    
    // Check nested form paths etc.
    $viewPath = $viewsDir . '/' . $viewName . '.blade.php';
    if (!file_exists($viewPath)) {
        // Try subfolder: 'form.input' -> form/input
        $subPath = str_replace('.', '/', str_replace('x-plume::', '', $tagName));
        $viewPath = $viewsDir . '/' . $subPath . '.blade.php';
    }

    $description = "No description provided.";
    if (file_exists($viewPath)) {
        $content = file_get_contents($viewPath);
        if (preg_match('/@description\s+(.*?)(\*\/|\n)/s', $content, $matches)) {
            $description = trim($matches[1]);
        }
    }

    $components[$tagName] = [
        'path' => 'plume' . str_replace($baseDir, '', $viewPath),
        'props' => $props,
        'description' => $description,
        'usage' => null,
        'doc_url' => 'https://plume.dennisokon.com/docs/' . basename($viewName)
    ];
}

$existing = file_exists($outputFile) ? json_decode(file_get_contents($outputFile), true) : ['components' => []];
$existing['components'] = $components; // Overwrite with truth from ServiceProvider
ksort($existing['components']);

file_put_contents($outputFile, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "Synced " . count($components) . " components from ServiceProvider to plume-api.json\n";