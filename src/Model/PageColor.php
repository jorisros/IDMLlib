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

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }


}
