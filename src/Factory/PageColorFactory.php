<?php


namespace JorisRos\IDMLlib\Factory;


use JorisRos\IDMLlib\Model\PageColor;

class PageColorFactory
{
    public static function create()
    {
        $pageColor = new PageColor();
        $pageColor->setValue('UseMasterColor');
        $pageColor->setType('enumeration');

        return $pageColor;
    }
}
