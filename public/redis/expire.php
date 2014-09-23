<?php

/**
 * EXPIRE , EXPIREAT , TTL, and PERSIST
 *
 * Most likely, when you set a key you don’t want it to be saved forever because after a certain period of time it’s not likely to be relevant anymore. You’ll need to update its value or delete it to reduce memory usage for better performance. Redis offers four commands that let you handle data persistence easily.
 *
 * EXPIRE – sets an expiration timeout (in seconds) for a key after which it and its value will be deleted.
 * EXPIREAT – sets and expiration time using a unix timestamp that represents when the key and value will be deleted.
 * TTL – gets the remaining time left to live for a key with an expiration.
 * PERSIST – removes the expiration on the given key.
 */

require_once(__DIR__ . '/../bootstrap.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

// set the expiration for next week
$redis->set("expire in 1 week", "I have data for a week");
$redis->expireat("expire in 1 week", strtotime("+1 week"));
$ttl = $redis->ttl("expire in 1 week"); // will be 604800 seconds

// set the expiration for one hour
$redis->set("expire in 1 hour", "I have data for an hour");
$redis->expire("expire in 1 hour", 3600);
$ttl = $redis->ttl("expire in 1 hour"); // will be 3600 seconds

// never expires
$redis->set("never expire", "I want to leave forever!");