<?php

require_once __DIR__ . '/../../../vendor/autoload.php';
$config = require_once __DIR__ . '/../config.php';

$begin = microtime(true);

$transport = Swift_SmtpTransport::newInstance($config['host'], $config['port'])
    ->setUsername($config['username'])
    ->setPassword($config['password']);

$mailer = Swift_Mailer::newInstance($transport);

$message = file_get_contents(__DIR__ . '/../message.tpl');

// Create a message
$message = Swift_Message::newInstance()
    ->attach(Swift_Attachment::fromPath(__DIR__ . '/../image.jpg'))
    ->attach(Swift_Attachment::fromPath(__DIR__ . '/../file.pdf'))
    ->setSubject('E-mail de teste Ciência da computação')
    ->setFrom($config['from'])
    ->setTo($config['to'])
    ->setBody(strip_tags($message))
    ->addPart($message, 'text/html')
    ->setCharset('UTF-8');

echo PHP_EOL;
echo 'send...';

$mailer->send($message);

$end = microtime(true);
echo sprintf('%.4f', $end - $begin);
