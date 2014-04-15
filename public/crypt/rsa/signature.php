<?php
require_once('../../../vendor/autoload.php');


use Zend\Crypt\PublicKey\Rsa;

$rsa = Rsa::factory(array(
    'private_key'   => 'private_key.pem',
    'pass_phrase'   => 'test',
    'binary_output' => false
));

$filename = 'generate.php';

$file = file_get_contents($filename);

$signature = $rsa->sign($file, $rsa->getOptions()->getPrivateKey());
$verify    = $rsa->verify($file, $signature, $rsa->getOptions()->getPublicKey());

if ($verify) {
    echo "The signature is OK\n";
    file_put_contents($filename . '.sig', $signature);
    echo "Signature save in $filename.sig\n";
} else {
    echo "The signature is not valid!\n";
}