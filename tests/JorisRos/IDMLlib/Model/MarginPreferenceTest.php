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
}
