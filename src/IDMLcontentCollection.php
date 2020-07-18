<?php

namespace JorisRos\IDMLlib;

class IDMLcontentCollection
{
    private $rawXML;

    public function __construct($resource, $content)
    {
        $this->rawXML = $content;
    }

    public function getContentByTagName($name)
    {
        $domXML = new \DOMDocument();
        $domXML->loadXML($this->rawXML);
        $elements = $domXML->getElementsByTagName('XMLElement');

        /** @var DOMDocument $element */
        foreach ($elements as $element) {
            /** @var DOMAttr $markupAttribute */
            $markupAttribute = $element->attributes->getNamedItem('MarkupTag');

            $arrTagName = explode('/', $markupAttribute->textContent);
            $tagName = $arrTagName[1];
            if ($tagName == $name) {
                $content = new IDMLcontent($element);
                return $content->convertXMLtoHTML();
            }
        }
    }
}
