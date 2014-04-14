<?php
require_once('../../vendor/autoload.php');

$client = new Zend\Soap\Client('http://local.php5/soap/server.php?wsdl');

var_dump($client->call('multiply', array('10','2')));
var_dump($client->call('add', array('10','2')));
var_dump($client->add(1,2));
var_dump($client->getFunctions());