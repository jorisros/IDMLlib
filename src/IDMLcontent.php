<?php

namespace JorisRos\IDMLlib;

class IDMLcontent
{
    private $html;
    private $text;

    /** @var DOMDocument */
    private $rawXML;

    public function __construct($xmlElement)
    {
        $this->rawXML = $xmlElement;
    }

    public function convertXMLtoHTML()
    {
        $paragraphStyleRanges = $this->rawXML->getElementsByTagName('ParagraphStyleRange');

        $strContent = '';

        /** @var DOMDocument $paragraphStyleRange */
        foreach ($paragraphStyleRanges as $paragraphStyleRange) {
            $style = '';
            $justification = $paragraphStyleRange->attributes->getNamedItem('Justification')->textContent;
            switch ($justification) {
                case 'CenterAlign':
                    $style .= ' style="text-align: center"';
                    break;
            }
            $strContent .= '<p' . $style . '>';
            $characterStyleRanges = $paragraphStyleRange->getElementsByTagName('CharacterStyleRange');

            /** @var DOMDocument $characterStyleRange */
            foreach ($characterStyleRanges as $characterStyleRange) {
                $style = '';
                $fontStyle = $characterStyleRange->attributes->getNamedItem('FontStyle');
                if (isset($fontStyle)) {
                    switch ($characterStyleRange->attributes->getNamedItem('FontStyle')->textContent) {
                        case 'Bold':
                            $style = ' style="font-weight:bold"';
                            break;
                    }
                }

                /** @var DOMNodeList $childeren */
                $childeren = $characterStyleRange->childNodes;

                foreach ($childeren as $child) {
                    switch ($child->localName) {
                        case 'Content':
                            $strContent .= '<span' . $style . '>';
                            $strContent .= $child->textContent;
                            $strContent .= '</span>';
                            break;
                        case 'Br':
                            $strContent .= '<br />';
                            break;
                    }
                }
            }
            $strContent .= '</p>';
        }

        return $strContent;
    }
}
