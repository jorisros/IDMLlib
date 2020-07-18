<?php


use JorisRos\IDMLlib\IDMLtag;

class IDMLtagTest extends \PHPUnit\Framework\TestCase
{
    private function getTag()
    {
        return '
<XMLTag Self="XMLTag/dynamic_content" Name="dynamic_content">
    <Properties>
        <TagColor type="enumeration">Pink</TagColor>
    </Properties>
</XMLTag>
';
    }

    public function testGetName()
    {
        $xml = new SimpleXMLElement($this->getTag());
        $tag = new IDMLtag($xml);
        $this->assertEquals('dynamic_content', $tag->getName());
    }

    public function testGetTagColor()
    {
        $xml = new SimpleXMLElement($this->getTag());
        $tag = new IDMLtag($xml);
        $this->assertEquals('Pink', $tag->getTagColor());
    }

}
