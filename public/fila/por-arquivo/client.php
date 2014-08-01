<?php
require_once('../../../vendor/autoload.php');
use Guzzle\Http\Client;

$number = @$argv[1] ?: 1;
$client = new Client('http://diego.saouda-php5-tests.dev-local');

$post = $client->post('/fila/por-arquivo/server.php?number=' . $number);

$response = $post->send();
echo $response->getBody(true);
echo "\n";




