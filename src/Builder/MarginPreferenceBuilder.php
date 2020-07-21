<?php


namespace JorisRos\IDMLlib\Builder;

use JorisRos\IDMLlib\Model\ModelInterface;

class MarginPreferenceBuilder extends AbstractBuilder implements BuilderInterface
{
    public function toXML()
    {
        $this->writer->openMemory();
        $this->writer->startElement('MarginPreference');
        $this->loopAttributes();
        $this->writer->endElement();
    }
}
