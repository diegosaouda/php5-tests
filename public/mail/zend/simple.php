<?php

require_once __DIR__ . '/../../../vendor/autoload.php';
$config = require_once __DIR__ . '/../config.php';

$begin = microtime(true);

use Zend\Mail;

$mailMessage = file_get_contents(__DIR__ . '/../message.tpl');

$mail = new Mail\Message();
$mail->setFrom($config['from']);
$mail->setTo($config['to']);
$mail->setSubject('E-mail de teste Ciência da computação');
$mail->setBody(strip_tags($mailMessage));
$mail->setEncoding('UTF-8');

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