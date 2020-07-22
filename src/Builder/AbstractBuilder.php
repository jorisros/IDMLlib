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

    protected function loopRelations():void
    {
        foreach ($this->model->getRelations() as $attribute => $class) {
            $builderString = str_replace('Model', 'Builder' , $class) . 'Builder';
            $methodName = 'get' . ucfirst($attribute);

            $relations = $this->model->$methodName();

            $this->relationBuilder($builderString, $relations);
        }
    }

    private function relationBuilder($builderString, array $relations)
    {
        foreach ($relations as $relation) {
            /** @var BuilderInterface $builder */
            $builder = new $builderString($relation, new \XMLWriter());

            $this->writer->writeRaw($builder->toString());
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
