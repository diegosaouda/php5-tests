<?php

require_once __DIR__ . '/../bootstrap.php';

$qb = (new DoctrineFactory())->createQueryBuilder();


$qb->select('cl.id_carga_licitacao
    , cl.nu_licitacao
    , cl.nu_orgao
    , cl.nu_modalidade')

    ->from('tb_carga_licitacao', 'cl')
    ->setFirstResult(10)
    ->setMaxResults(20);

$stmt = $qb->execute();

while($result = $stmt->fetch()) {
    print_r($result);
    //usleep(1000 * 0.5);
    sleep(1);
}