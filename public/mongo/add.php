<?php

$options = array(
    'username' => 'user',
    'password' => 'senha',
    'db' => 'admin',
    'connect' => true
);

$mongo = new MongoClient('mongodb://192.168.9.99:27017', $options);
$db = $mongo->datateste;


$collection = $db->usuarios;

// add a record
$document = array( 'nome' => 'Diego Saouda' );
$collection->insert($document);

$document = array( 'nome' => 'Aline Saouda' );
$collection->insert($document);