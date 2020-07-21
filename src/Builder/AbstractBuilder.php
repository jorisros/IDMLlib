<?php


namespace JorisRos\IDMLlib\Builder;


use JorisRos\IDMLlib\Model\ModelInterface;

class AbstractBuilder
{
    /** @var \XMLWriter */
    protected $writer;

    /** @var ModelInterface */
    protected $model;

    /**
     * AbstractBuilder constructor.
     *
     * @param ModelInterface $model
     * @param \XMLWriter $writer
     */
    public function __construct(ModelInterface $model, \XMLWriter $writer)
    {
        $this->model = $model;
        $this->writer = $writer;
    }

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

    public function toString(): string
    {
        $this->toXML();

        return $this->writer->outputMemory();
    }
}
