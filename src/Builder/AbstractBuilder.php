<?php


namespace JorisRos\IDMLlib\Builder;


use JorisRos\IDMLlib\Model\ModelInterface;

class AbstractBuilder
{
    /** @var \XMLWriter */
    protected $writer;

    /** @var ModelInterface */
    protected $model;

    protected function loopAttributes(): void
    {
        foreach ($this->model->getAttributes() as $attribute) {
            $this->writer->startAttribute(ucfirst($attribute));
            $this->writer->text($this->getValueOfProperty($attribute));
            $this->writer->endAttribute();
        }
    }

    protected function getValueOfProperty($name)
    {
        return $this->model->getValueOfAttribute($name);
    }


}
