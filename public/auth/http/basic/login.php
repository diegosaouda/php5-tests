<?php
require_once('../../../../vendor/autoload.php');

$client = new Zend\Http\Client();
$client->setMethod('POST');
$client->setAuth('root','dsaouda');
$client->setUri('http://local.php5/auth/http/basic/security.php');

$response = $client->send();

echo 'Response';
//Zend\Debug\Debug::dump($response->toString(), 'response');
Zend\Debug\Debug::dump($response->getHeaders()->toString(), 'headers');
Zend\Debug\Debug::dump($response->getStatusCode(), 'statusCode');

echo '<h2>Result</h2>';
echo $response->getBody();

