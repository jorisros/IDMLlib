<?php


use JorisRos\IDMLlib\IDMLfile;

class IDMLfileTest extends \PHPUnit\Framework\TestCase
{

    public function test__construct()
    {
        $this->expectException(\Exception::class);
        $file = new IDMLfile('fake/path');
        $this->assertInstanceOf(IDMLfile::class);
    }

    public function testGetContentFile()
    {
        $file = new IDMLfile('tests/assets/example.idml');
        $content = $file->getContentFile('Stories/Story_udc.xml');

        $this->assertNotEmpty($content);
    }
}
