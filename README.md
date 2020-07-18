# IDMLlib a php library to read Indesign IDML files

## TODO
- Convert HTML to IDML content structure

## Run example
### Show example in browser
```
php -S localhost:3000 -t example/
```

Go in your browser to http://localhost:3000/example_1.php
### Example code for reading a IDML file

```
<?php 

// Load library
require_once __DIR__ . '/../vendor/autoload.php';

// Location of IDML file
$file = new \JorisRos\IDMLlib\IDMLfile('../tests/assets/example.idml');

$idml = new \JorisRos\IDMLlib\IDMLli($file);

// Recieve tags from who are defined in Indesign
$tags = $idml->getContentTags();

// Read content from tag `dynamic_content`
$content = $idml->getContentByTagName('dynamic_content');

echo $content;
```
