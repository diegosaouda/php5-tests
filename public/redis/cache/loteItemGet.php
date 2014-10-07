<?php

require_once(__DIR__ . '/../../bootstrap.php');
require_once(__DIR__ . '/doctrine.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

$store = 'cn:tb_lote_item';
$key = "43943"."93";


var_dump($redis->hget($store, $key));