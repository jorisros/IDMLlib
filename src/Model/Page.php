<?php

namespace JorisRos\IDMLlib\Model;


class Page implements ModelInterface
{
    /** @var string */
    private $self;

    /** @var string */
    private $appliedAlternateLayout;

    /** @var string */
    private $layoutRule;

    /** @var string */
    private $snapshotBlendingMode;

    /** @var string */
    private $optionalPage;

    /** @var string */
    private $geometricBounds;

    /** @var string */
    private $itemTransform;

    /** @var string */
    private $name;

    /** @var string */
    private $appliedTrapPreset;

    /** @var string */
    private $overrideList;

    /** @var string */
    private $appliedMaster;

    /** @var string */
    private $masterPageTransform;

    /** @var string */
    private $tabOrder;

    /** @var string */
    private $gridStartingPoint;

    /** @var string */
    private $useMasterGrid;

    /**
     * @return string
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param string $self
     */
    public function setSelf($self)
    {
        $this->self = $self;
    }

    /**
     * @return string
     */
    public function getAppliedAlternateLayout()
    {
        return $this->appliedAlternateLayout;
    }

    /**
     * @param string $appliedAlternateLayout
     */
    public function setAppliedAlternateLayout($appliedAlternateLayout)
    {
        $this->appliedAlternateLayout = $appliedAlternateLayout;
    }

    /**
     * @return string
     */
    public function getLayoutRule()
    {
        return $this->layoutRule;
    }

    /**
     * @param string $layoutRule
     */
    public function setLayoutRule($layoutRule)
    {
        $this->layoutRule = $layoutRule;
    }

    /**
     * @return string
     */
    public function getSnapshotBlendingMode()
    {
        return $this->snapshotBlendingMode;
    }

    /**
     * @param string $snapshotBlendingMode
     */
    public function setSnapshotBlendingMode($snapshotBlendingMode)
    {
        $this->snapshotBlendingMode = $snapshotBlendingMode;
    }

    /**
     * @return string
     */
    public function getOptionalPage()
    {
        return $this->optionalPage;
    }

    /**
     * @param string $optionalPage
     */
    public function setOptionalPage($optionalPage)
    {
        $this->optionalPage = $optionalPage;
    }

    /**
     * @return string
     */
    public function getGeometricBounds()
    {
        return $this->geometricBounds;
    }

    /**
     * @param string $geometricBounds
     */
    public function setGeometricBounds($geometricBounds)
    {
        $this->geometricBounds = $geometricBounds;
    }

    /**
     * @return string
     */
    public function getItemTransform()
    {
        return $this->itemTransform;
    }

    /**
     * @param string $itemTransform
     */
    public function setItemTransform($itemTransform)
    {
        $this->itemTransform = $itemTransform;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAppliedTrapPreset()
    {
        return $this->appliedTrapPreset;
    }

    /**
     * @param string $appliedTrapPreset
     */
    public function setAppliedTrapPreset($appliedTrapPreset)
    {
        $this->appliedTrapPreset = $appliedTrapPreset;
    }

    /**
     * @return string
     */
    public function getOverrideList()
    {
        return $this->overrideList;
    }

    /**
     * @param string $overrideList
     */
    public function setOverrideList($overrideList)
    {
        $this->overrideList = $overrideList;
    }

    /**
     * @return string
     */
    public function getAppliedMaster()
    {
        return $this->appliedMaster;
    }

    /**
     * @param string $appliedMaster
     */
    public function setAppliedMaster($appliedMaster)
    {
        $this->appliedMaster = $appliedMaster;
    }

    /**
     * @return string
     */
    public function getMasterPageTransform()
    {
        return $this->masterPageTransform;
    }

    /**
     * @param string $masterPageTransform
     */
    public function setMasterPageTransform($masterPageTransform)
    {
        $this->masterPageTransform = $masterPageTransform;
    }

    /**
     * @return string
     */
    public function getTabOrder()
    {
        return $this->tabOrder;
    }

    /**
     * @param string $tabOrder
     */
    public function setTabOrder($tabOrder)
    {
        $this->tabOrder = $tabOrder;
    }

    /**
     * @return string
     */
    public function getGridStartingPoint()
    {
        return $this->gridStartingPoint;
    }

    /**
     * @param string $gridStartingPoint
     */
    public function setGridStartingPoint($gridStartingPoint)
    {
        $this->gridStartingPoint = $gridStartingPoint;
    }

    /**
     * @return string
     */
    public function getUseMasterGrid()
    {
        return $this->useMasterGrid;
    }

    /**
     * @param string $useMasterGrid
     */
    public function setUseMasterGrid($useMasterGrid)
    {
        $this->useMasterGrid = $useMasterGrid;
    }

    public function getAttributes(): array
    {
        return [
            'Self',
            'AppliedAlternateLayout',
            'LayoutRule',
            'SnapshotBlendingMode',
            'OptionalPage',
            'GeometricBounds',
            'ItemTransform',
            'Name',
            'AppliedTrapPreset',
            'OverrideList',
            'AppliedMaster',
            'MasterPageTransform',
            'TabOrder',
            'GridStartingPoint',
            'UseMasterGrid'
            ];
    }

    //@TODO move to abstract
    public function getValueOfAttribute(string $attribute): ?string
    {
        var_dump($attribute);
        $method = 'get' . ucfirst($attribute);
        return $this->$method();
    }

    public function getRelations(): array
    {
        return [];
    }


}
