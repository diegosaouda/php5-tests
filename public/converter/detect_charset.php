<?php

mb_detect_order('UTF-8, GB2312, ASCII, Windows-1251, ISO-8859-1');

$files = ['GB2312.txt', 'windows-1252.txt'];

foreach ($files as $filename) {
	echo "\n$filename";
	
	$content = file_get_contents($filename);
	$detect =  mb_detect_encoding($content);
	echo "\nDetect: $detect";
	echo "\nOriginal: " . $content;
	$content = iconv($detect, 'UTF-8//TRANSLIT', $content);
	echo "\nConvertido: $content";
	echo "\n";
}
