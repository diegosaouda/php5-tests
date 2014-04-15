<?php
require_once('../../vendor/autoload.php');
require_once('Calculator.php');

$autodiscover = new Zend\Soap\AutoDiscover();
$autodiscover->setClass('Calculator')
    ->setUri('http://local.php5/soap/server.php');

//gerando wsdl
$wsdl = $autodiscover->generate();
$wsdl->dump('server.wsdl');