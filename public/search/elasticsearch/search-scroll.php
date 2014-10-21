<?php

/**
 * Indexando documentos
 */

require_once(__DIR__ . '/../../doctrine/bootstrap.php');

$elasticClient = new Elasticsearch\Client();

$params = array();
$params['index'] = 'elicitacao';
$params['type']  = 'tb_carga_lote_item';
$params['scroll'] = '30s';
$params['size'] = 1000;
$params['search_type'] = 'scan';

//$params['body']['match_phrase']['nm_item']['query'] = 'GELÉIA MOCOTÓ';
$params['body']['query']['match']['txt_complementar'] = 'trena';
$params['body']['filter']['range']['id_carga_licitacao']['gte'] = 100000;

$docs = $elasticClient->search($params);
$scroll_id = $docs['_scroll_id'];

while(true) {

	$response = $elasticClient->scroll(
        	array(
            		"scroll_id" => $scroll_id,  
            		"scroll" => "30s"          
        	)
    	);

	if (count($response['hits']['hits']) > 0) {
		echo count($response['hits']['hits']) . PHP_EOL;
		$scroll_id = $response['_scroll_id'];
	} else {
		break;

	}
}
