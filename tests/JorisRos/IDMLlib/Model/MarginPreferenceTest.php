<?php

namespace JorisRos\IDMLlib\Model;


use JorisRos\IDMLlib\Builder\MarginPreferenceBuilder;
use JorisRos\IDMLlib\Factory\MarginPreferenceFactory;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class MarginPreferenceTest extends TestCase
{
    /**
     * @return SimpleXMLElement
     */
    private function createMarginMock()
    {
        return '<MarginPreference ColumnCount="1" ColumnGutter="12" Top="36" Bottom="36" Left="36" Right="36" ColumnDirection="Horizontal" ColumnsPositions="0 211.46456692913387"/>';
    }

    public function testCompare()
    {
        $builder = new MarginPreferenceBuilder(MarginPreferenceFactory::create(), new \XMLWriter());
        $this->assertXmlStringEqualsXmlString($this->createMarginMock(), $builder->toString());
        $this->assertTrue(true);
    }

    public function testA() {
        $x = new \XMLWriter();
        $x->openMemory();
        $x->setIndent(true);
        $x->startDocument('1.0', 'UTF-8', 'yes');
        $x->endDocument();
        $x->startElement('idPkg:MasterSpread');
        $x->startElement('MasterSpread');

        $x->endElement();
        $x->endElement();

        var_dump($x->outputMemory());
    }
}
