<?php

$mongo = new MongoClient();
$db = $mongo->datateste;

$collection = $db->usuarios;

// add a record
$document = array( 'nome' => 'Diego Saouda' );
$collection->insert($document);

$document = array( 'nome' => 'Aline Saouda' );
$collection->insert($document);