<?php
require_once('../../vendor/autoload.php');
require_once('Calculator.php');
//ini_set("soap.wsdl_cache_enabled", 0);
//ini_set('soap.wsdl_cache_ttl', '0');

switch (isset($_GET['wsdl'])) {
    //so cai aqui se o cache estiver espirado ou estiver sem cache,
    //se nao cai so uma vez
    case true:
        $autodiscover = new Zend\Soap\AutoDiscover();
        $autodiscover->setClass('Calculator')
            ->setUri('http://local.php5/soap/server.php');
        $wsdl = $autodiscover->generate();
        //$wsdl->dump('cache.wsdl'); grava em arquivo, mas se o cache estiver habilitado nem precisa
        echo $wsdl->toXML();
        break;

    case false:
        $soap = new Zend\Soap\Server('http://local.php5/soap/server.php?wsdl');
        $soap->setClass('Calculator');
        $soap->setWSDLCache(true);
        $soap->handle();

        break;
}







//file_put_contents('/tmp/soap', "SERVER" . print_r($_SERVER, true) . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/soap', "POST" . print_r($_POST, true) . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/soap', "GET" . print_r($_GET, true) . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/soap', "COOKIE" . print_r($_COOKIE, true) . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/soap', "php:input" . file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
//file_put_contents('/tmp/soap', "php:output" . file_get_contents('php://output') . PHP_EOL, FILE_APPEND);
