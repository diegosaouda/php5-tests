<?php

# create our client object
$gmclient= new GearmanClient();

# add the default server (localhost)
//$gmclient->addServer('localhost', '24730');
$gmclient->addServer('localhost', '14730');

$message = @$argv[1] ?: 'sem mensagem';

# run reverse client in the background
$job_handle = $gmclient->doBackground("reverse", $message);

if ($gmclient->returnCode() != GEARMAN_SUCCESS)
{
    echo "bad return code\n";
    exit;
}

echo "done!\n";