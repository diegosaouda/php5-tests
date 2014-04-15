<?php
require_once('../../vendor/autoload.php');
require_once('Calculator.php');

//ini_set("soap.wsdl_cache_enabled", 0);
//ini_set('soap.wsdl_cache_ttl', 0);

$soap = new Zend\Soap\Server('http://local.php5/soap/server.wsdl');
$soap->setClass('Calculator');
$soap->setWSDLCache(true);
$soap->handle();