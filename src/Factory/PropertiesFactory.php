<?php


namespace JorisRos\IDMLlib\Factory;


use JorisRos\IDMLlib\Model\Properties;

class PropertiesFactory
{
    public static function create()
    {
        $properties = new Properties();
        $properties->addPageColor(PageColorFactory::create());

        return $properties;
    }
}
