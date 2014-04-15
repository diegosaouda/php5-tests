<?php
require_once('../../../vendor/autoload.php');


$private = Zend\Crypt\PublicKey\Rsa\PrivateKey::fromFile('private_key.pem', 'test');
$public = Zend\Crypt\PublicKey\Rsa\PublicKey::fromFile('public_key.pub');

var_dump($private->getPublicKey()->toString() === $public->toString());

echo $private->getPublicKey();
echo "<hr />";
echo $public;

