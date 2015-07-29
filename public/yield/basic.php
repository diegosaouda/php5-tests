<?php
function gen_one_to_three() {
    for ($i = 1; $i <= 3; $i++) {
        yield $i;

        echo $i . ' - depois do yield';
        echo PHP_EOL;
    }
}

$generator = gen_one_to_three();
foreach ($generator as $value) {
    echo "$value\n";
    sleep(1);
}