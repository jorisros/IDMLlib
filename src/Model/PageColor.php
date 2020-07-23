<?php


namespace JorisRos\IDMLlib\Model;


class PageColor implements ModelInterface
{
    private $type = '';
    private $value = '';

    public function getAttributes(): array
    {
        return [
            'type'
        ];
    }

    public function getValueOfAttribute(string $attribute): ?string
    {
        $method = 'get' . ucfirst($attribute);
        return $this->$method();
    }

    public function getRelations(): array
    {
        return [];
    }
}
