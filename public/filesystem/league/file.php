<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

$file = new \League\Flysystem\Adapter\Local(__DIR__);

print_r($file->getPathPrefix());
print_r($file->getMimetype('/teste.php'));
var_dump($file->has('teste.php'));
print_r($file->getSize('teste.php'));

echo "\n\n\nLista (Recursive): \n";
print_r($file->listContents('../..', true));
