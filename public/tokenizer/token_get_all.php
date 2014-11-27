<?php

$file = realpath('../../vendor/symfony/console/Symfony/Component/Console/Application.php');
$source = file_get_contents($file);
$tokens = token_get_all($source);

$result = array();
foreach ($tokens as $key => $token) {

    if (is_array($token)) {
        $result[] = array(
            'token' => token_name($token[0]) . ' ['.$token[0].']',
            'content' => $token[1],
            'line' => $token[2],
        );
        continue;
    }

    $result[] = array(
        'content' => $token,
    );
}

print_r($result);