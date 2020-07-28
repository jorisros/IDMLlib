<?php


namespace JorisRos\IDMLlib\Builder;


class PageColorBuilder extends AbstractBuilder implements BuilderInterface
{
    public function toXML()
    {
        $this->writer->openMemory();
        $this->writer->setIndent(true);
        $this->writer->startElement('PageColor');
        $this->loopAttributes();
        $this->loopRelations();
        $this->writer->endElement();

        return $this->writer;
    }
}
