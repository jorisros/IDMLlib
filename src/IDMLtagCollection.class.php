<?php

class IDMLtagCollection
{
    private $rawXML;

    public function __construct($resource, $content)
    {
        $this->rawXML = $content;
    }

    public function getTags()
    {
        $arr = array();

        $numberItems = count($this->rawXML[0]->XMLTag);

        for ($i = 0; $i < $numberItems; $i++) {
            $item = new IDMLtag($this->rawXML[0]->XMLTag[$i]);
            $arr[] = $item;
        }

        return $arr;
    }


}

class IDMLtag
{
    /** @var SimpleXMLElement */
    private $xmlItem;


    protected $Self = '';
    protected $Name = '';
    protected $TagColor = '';

    public function __construct($xml)
    {
        $this->xmlItem = $xml;
        $this->Self = (string)$this->xmlItem->attributes()['Self'];
        $this->Name = (string)$this->xmlItem->attributes()['Name'];
    }


    public function getName()
    {
        return $this->Name;
    }

}