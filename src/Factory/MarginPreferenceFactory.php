<?php


namespace JorisRos\IDMLlib\Factory;


use JorisRos\IDMLlib\Model\MarginPreference;

class MarginPreferenceFactory
{
    /**
     * @return MarginPreference
     */
    public static function create()
    {
        $marginPreference = new MarginPreference();
        $marginPreference->setColumnCount(1);
        $marginPreference->setColumnGutter(12);
        $marginPreference->setTop(36);
        $marginPreference->setBottom(36);
        $marginPreference->setLeft(36);
        $marginPreference->setRight(36);
        $marginPreference->setColumnDirection("Horizontal");
        $marginPreference->setColumnsPositions("0 211.46456692913387");

        return $marginPreference;
    }
}
