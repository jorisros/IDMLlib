<?php

namespace JorisRos\IDMLlib;

use SimpleXMLElement;

class IDMLtag
{
    /** @var SimpleXMLElement */
    private $xmlItem;

    /** @var string  */
    protected $self = '';

    /** @var string  */
    protected $name = '';

    /**
     * @var string|null
     */
    protected $tagColor = '';

    public function __construct(SimpleXMLElement $xml)
    {
        $this->xmlItem = $xml;
        $this->self = $this->getAttribute('Self');
        $this->name = $this->getAttribute('Name');
        $this->tagColor = $this->getProperty('TagColor');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
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

    /**
     * @param string $name
     * @return string|null
     */
    private function getProperty(string $name): ?string
    {
        $properties = $this->xmlItem->children()->children();

        foreach ($properties as $property) {
            if ($name === $property->getName()) {
                return (string) $property;
            }
        }

        return null;
    }
}
