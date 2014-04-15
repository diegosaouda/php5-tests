<?php
require_once('../../../../../vendor/autoload.php');
use Guzzle\Http\Client;


$client = new Client('http://local.php5/auth/http/custom/server/security.php');
$post = $client->post();
$post->setAuth('root', 'dsaouda', 'Digest');
$post->addHeader('X-Private-Key', base64_encode(file_get_contents('private_key.pem')));


$response = $post->send();

echo 'Response';
//Zend\Debug\Debug::dump($response->toString(), 'response');
Zend\Debug\Debug::dump($response->getRawHeaders(), 'headers');
Zend\Debug\Debug::dump($response->getStatusCode(), 'statusCode');

echo '<h2>Result</h2>';
echo '<pre>';
echo $response->getBody();