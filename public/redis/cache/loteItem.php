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

$qbPsql = $psqlConnection->createQueryBuilder()
    ->select('e.id_carga_licitacao, e.nu_item, e.nu_lote_item')
    ->from('tb_carga_lote_item','e');

$stmt = $qbPsql->execute();
while($result = $stmt->fetch()) {
    $idCargaLicitacao = $result['id_carga_licitacao'];
    $nuItem = $result['nu_item'];
    $nuLoteItem = $result['nu_lote_item'];

    $store = 'cn:tb_lote_item';
    $key = $idCargaLicitacao.$nuItem;

    if (!$redis->hexists($store, $key)) {
        $redis->hset($store, $key, $nuLoteItem);
    }

    $count++;
}

$tempoFim = microtime(true);

echo "\n";
echo sprintf("Tempo: %.5f", ($tempoFim - $tempoInicio));
echo "\n";
echo "Total valores:" . $count;
echo "\n";