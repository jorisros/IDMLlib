<?php

namespace JorisRos\IDMLlib;

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
        $this->Self = (string) $this->xmlItem->attributes()['Self'];
        $this->Name = (string) $this->xmlItem->attributes()['Name'];
    }

    public function getName()
    {
        return $this->Name;
    }
}
