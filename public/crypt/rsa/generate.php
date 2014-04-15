<?php
require_once('../../../vendor/autoload.php');
use Zend\Crypt\PublicKey\RsaOptions;

$rsaOptions = new RsaOptions(array(
'pass_phrase' => 'test'
));

$rsaOptions->generateKeys(array(
'private_key_bits' => 2048,
));

file_put_contents('private_key.pem', $rsaOptions->getPrivateKey());
file_put_contents('public_key.pub', $rsaOptions->getPublicKey());