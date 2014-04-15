<?php
require_once('../../../../../vendor/autoload.php');

use Zend\Authentication\Adapter\Http\FileResolver;
use Zend\Authentication\Adapter\Http;
use Zend\Http\PhpEnvironment\Request;
use Zend\Http\PhpEnvironment\Response;

//gerar usuário e senha do digest
//echo md5('root:securityGroup:dsaouda'); die;

$request = new Request();
$response = new Response();

$auth = new Http([
    'accept_schemes' => 'digest',
    'realm'          => 'securityGroup',
    'digest_domains' => '/',
    'nonce_timeout'  => 3600,
]);

$auth->setDigestResolver(new FileResolver('pass.txt'));
$auth->setRequest($request);
$auth->setResponse($response);

//valida authentication digest
$result = $auth->authenticate();
if (!$result->isValid()) {
    header($response->renderStatusLine());
    header($response->getHeaders()->toString());
    die;
}

//valida se chave privada foi enviada
$privateKey = $request->getHeader('X-Private-Key');
if (!$privateKey) {
    $response->setStatusCode(401);
    header($response->renderStatusLine());
    die;
}

try {
    //valida se chave privada é válida (test é a senha da chave privada)
    $private = new Zend\Crypt\PublicKey\Rsa\PrivateKey(base64_decode($privateKey->getFieldValue()), 'test');
    $public = Zend\Crypt\PublicKey\Rsa\PublicKey::fromFile('public_key.pub');

    if ($private->getPublicKey()->toString() !== $public->toString()) {
        throw new \Exception('Acesso não é permitido');
    }

} catch (\Exception $e) {
    $response->setStatusCode(401);
    header($response->renderStatusLine());
    die;
}

echo $request->getServer('HTTP_X_PRIVATE_KEY');
//autenticou!!!
var_dump($request->getServer()->toArray());