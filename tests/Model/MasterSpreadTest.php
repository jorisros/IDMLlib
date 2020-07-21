<?php

namespace Model;

use JorisRos\IDMLlib\Builder\MarginPreferenceBuilder;
use JorisRos\IDMLlib\Builder\MasterSpreadBuilder;
use JorisRos\IDMLlib\Factory\MarginPreferenceFactory;
use JorisRos\IDMLlib\Factory\MasterSpreadFactory;
use JorisRos\IDMLlib\Model\MasterSpread;
use PHPUnit\Framework\TestCase;

class MasterSpreadTest extends TestCase
{
    public function testCompare()
    {
        $builder = new MasterSpreadBuilder(MasterSpreadFactory::create("udc", "Master", "A"), new \XMLWriter());

        var_dump($builder->toString());
        $this->assertTrue(true);
    }
}
