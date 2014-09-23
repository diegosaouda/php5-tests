<?php

require_once(__DIR__ . '/../bootstrap.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

var_dump($redis->exists('chave'));