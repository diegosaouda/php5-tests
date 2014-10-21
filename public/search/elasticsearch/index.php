<?php

/**
 * Indexando documentos
 */

require_once(__DIR__ . '/../../doctrine/bootstrap.php');

$id = 'id_carga_licitacao';
$index = 'tb_carga_licitacao';

$elasticClient = new Elasticsearch\Client();

$qb = (new DoctrineFactory())->createQueryBuilder();

$qb->select('e.*')->from($index, 'e');

for ($firstResult = 0; ;$firstResult+=1000) {
    $qb->setFirstResult($firstResult)
        ->setMaxResults(1000);

    $documents = $qb->execute()->fetchAll();
    if (! $documents) {
        break;
    }

    echo "index: {$firstResult}";
    echo "\n";

    foreach ($documents as $document) {
        unset($document['nm_item_busca']);

        $optionsIndex = array();
        $optionsIndex['body']  = $document;
        $optionsIndex['index'] = 'elicitacao';
        $optionsIndex['type']  = $index;
        $optionsIndex['id']    = $document[$id];

        $elasticClient->index($optionsIndex);
        echo ".";
    }
    echo "\n";
}
