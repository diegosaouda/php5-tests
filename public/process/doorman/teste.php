<?php

require_once(__DIR__ . '/../../../vendor/autoload.php');

use AsyncPHP\Doorman\Manager\ProcessManager;
use AsyncPHP\Doorman\Task\ProcessCallbackTask;

$manager = new ProcessManager();

$task = new ProcessCallbackTask(function () {

});

$manager->addTask($task);

Icicle\Loop\periodic(0, function () {
    print "\na." . microtime(true);
});

Icicle\Loop\periodic(0, function () {
    sleep(1);
    print "\nb." . microtime(true);
});

Icicle\Loop\periodic(0.1, function () use ($manager) {

});

Icicle\Loop\run();
