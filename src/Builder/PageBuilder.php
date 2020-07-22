<?php


namespace JorisRos\IDMLlib\Builder;


class PageBuilder extends AbstractBuilder implements BuilderInterface
{
    public function toXML()
    {
        $this->writer->openMemory();
        $this->writer->setIndent(true);
        $this->writer->startElement('Page');
        $this->loopAttributes();
        $this->loopRelations();
        $this->writer->endElement();

        return $this->writer;
    }
}
