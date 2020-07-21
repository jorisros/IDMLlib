<?php


namespace JorisRos\IDMLlib\Factory;


use JorisRos\IDMLlib\Model\MasterSpread;

class MasterSpreadFactory
{
    public static function create(string $id, string $name, string $namePrefix = "A")
    {
        $masterSpread = new MasterSpread();
        $masterSpread->setSelf($id);
        $masterSpread->setItemTransform("1 0 0 1 0 0");
        $masterSpread->setOverriddenPageItemProps("");
        $masterSpread->setName($namePrefix . '-' . $name);
        $masterSpread->setNamePrefix($namePrefix);
        $masterSpread->setBaseName($name);
        $masterSpread->setShowMasterItems("true");
        $masterSpread->setPageCount("2");
        $masterSpread->setPrimaryTextFrame("n");

        return $masterSpread;
    }
}
