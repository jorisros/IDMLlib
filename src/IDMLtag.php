<?php

namespace JorisRos\IDMLlib;

class IDMLtag
{
    /** @var SimpleXMLElement */
    private $xmlItem;

    protected $self = '';
    protected $name = '';
    protected $tagColor = '';

    public function __construct(\SimpleXMLElement $xml)
    {
        $this->xmlItem = $xml;
        $this->self = $this->getAttribute('Self');
        $this->name = $this->getAttribute('Name');
        $this->tagColor = $this->getProperty('TagColor');
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTagColor(): string
    {
        return $this->tagColor;
    }

    /**
     * Filters out the attribute by name in the tag
     *
     * @param string $name
     * @return string
     */
    private function getAttribute(string $name): string
    {
        return (string) $this->xmlItem->attributes()[$name];
    }

    private function getProperty(string $name): string
    {
        $properties = $this->xmlItem->children()->children();

        foreach ($properties as $property) {
            if ($name === $property->getName()) {
                return (string) $property;
            }
        }
    }
}
