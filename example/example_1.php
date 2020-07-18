<?php

require_once __DIR__ . '/../vendor/autoload.php';

$file = new \JorisRos\IDMLlib\IDMLfile('../tests/assets/example.idml');

$idml = new \JorisRos\IDMLlib\IDMLlib($file);

//$tags = $idml->getContentTags();
//var_dump($tags);
$content = $idml->getContentByTagName('dynamic_content');

echo $content;
