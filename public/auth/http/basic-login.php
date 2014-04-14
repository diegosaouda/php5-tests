<?php
require_once('../../../vendor/autoload.php');

$client = new Zend\Http\Client();

$client->setAuth('root','dsaouda');
$client->setUri('http://local.php5/auth/http/basic.php');
//$client->encodeAuthHeader('root', 'dsaouda');


$response = $client->send();
var_dump($response->getStatusCode());
echo($response->getBody());
