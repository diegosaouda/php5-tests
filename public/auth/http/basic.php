<?php
require_once('../../../vendor/autoload.php');
//header('WWW-Authenticate: Basic realm="My Realm"');
//header('HTTP/1.0 401 Unauthorized');
$config = array(
    'accept_schemes' => 'basic',
    'realm'          => 'My Web Site',
    'nonce_timeout'  => 3600,
);

$fileResolver = new Zend\Authentication\Adapter\Http\FileResolver('basic.txt');
$request = new Zend\Http\Request();
$response = new Zend\Http\Response();


$auth = new Zend\Authentication\Adapter\Http($config);
$auth->setBasicResolver($fileResolver);

$auth->setRequest($request);
$auth->setResponse($response);
$auth->challengeClient();

$result = $auth->authenticate();
var_dump($result->isValid());


var_dump($_SERVER);


