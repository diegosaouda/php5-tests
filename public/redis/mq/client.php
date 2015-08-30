<?php

require_once(__DIR__ . '/../../bootstrap.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

for ($i = 0; $i <= 9999; $i++) {
	$redis->rpush('queue', 'valor: ' . $i);
}
