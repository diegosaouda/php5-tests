<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Knp\Snappy\Pdf;

$html = <<<'EOD'
<h1>Relatório</h1>
<br/>
<table width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Fulano da Silva</td>
            <td>fulano@dasilva.com</td>
            <td>11 99999-8888</td>
        </tr>
        <tr>
            <td>Sicrano Santos</td>
            <td>sicrano@gmail.com</td>
            <td>11 99999-7777</td>
        </tr>
        <tr>
            <td>João das Botas</td>
            <td>j.botas@empresa.com.br</td>
            <td>11 99999-6666</td>
        </tr>
    </thead>
</table>
EOD;

$filename = __DIR__ . '/data/from_html.pdf';

$snappy = new Pdf('/usr/bin/xvfb-run -a -s "-screen 0 1024x720x16" /usr/bin/wkhtmltopdf "$@"');
$snappy->generateFromHtml($html, $filename, ['encoding' => 'UTF8'], true);


