<?php


namespace JorisRos\IDMLlib\Builder;

use JorisRos\IDMLlib\Model\ModelInterface;

class MarginPreferenceBuilder extends AbstractBuilder implements BuilderInterface
{

    public function __construct(ModelInterface $model, \XMLWriter $writer)
    {
        $this->model = $model;
        $this->writer = $writer;
    }

    public function toXML()
    {
        $this->writer->openMemory();
        $this->writer->startElement('MarginPreference');
        $this->loopAttributes();
        $this->writer->endElement();
    }

    public function toString(): string
    {
        $this->toXML();

        return $this->writer->outputMemory();
    }
}
