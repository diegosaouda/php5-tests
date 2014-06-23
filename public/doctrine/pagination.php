<?php

require_once(__DIR__ . '/bootstrap.php');

$qb = (new DoctrineFactory())->createQueryBuilder();


$qb->select('cl.id_carga_licitacao
    , cl.nu_licitacao
    , cl.nu_orgao
    , cl.nu_modalidade')

    ->from('tb_carga_licitacao', 'cl');

for ($i=0; $i<100;$i+=10) {
    echo "First Result: " . $i;

    $qb->setFirstResult($i)
        ->setMaxResults(10);

    print_r($qb->execute()->fetchAll());
}