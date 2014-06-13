<?php

$mongo = new MongoClient();
$db = $mongo->datateste;

$collection = $db->usuarios;

$usuarios = $collection->find();
foreach ($usuarios as $usuario) {
    $collection->remove(array('_id' => $usuario['_id']));
    var_dump($usuario);
}
