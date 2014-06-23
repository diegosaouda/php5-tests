<?php

require_once __DIR__ . '/../../bootstrap.php';

$connection = (new DoctrineFactory())->getConnection();

$connection->beginTransaction();
$connection->executeQuery('Lock Table tb_carga_licitacao');
$qb = $connection->createQueryBuilder();

$qb->select('cl.id_carga_licitacao
    , cl.nu_licitacao
    , cl.nu_orgao
    , cl.nu_modalidade')

    ->from('tb_carga_licitacao', 'cl')
    ->setMaxResults(5);

$stmt = $qb->execute();

while($result = $stmt->fetch()) {
    print_r($result);
    sleep(2);
}

$connection->commit();
echo "commit";

echo "Espera";
sleep(10);
