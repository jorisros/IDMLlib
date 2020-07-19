<?php

namespace JorisRos\IDMLlib\Model;


use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class MarginPreferenceTest extends TestCase
{
    /**
     * @return SimpleXMLElement
     */
    private function createMarginMock()
    {
        return new SimpleXMLElement('<MarginPreference ColumnCount="1" ColumnGutter="12" Top="36" Bottom="36" Left="36" Right="36" ColumnDirection="Horizontal" ColumnsPositions="0 211.46456692913387" />');
    }

    public function testCompare()
    {
        $this->assertTrue(true);
    }
}
