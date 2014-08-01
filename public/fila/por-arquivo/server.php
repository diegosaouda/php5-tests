<?php

$fp = fopen("/tmp/fila.lock.txt", "w+");
flock($fp, LOCK_EX);
sleep(3);
fclose($fp);

//numero enviado pela requisição
$number = $_GET['number'];
echo $number . ": processado: " . date('Y-m-d H:i:s') . ": " . microtime(true);