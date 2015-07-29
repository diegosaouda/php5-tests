<?php

//instalar wkhtmltopdf

require_once __DIR__ . '/../../../vendor/autoload.php';

use Knp\Snappy\Pdf;

$url = 'http://google.com.br';
$filename = __DIR__ . '/data/generate.pdf';

$snappy = new Pdf('/usr/bin/xvfb-run -a -s "-screen 0 1024x720x16" /usr/bin/wkhtmltopdf "$@"');
$snappy->generate($url, $filename);
