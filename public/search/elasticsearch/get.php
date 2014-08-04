<?php

/**
 * Indexando documentos
 */

require_once(__DIR__ . '/../../doctrine/bootstrap.php');

$elasticClient = new Elasticsearch\Client();

$optionsIndex = array();
$optionsIndex['index'] = 'catalogo_estrutura';
$optionsIndex['type']  = 'tipo1';
$optionsIndex['id']    = 1;

$documents = $elasticClient->get($optionsIndex);

foreach ($documents as $document) {
    print_r($document);
}



