<?php
require_once('../../vendor/autoload.php');
require_once('Calculator.php');

$config = array(
    'accept_schemes' => 'basic',
    'realm'          => 'root',
    'nonce_timeout'  => 3600,
);

$auth = new Zend\Authentication\Adapter\Http($config);
$auth->setBasicResolver(new Zend\Authentication\Adapter\Http\FileResolver('auth.txt'));
$auth->setRequest(new Zend\Http\Request());
$auth->setResponse(new Zend\Http\Response());
$result = $auth->authenticate();
$result->isValid();
die;

if (isset($_GET['wsdl'])) {
    $autodiscover = new Zend\Soap\AutoDiscover();
    $autodiscover->setClass('Calculator')
        ->setUri('http://local.php5/soap/server.php');
    echo $autodiscover->toXml();

} else {



    $soap = new Zend\Soap\Server('http://local.php5/soap/server.php?wsdl');
    $soap->setClass('Calculator');
    $soap->setWSDLCache(true);


    $soap->handle();
}

file_put_contents('/tmp/soap', "SERVER" . print_r($_SERVER, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/soap', "POST" . print_r($_POST, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/soap', "GET" . print_r($_GET, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/soap', "COOKIE" . print_r($_COOKIE, true) . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/soap', "php:input" . file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
file_put_contents('/tmp/soap', "php:output" . file_get_contents('php://output') . PHP_EOL, FILE_APPEND);
