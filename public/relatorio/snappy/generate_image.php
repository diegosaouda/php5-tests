<?php

//instalar: wkhtmltoimage

require_once __DIR__ . '/../../../vendor/autoload.php';

use Knp\Snappy\Image;

//$url = 'https://www.google.com.br/maps/dir/Av.+Srg.+da+Aeron%C3%A1utica+Pl%C3%ADnio+F.+Gon%C3%A7alves+-+Jardim+Cumbica,+Guarulhos+-+SP,+07181-100/Bras%C3%ADlia+-+DF/@-23.1230359,-46.8519507,10z/data=!4m13!4m12!1m5!1m1!1s0x94ce8a706939e2ad:0xdb5179f190277d94!2m2!1d-46.4669689!2d-23.4440802!1m5!1m1!1s0x935a3d18df9ae275:0x738470e469754a24!2m2!1d-47.8821658!2d-15.7942287';
$url = 'http://uol.com.br';
$filename = __DIR__ . '/data/generate.png';

$snappy = new Image('/usr/bin/xvfb-run -a -s "-screen 0 1024x720x16" /usr/bin/wkhtmltoimage "$@"');
$snappy->setDefaultExtension('png');
$snappy->generate($url, $filename);
