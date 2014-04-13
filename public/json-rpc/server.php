<?php
require_once('../../vendor/autoload.php');
require_once('Calculator.php');
$server = new Zend\Json\Server\Server();

if (!Zend\Json\Server\Cache::get('json-rpc.cache', $server)) {

    // Indicate what functionality is available:
    $server->setClass('Calculator', 'calc');
    Zend\Json\Server\Cache::save('json-rpc.cache', $server);

    if ('GET' == $_SERVER['REQUEST_METHOD']) {
        // Indicate the URL endpoint, and the JSON-RPC version used:
        $server->setTarget('http://local.php5/json-rpc/server.php')
            ->setEnvelope(Zend\Json\Server\Smd::ENV_JSONRPC_2);

        // Grab the SMD
        $smd = $server->getServiceMap();

        // Return the SMD to the client
        header('Content-Type: application/json');
        echo $smd;
        return;
    }
}


// Handle the request:
$server->handle();
/*
file_put_contents('/tmp/json.rpc', "method" . $server->getRequest()->getMethod() . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/json.rpc', "params" . $server->getRequest()->getParams() . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/json.rpc', "toJson" . print_r($server->getRequest()->toJson()) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/json.rpc', "SERVER" . print_r($_SERVER, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/json.rpc', "POST" . print_r($_POST, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/json.rpc', "GET" . print_r($_GET, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/json.rpc', "COOKIE" . print_r($_COOKIE, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/json.rpc', "php:input" . file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/json.rpc', "php:output" . file_get_contents('php://output') . PHP_EOL, FILE_APPEND);
*/