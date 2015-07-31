<?php

echo "\nGB2312 TO UTF-8";
$gb2312 = file_get_contents('GB2312.txt');

echo "\n\tSEM CONVERTER: ";
echo $gb2312;
echo "\n\tCONVERTIDO: ";
echo iconv('GB2312', 'UTF-8//TRANSLIT', $gb2312);
