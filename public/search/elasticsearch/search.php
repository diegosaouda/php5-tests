<?php
/**
 * Indexando documentos
 */

require_once(__DIR__ . '/../../doctrine/bootstrap.php');

$elasticClient = new Elasticsearch\Client();

$params = array();
$params['index'] = 'elicitacao';
$params['type']  = 'mensagem';
$params['size'] = 50;

//$params['body']['match_phrase']['nm_item']['query'] = 'GELÉIA MOCOTÓ';
$params['body']['query']['match']['mensagem'] = 'foi';
$params['body']['fields'] = array('_source', '_timestamp');


$queryResponse = $elasticClient->search($params);

$hits = $queryResponse['hits']['hits'];
unset($queryResponse['hits']['hits']);

print_r($queryResponse);
print_r($hits);




