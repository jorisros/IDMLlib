<?php

namespace JorisRos\IDMLlib;

use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class IDMLtagCollectionTest extends TestCase
{
    private function getTags()
    {
        return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<idPkg:Tags xmlns:idPkg="http://ns.adobe.com/AdobeInDesign/idml/1.0/packaging" DOMVersion="8.0">
	<XMLTag Self="XMLTag/dynamic_content" Name="dynamic_content">
		<Properties>
			<TagColor type="enumeration">Pink</TagColor>
		</Properties>
	</XMLTag>
	<XMLTag Self="XMLTag/Root" Name="Root">
		<Properties>
			<TagColor type="enumeration">LightBlue</TagColor>
		</Properties>
	</XMLTag>
</idPkg:Tags>
';
    }

    public function testGetTags()
    {
        $xml = new SimpleXMLElement($this->getTags());
        $tagCollection = new IDMLtagCollection($xml);

        $tags = $tagCollection->getTags();

        $this->assertIsArray($tags);
        $this->assertEquals(2, count($tags));

        foreach ($tags as $tag) {
            $this->assertInstanceOf(IDMLtag::class, $tag);
        }
    }
}


