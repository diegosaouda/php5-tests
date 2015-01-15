<?php

$address = 'localhost';
$port = 8080;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_block($socket); //fica esperando alguma coisa no socket
socket_connect($socket, $address, $port);


while (true) {
	echo socket_read($socket, 1024);		
}

socket_close($socket);