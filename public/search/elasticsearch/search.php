<?php

/**
 * Indexando documentos
 */

require_once(__DIR__ . '/../../doctrine/bootstrap.php');

$elasticClient = new Elasticsearch\Client();

$params = array();
$params['index'] = 'carga_orgao';
$params['type']  = 'base';

$filter = array();


$query = array();
$query['match']['nm_endereco'] = 'Rua Dr. Siqueira, 273 - Parque Dom Bosco - Campos dos Goitacazes (RJ)';

$params['body']['query']['filtered'] = array(
    "filter" => $filter,
    "query"  => $query
);



$queryResponse = $elasticClient->search($params);

$hits = $queryResponse['hits']['hits'];
unset($queryResponse['hits']['hits']);

print_r($queryResponse);
print_r($hits);




