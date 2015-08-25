<?php
$adapter = new PDO('mysql:host=192.168.9.99;port=3306;dbname=licitacao_carga_cn', 'root', 'Forseti2408');
$stmt = $adapter->prepare('SELECT * FROM tb_cn_lic_item', [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
$stmt->execute();

print_r($stmt->fetch( \PDO::FETCH_OBJ, \PDO::FETCH_ORI_ABS, 1));

