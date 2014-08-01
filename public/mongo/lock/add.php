<?php

$options = array(
    'username' => 'sapeerp',
    'password' => 'Forseti2408',
    'db' => 'admin',
    'connect' => true
);

$mongo = new MongoClient('mongodb://192.168.9.99:27017', $options);
$db = $mongo->datateste;


$collection = $db->usuarios;

// add a record

$document = array( 'nome' => 'xpto', 'microtime' => microtime(true));
$collection->insert($document);

