<?php


namespace JorisRos\IDMLlib\Model;


class Properties implements ModelInterface
{
    private $pageColor = [];

    public function getAttributes(): array
    {
        return [];
    }

    public function getValueOfAttribute(string $attribute): ?string
    {
        return null;
    }

    public function getRelations(): array
    {
        return [
            'pageColor' => PageColor::class
        ];
    }

    public function addPageColor(PageColor $pageColor)
    {
        $this->pageColor[] = $pageColor;
    }

    public function getPageColor()
    {
        return $this->pageColor;
    }
}
