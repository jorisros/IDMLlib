<?php


namespace JorisRos\IDMLlib\Builder;


use JorisRos\IDMLlib\Model\ModelInterface;

class MasterSpreadBuilder extends AbstractBuilder implements BuilderInterface
{
    /** @var array  */
    protected $pages = [];
    public function toXML()
    {
        $this->writer->openMemory();
        $this->writer->setIndent(true);
        $this->writer->startDocument('1.0', 'UTF-8', 'yes');
        $this->writer->startElement('idPkg:MasterSpread');
        $this->writer->startElement('MasterSpread');
        $this->loopAttributes();
        $this->writer->endElement();
        $this->loopRelations();

        $this->writer->endElement();
    }
}
