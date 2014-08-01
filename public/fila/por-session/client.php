<?php
require_once('../../../vendor/autoload.php');
use Guzzle\Http\Client;


$client = new Client('http://diego.saouda-php5-tests.dev-local/fila/por-session/server.php');
$post = $client->post();

$post->addCookie('PHPSESSID', 'gjimu9020po8akebrh6q08g9a1');
$post->addCookie('path', '/');

$response = $post->send();
echo $response->getBody(true);
echo "\n";




