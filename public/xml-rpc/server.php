<?php

require_once('../../vendor/autoload.php');
require_once('Calculator.php');

$server = new Zend\XmlRpc\Server();

if (!Zend\XmlRpc\Server\Cache::get('xml-rpc.cache', $server)) {
    $server->setClass('Calculator', 'calc');
    Zend\XmlRpc\Server\Cache::save('xml-rpc.cache', $server);
}

$server->handle();

/*
file_put_contents('/tmp/xml.rpc', "method" . $server->getRequest()->getMethod() . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/json.rpc', "params" . $server->getRequest()->getParams() . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/json.rpc', "toJson" . print_r($server->getRequest()->toJson()) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/xml.rpc', "SERVER" . print_r($_SERVER, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/xml.rpc', "POST" . print_r($_POST, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/xml.rpc', "GET" . print_r($_GET, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/xml.rpc', "COOKIE" . print_r($_COOKIE, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/xml.rpc', "php:input" . file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/xml.rpc', "php:output" . file_get_contents('php://output') . PHP_EOL, FILE_APPEND);
*/