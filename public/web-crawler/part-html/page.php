<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

use Symfony\Component\DomCrawler\Crawler;

$crawler = new Crawler(file_get_contents('page.html'));

foreach ($crawler->filter('tr') as $tr) {

    foreach($tr->childNodes as $childNodes) {
        
    }


}