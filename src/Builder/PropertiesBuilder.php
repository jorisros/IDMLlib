<?php


namespace JorisRos\IDMLlib\Builder;


class PropertiesBuilder extends AbstractBuilder implements BuilderInterface
{
    public function toXML()
    {
        $this->writer->openMemory();
        $this->writer->setIndent(true);
        $this->writer->startElement('Properties');
        $this->loopRelations();
        $this->writer->endElement();

        return $this->writer;
    }
}
