<?php

require_once 'src/IDMLlib.php';

$file = new IDMLfile('tests/assets/example.idml');

$idml = new IDMLlib($file);

$tags = $idml->getContentTags();

$content = $idml->getContentByTagName('dynamic_content');