<?php
require_once('../../vendor/autoload.php');

$httpClient = new Zend\Http\Client();
$httpClient->setAdapter(new Zend\Http\Client\Adapter\Curl());

$httpClient->setUri('http://www.globo.com');
$resposne = $httpClient->send();
var_dump($resposne->getCookie());
var_dump($resposne->getHeaders());

$content = $resposne->getBody();


$crawler = new Symfony\Component\DomCrawler\Crawler($content);
foreach ($crawler->filter('div.chamada-principal')->filter('a') as $c) {
    $a = new Symfony\Component\DomCrawler\Crawler($c);
    var_dump($a->attr('href'));

}


foreach ($crawler as $domElement) {
    var_dump($domElement);
}