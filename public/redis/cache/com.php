<?php

require_once(__DIR__ . '/../../bootstrap.php');
require_once(__DIR__ . '/doctrine.php');

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
));

$mysqlConnection = (new DoctrineFactory('mysql'))->getConnection();
$psqlConnection = (new DoctrineFactory('psql'))->getConnection();

$tempoInicio = microtime(true);

$count = 0;

$qbPsql = $psqlConnection->createQueryBuilder()
    ->select('e.id_pessoa')
    ->from('tb_carga_pessoa','e')
    ->andWhere('id_pessoa = :id_pessoa');

$stmtMysql = $mysqlConnection->createQueryBuilder()->select('e.*')->from('tb_cn_lic_pessoa','e')->execute();
while($result = $stmtMysql->fetch()) {
    if (!$redis->hexists('pessoa', $result['id_pessoa'])) {
        $idPessoa = $qbPsql->setParameter('id_pessoa', $result['id_pessoa'])->execute()->fetchColumn();
        $redis->hset('pessoa', $idPessoa, $result['nm_pessoa']);
    }
    $count++;
}

$tempoFim = microtime(true);

echo "\n";
echo sprintf("Tempo: %.5f", ($tempoFim - $tempoInicio));
echo "\n";
echo "Total valores:" . $count;
echo "\n";