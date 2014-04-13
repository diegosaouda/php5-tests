<?php
require_once('../../vendor/autoload.php');

$client = new Zend\Soap\Client('http://local.php5/soap/calc.wsdl');
$client->setHttpLogin('root');
$client->setHttpPassword('dsaouda');

var_dump($client->call('multiply', array('10','2')));
var_dump($client->call('add', array('10','2')));
var_dump($client->add(1,2));
var_dump($client->getFunctions());