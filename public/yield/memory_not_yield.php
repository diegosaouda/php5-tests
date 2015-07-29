<?php

class StringUtil
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function __toString()
    {
        return $this->string;
    }
}

function strings2() {
    $array = [];
    for ($i = 1; $i <= 999999; $i++) {
        $array[] = new StringUtil('string ' . $i);
    }
    return $array;
}

$microtime = microtime(true);
echo 'notYield: ';
$data = strings2();
echo memory_get_usage(true) / 1024 / 1024;
foreach ($data as $value) {
    echo '';
}
echo ' ' . (microtime(true) - $microtime);
unset($data, $value, $microtime);

echo 'fim: ';
echo memory_get_usage(true) / 1024 / 1024;