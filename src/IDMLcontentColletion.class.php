<?php

class IDMLcontentCollection
{
  private $rawXML;

  public function __construct($resource, $content)
  {
    $this->rawXML = $content;
  }

  public function getContentByTagName($name)
  {
    $domXML = new DOMDocument();
    $domXML->loadXML($this->rawXML);
    $elements = $domXML->getElementsByTagName('XMLElement');

    /** @var DOMDocument $element */
    foreach($elements as $element)
    {
      /** @var DOMAttr $markupAttribute */
      $markupAttribute = $element->attributes->getNamedItem('MarkupTag');

      $arrTagName = explode('/',$markupAttribute->textContent);
      $tagName = $arrTagName[1];
      if($tagName == $name)
      {
        $content = new IDMLcontent($element);
        return $content->convertXMLtoHTML();
      }
    }
  }
}

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
    foreach($paragraphStyleRanges as $paragraphStyleRange)
    {
      $style = '';
      $justification = $paragraphStyleRange->attributes->getNamedItem('Justification')->textContent;
      switch($justification)
      {
        case 'CenterAlign':
          $style .= ' style="text-align: center"';
          break;
      }
      $strContent .= '<p'.$style.'>';
      $characterStyleRanges = $paragraphStyleRange->getElementsByTagName('CharacterStyleRange');

      /** @var DOMDocument $characterStyleRange */
      foreach($characterStyleRanges as $characterStyleRange)
      {
        $style = '';
        $fontStyle = $characterStyleRange->attributes->getNamedItem('FontStyle');
        if(isset($fontStyle))
        {
          switch($characterStyleRange->attributes->getNamedItem('FontStyle')->textContent){
            case 'Bold':
              $style = ' style="font-weight:bold"';
              break;
          }
        }

        /** @var DOMNodeList $childeren */
        $childeren = $characterStyleRange->childNodes;

        foreach($childeren as $child)
        {
          switch($child->localName)
          {
            case 'Content':
              $strContent .= '<span'.$style.'>';
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