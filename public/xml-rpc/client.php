<?php

require_once('../../vendor/autoload.php');

//server
$uri = 'http://local.php5/xml-rpc/server.php';
$client = new Zend\XmlRpc\Client($uri);

Zend\Debug\Debug::dump(
    $client->call('calc.add', array(1,2)),
    'method::add'
);

Zend\Debug\Debug::dump(
    $client->call('calc.multiply', array(10,40)),
    'method::multiply'
);