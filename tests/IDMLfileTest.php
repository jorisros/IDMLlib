<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/IDMLfile.class.php';

class IDMLfileTest extends PHPUnit\Framework\TestCase
{
    public function test__construct()
    {
        $file = new IDMLfile(__DIR__ . '/assets/example.idml');

        $this->assertInstanceOf('IDMLfile', $file, 'Class doesnt match');

        $resource = $file->getResource();

        $this->assertEquals(true, is_resource($resource), 'Resource not valid');
    }


    /**
     * Tests if the execption has been trowned
     */
    public function testFileNotFound()
    {
        $this->expectException("Exception");
        $this->expectExceptionMessage("File not found");
        $file = new IDMLfile(__DIR__ . '/assets/example_fout.idml');
    }

}
