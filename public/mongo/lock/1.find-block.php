<?php

require_once('Monitor.php');

$options = array(
    'username' => 'sapeerp',
    'password' => 'Forseti2408',
    'db' => 'admin',
    'connect' => true
);

$mongo = new MongoClient('mongodb://192.168.9.99:27017', $options);
$monitor = new Monitor($mongo);

$monitor->begin('usuarios');

$db = $mongo->datateste;

$collection = $db->usuarios;

foreach ($collection->find()->limit(10) as $usuario) {
    print_r($usuario);
    sleep(1);
}

$monitor->end('usuarios');
