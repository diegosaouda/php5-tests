<?php

/**
 * Indexando documentos
 */

require_once(__DIR__ . '/../../doctrine/bootstrap.php');

$elasticClient = new Elasticsearch\Client();

$qb = (new DoctrineFactory())->createQueryBuilder();

$qb->select('e.*')
    ->from('tb_carga_orgao', 'e');

$uniq = 0;
$i = 0;

while(true) {
    $qb->setFirstResult($i)
        ->setMaxResults(1000);

    $documents = $qb->execute()->fetchAll();
    if (! $documents) {
        break;
    }

    foreach ($documents as $document) {

        $optionsIndex = array();
        $optionsIndex['body']  = $document;
        $optionsIndex['index'] = 'carga_orgao';
        $optionsIndex['type']  = 'base';
        $optionsIndex['id']    = ++$uniq;

        $elasticClient->index($optionsIndex);
    }

    echo "index: {$i}";
    echo "\n";

    $i += 1000;
}



