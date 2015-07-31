<?php

echo "\nWindows-1252 TO UTF-8";
$original = file_get_contents('windows-1252.txt');

echo "\n\tSEM CONVERTER: ";
echo $original;
echo "\n\tCONVERTIDO: ";
echo iconv('WINDOWS-1252', 'UTF-8//TRANSLIT', $original);
