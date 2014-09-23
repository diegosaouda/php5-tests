<?php

/**
 * HSET, HGET and HGETALL, HINCRBY, and HDEL
 *
 * These commands are used to work with Redis’ hash data type:
 *
 * HSET – sets the value for a key on the the hash object.
 * HGET – gets the value for a key on the hash object.
 * HINCRBY – increment the value for a key of the hash object with a specified value.
 * HDEL – remove a key from the object.
 * HGETALL – get all keys and data for a object.
 */

require_once(__DIR__ . '/../bootstrap.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

$redis->hset("taxi_car", "brand", "Toyota");
$redis->hset("taxi_car", "model", "Yaris");
$redis->hset("taxi_car", "license number", "RO-01-PHP");
$redis->hset("taxi_car", "year of fabrication", 2010);
$redis->hset("taxi_car", "nr_starts", 0);

$redis->hincrby("taxi_car", "nr_starts", 1);

print_r($redis->hgetall("taxi_car"));