<?php


namespace JorisRos\IDMLlib\Factory;


use JorisRos\IDMLlib\Model\Page;
use JorisRos\IDMLlib\Model\Properties;

class PageFactory
{
    /**
     * Create a page
     *
     * @param string $id
     * @param string $name
     * @param string $masterId
     * @param string $appliedAlternateLayout
     * @return Page
     */
    public static function create(string $id, string $name, string $masterId, string $appliedAlternateLayout)
    {
        $page = new Page();
        $page->setSelf($id);
        $page->setAppliedAlternateLayout($appliedAlternateLayout);
        $page->setLayoutRule('UseMaster');
        $page->setSnapshotBlendingMode('IgnoreLayoutSnapshots');
        $page->setOptionalPage('false');
        $page->setGeometricBounds("0 0 283.46456692913387 283.46456692913387");
        $page->setItemTransform('1 0 0 1 0 -141.73228346456693');
        $page->setName('1');
        $page->setAppliedTrapPreset("TrapPreset/\$ID/kDefaultTrapStyleName");
        $page->setAppliedMaster($masterId);
        $page->setMasterPageTransform("1 0 0 1 0 0");
        $page->setGridStartingPoint("TopOutside");
        $page->setUseMasterGrid("true");

        $page->addProperties(PropertiesFactory::create());

        return $page;
    }
}
