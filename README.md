# IDMLlib a php library to read Indesign IDML files

## Installation

#### Requirements

- PHP 7.2 or higher
- SimpleXML extension

#### Composer
Inside your project execute the following command
```
composer require jorisros/idml-lib
``` 
This got the latest released version and installed it into your vendor directory.

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

$idml = new \JorisRos\IDMLlib\IDMLlib($file);

// Recieve tags from who are defined in Indesign
$tags = $idml->getContentTags();

// Read content from tag `dynamic_content`
$content = $idml->getContentByTagName('dynamic_content');

echo $content;
```

```
// Idea for how it should be working in the future, for creating personalized content
$idml = new \JorisRos\IDMLlib\IDMLlib($file);
$masterSpread = $idml->getMasterSpread();
$idml->addPage($masterSpread, ['tag', 'Tag replace content']);
$idml->saveAs('/tmp/test.idml'); 
```

## Reference documentation
##### IDML
See more documentation: https://www.adobe.com/content/dam/acom/en/devnet/indesign/sdk/cs6/idml/idml-specification.pdf

Or in the ``docs`` directory.
##### Relax NG Compact Syntax 
https://relaxng.org/compact-tutorial-20030326.html
