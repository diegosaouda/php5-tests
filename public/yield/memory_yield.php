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


function strings() {
    for ($i = 1; $i <= 999999; $i++) {
        yield new StringUtil('string ' . $i);
    }
}

$microtime = microtime(true);
echo 'yield: ';
$data = strings();
echo memory_get_usage(true) / 1024 / 1024;
foreach ($data as $value) {
    echo '';
}
echo ' ' . (microtime(true) - $microtime);
unset($data, $value, $microtime);
echo PHP_EOL;

echo 'fim: ';
echo memory_get_usage(true) / 1024 / 1024;