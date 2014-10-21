<?php

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Zend\File\Transfer\Transfer;
use Zend\Stdlib\Parameters;

//flexivel
$files = new Parameters($_FILES);
$upload = new Transfer();
$upload->setDestination(__DIR__);

//var_dump($upload->getDestination());
//var_dump($files);

foreach ($files as $file => $info) {
    var_dump($upload->isUploaded($file));
    var_dump($upload->isValid($file));
    var_dump($upload->receive($file));
}

//modo simples
//$upload = new Transfer();
//$upload->setDestination(__DIR__);
//$upload->receive('nome_do_campo_file_do_html');