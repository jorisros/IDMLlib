<?php


namespace JorisRos\IDMLlib\Model;


interface ModelInterface
{
    public function getAttributes(): array;
    public function getValueOfAttribute(string $attribute): string;
}
