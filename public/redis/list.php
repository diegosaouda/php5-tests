<?php

/**
 * LPUSH, RPUSH, LPOP, RPOP, LLEN, LRANGE
 *
 * These are the important commands for working with the list type in Redis. A Redis list is similar to an array in PHP, and offer a great support for implementing queues, stacks, or a capped collection of a certain number of elements.
 *
 * LPUSH – prepends element(s) to a list.
 * RPUSH – appends element(s) to a list.
 * LPOP – removes and retrieves the first element of a list.
 * RPOP – removes and retrieves the last element of a list.
 * LLEN – gets the length of a list.
 * LRANGE – gets elements from a list.
 */

require_once(__DIR__ . '/../bootstrap.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

$list = "PHP Frameworks List";
$redis->rpush($list, "Symfony 2");
$redis->rpush($list, "Symfony 1.4");
$redis->lpush($list, "Zend Framework");

echo "Number of frameworks in list: " . $redis->llen($list) . "\n";

$arList = $redis->lrange($list, 0, -1);
print_r($arList);


// the last entry in the list
echo $redis->rpop($list) . "\n";

// the first entry in the list
echo $redis->lpop($list) . "\n";