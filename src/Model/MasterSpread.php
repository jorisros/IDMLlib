<?php


namespace JorisRos\IDMLlib\Model;


class MasterSpread implements ModelInterface
{
    private $self;
    private $itemTransform;
    private $overriddenPageItemProps;
    private $name;
    private $namePrefix;
    private $baseName;
    private $showMasterItems;
    private $pageCount;
    private $primaryTextFrame;

    private $pages = [];

    public function getAttributes(): array
    {
        return [
            'Self',
            'ItemTransform',
            'OverriddenPageItemProps',
            'Name',
            'NamePrefix',
            'BaseName',
            'ShowMasterItems',
            'PageCount',
            'PrimaryTextFrame'
        ];
    }

    public function getRelations(): array
    {
        return [
            'pages' => Page::class,
        ];
    }

    //@TODO move to abstract
    public function getValueOfAttribute(string $attribute): ?string
    {
        $method = 'get' . ucfirst($attribute);
        return $this->$method();
    }

    /**
     * @return mixed
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param mixed $self
     */
    public function setSelf($self): void
    {
        $this->self = $self;
    }

    /**
     * @return mixed
     */
    public function getItemTransform()
    {
        return $this->itemTransform;
    }

    /**
     * @param mixed $itemTransform
     */
    public function setItemTransform($itemTransform): void
    {
        $this->itemTransform = $itemTransform;
    }

    /**
     * @return mixed
     */
    public function getOverriddenPageItemProps()
    {
        return $this->overriddenPageItemProps;
    }

    /**
     * @param mixed $overriddenPageItemProps
     */
    public function setOverriddenPageItemProps($overriddenPageItemProps): void
    {
        $this->overriddenPageItemProps = $overriddenPageItemProps;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNamePrefix()
    {
        return $this->namePrefix;
    }

    /**
     * @param mixed $namePrefix
     */
    public function setNamePrefix($namePrefix): void
    {
        $this->namePrefix = $namePrefix;
    }

    /**
     * @return mixed
     */
    public function getBaseName()
    {
        return $this->baseName;
    }

    /**
     * @param mixed $baseName
     */
    public function setBaseName($baseName): void
    {
        $this->baseName = $baseName;
    }

    /**
     * @return mixed
     */
    public function getShowMasterItems()
    {
        return $this->showMasterItems;
    }

    /**
     * @param mixed $showMasterItems
     */
    public function setShowMasterItems($showMasterItems): void
    {
        $this->showMasterItems = $showMasterItems;
    }

    /**
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @param mixed $pageCount
     */
    public function setPageCount($pageCount): void
    {
        $this->pageCount = $pageCount;
    }

    /**
     * @return mixed
     */
    public function getPrimaryTextFrame()
    {
        return $this->primaryTextFrame;
    }

    /**
     * @param mixed $primaryTextFrame
     */
    public function setPrimaryTextFrame($primaryTextFrame): void
    {
        $this->primaryTextFrame = $primaryTextFrame;
    }

    /**
     * @param Page $page
     */
    public function addPage(Page $page)
    {
        $this->pages[] = $page;
    }

    /**
     * @return array
     */
    public function getPages(): array
    {
        return $this->pages;
    }
}
