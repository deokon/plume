<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Str;
use ReflectionClass;

$componentsDir = __DIR__ . '/../src/View/Components';
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($componentsDir));

$inconsistent = [];

foreach ($files as $file) {
    if ($file->getExtension() !== 'php') continue;
    if ($file->isDir()) continue;

    $path = substr($file->getPathname(), strlen($componentsDir) + 1);
    $classPath = str_replace(['/', '.php'], ['\\', ''], $path);
    $className = "deokon\\Plume\\View\\Components\\" . $classPath;

    if (!class_exists($className)) continue;

    $reflector = new ReflectionClass($className);
    if ($reflector->isAbstract()) continue;

    $constructor = $reflector->getConstructor();
    if ($constructor) {
        foreach ($constructor->getParameters() as $param) {
            $name = $param->getName();
            if ($name !== Str::camel($name)) {
                $inconsistent[$className][] = $name;
            }
        }
    }
}

if (count($inconsistent) > 0) {
    echo "Found inconsistent props (not camelCase):\n";
    foreach ($inconsistent as $class => $props) {
        echo "$class: " . implode(', ', $props) . "\n";
    }
    exit(1);
} else {
    echo "All props are camelCase.\n";
    exit(0);
}