<?php
require_once('../../../../vendor/autoload.php');

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

$result = $auth->authenticate();
if (!$result->isValid()) {
    header($response->renderStatusLine());
    header($response->getHeaders()->toString());
    die;
}

echo "Autenticou!!!";
echo '<hr />';

Zend\Debug\Debug::dump($request->getHeaders()->toString(), 'headers');
Zend\Debug\Debug::dump($request->getMethod(), 'method');
Zend\Debug\Debug::dump($request->getContent(), 'content');
Zend\Debug\Debug::dump($request->getUri(), 'uri');
Zend\Debug\Debug::dump($request->getBasePath(), 'basePath');
Zend\Debug\Debug::dump($request->getBaseUrl(), 'baseUrl');
Zend\Debug\Debug::dump($request->getCookie(), 'cookie');
Zend\Debug\Debug::dump($request->getPost()->toString(), 'post');
Zend\Debug\Debug::dump($request->getQuery()->toString(), 'query');
Zend\Debug\Debug::dump($request->getMetadata(), 'metadata');
Zend\Debug\Debug::dump($request->getEnv()->toString(), 'env');