<?php
require_once('SoundLike.php');

$input = 'The quick brown fox jumped over the lazy dog';

$searchAgainst = array(
    'The quick brown cat jumped over the lazy dog',
    'Thors hammer jumped over the lazy dog',
    'The quick brown fax jumped over the lazy dog'
);

$SoundsLike = new SoundsLike($searchAgainst, $input);
echo $SoundsLike->findBestMatch();