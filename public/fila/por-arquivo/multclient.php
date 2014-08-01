<?php

$letra = $argv[1];

for ($i=0; $i <= 10; $i++) {
    `php client.php {$letra}.{$i} >> ./multclient.log &`;
    sleep(1);
}



