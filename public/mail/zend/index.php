<?php

require_once __DIR__ . '/../../../vendor/autoload.php';
$config = require_once __DIR__ . '/../config.php';

$begin = microtime(true);

use Zend\Mail;
use Zend\Mime;

$mailMessage = file_get_contents(__DIR__ . '/../message.tpl');

$mail = new Mail\Message();
$mail->setFrom($config['from']);
$mail->setTo($config['to']);
$mail->setSubject('E-mail de teste Ciência da computação');
$mail->setEncoding('UTF-8');

$text = new Mime\Part(strip_tags($mailMessage));
$text->setType(Mime\Mime::TYPE_TEXT);

$html = new Mime\Part($mailMessage);
$html->setType(Mime\Mime::TYPE_HTML);

$file = __DIR__ . '/../image.jpg';
$image = new Mime\Part(file_get_contents($file));
$image->setType('image/jpeg');
$image->setFileName(basename($file));
$image->setEncoding(Mime\Mime::ENCODING_BASE64);
$image->setDisposition(Mime\Mime::DISPOSITION_ATTACHMENT);

$file = __DIR__ . '/../file.pdf';
$pdf = new Mime\Part(file_get_contents($file));
$pdf->setType('application/pdf');
$pdf->setEncoding(Mime\Mime::ENCODING_BASE64);
$pdf->setDisposition(Mime\Mime::DISPOSITION_ATTACHMENT);
$pdf->setFileName(basename($file));

$body = new Mime\Message();
$body->setParts([$text, $html, $image, $pdf]);

$mail->setBody($body);

$options = new Mail\Transport\SmtpOptions();
$options
    ->setHost($config['host'])
    ->setPort($config['port'])
    ->setConnectionClass($config['connection_class'])
    ->setConnectionConfig([
        'username' => $config['username'],
        'password' => $config['password'],
    ]);

echo PHP_EOL;
echo 'send...';

$transport = new Mail\Transport\Smtp($options);
$transport->send($mail);

$end = microtime(true);
echo sprintf('%.4f', $end - $begin);