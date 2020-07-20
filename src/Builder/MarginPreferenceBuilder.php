<?php


namespace JorisRos\IDMLlib\Builder;

use JorisRos\IDMLlib\Model\ModelInterface;

class MarginPreferenceBuilder implements BuilderInterface
{
    private $writer;
    private $model;

    public function __construct(ModelInterface $model, \XMLWriter $writer)
    {
        $this->model = $model;
        $this->writer = $writer;
    }

    public function toXML()
    {
        $this->writer->openMemory();
        $this->writer->startElement('MarginPreference');
        $this->writer->endElement();
    }

    public function toString(): string
    {
        $this->toXML();

        return $this->writer->outputMemory();
    }

}
