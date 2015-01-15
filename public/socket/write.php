<?php

$address = 'localhost';
$port = 8080;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_nonblock($socket); //deixa o socket não block
socket_connect($socket, $address, $port);


for ($i = 0; $i<=10; $i++) {
	socket_write($socket, 'OK OK OK');
	sleep(1);
}

socket_close($socket);