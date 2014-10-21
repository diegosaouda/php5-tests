<?php

require_once(__DIR__ . '/../../doctrine/bootstrap.php');


$client = new Elasticsearch\Client();

$searchParams['index'] = 'elicitacao';
$searchParams['type']  = 'mensagem';
$searchParams['size']  = 1;

$searchParams['body']['query']['match']['mensagem'] = 'informado';
$searchParams['body']['fields'] = array('_source', '_timestamp');
$searchParams['sort'] = array('_timestamp:desc');

$retDoc = $client->search($searchParams);
var_dump($retDoc);
