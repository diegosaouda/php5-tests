<?php
/**
 * Não funciona!!!
*/
require_once('../../vendor/autoload.php');

$http = new Zend\Http\Client();
$http->setAdapter(new Zend\Http\Client\Adapter\Curl());

$client = new Zend\Json\Server\Client('http://local.php5/json-rpc/server.php');
$client->setHttpClient($http);

Zend\Debug\Debug::dump(
    $client->call('calc.add', array(10,40)),
    'method::add'
);

Zend\Debug\Debug::dump(
    $client->call('calc.multiply', array(10,40)),
    'method::multiply'
);



