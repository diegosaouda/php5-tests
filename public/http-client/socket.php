<?php
require_once('../../vendor/autoload.php');

$httpClient = new Zend\Http\Client();


$httpClient->setUri('https://login.globo.com/login/4728');
$resposne = $httpClient->send();
var_dump($resposne->getCookie());
var_dump($resposne->getHeaders());

$content = $resposne->getBody();
echo "<pre>";
echo htmlentities($content);