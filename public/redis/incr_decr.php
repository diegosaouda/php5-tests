<?php

require_once(__DIR__ . '/../bootstrap.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

echo $redis->incr('article');
echo "\n";
echo $redis->incrby('article2', 5);

echo "\n";
echo "\n";

echo $redis->decr('article3');
echo "\n";
echo $redis->decrby('article4', 5);