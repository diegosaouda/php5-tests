<?php

/**
 * Indexando documentos
 */

require_once(__DIR__ . '/../../doctrine/bootstrap.php');

$elasticClient = new Elasticsearch\Client();

$params = array();
$params['index'] = 'elicitacao';
$params['type']  = 'tb_carga_lote_item';

$params['body']['match_phrase']['nm_item']['query'] = 'GELÉIA MOCOTÓ';

$queryResponse = $elasticClient->search($params);

$hits = $queryResponse['hits']['hits'];
unset($queryResponse['hits']['hits']);

print_r($queryResponse);
print_r($hits);




