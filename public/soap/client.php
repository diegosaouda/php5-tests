<?php
require_once('../../vendor/autoload.php');

//ini_set("soap.wsdl_cache_enabled", 0);
//ini_set('soap.wsdl_cache_ttl', '0');

$client = new Zend\Soap\Client('http://local.php5/soap/server.wsdl');

Zend\Debug\Debug::dump($client->call('fatorial', 5), 'fatorial');
Zend\Debug\Debug::dump($client->call('potencia', array(2, 5)), 'potencia');
