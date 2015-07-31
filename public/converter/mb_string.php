<?php
mb_internal_encoding('utf-8');

$encodingList = ['windows-1252', 'GB2312'];

foreach ($encodingList as $encoding) {
	//$encoding = 'windows-1252';
	echo "\n" . (str_repeat('-',100)) . "\n";
	echo "\n{$encoding} TO UTF-8"; 
	$content = mb_convert_encoding(trim(file_get_contents($encoding . '.txt')), 'UTF-8', $encoding);
	
	echo "\nstrlen: ";
	echo mb_strlen($content);
	
	echo "\nmb_strtoupper: ";
	echo mb_strtoupper($content);
	
	echo "\nmb_strtolower: ";
	echo mb_strtolower($content);	
}
