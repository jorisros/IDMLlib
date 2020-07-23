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

    /**
     * Loop throug the attributes of the model
     */
    protected function loopAttributes(): void
    {
        foreach ($this->model->getAttributes() as $attribute) {
            $this->writer->startAttribute(ucfirst($attribute));
            $this->writer->text($this->getValueOfProperty($attribute));
            $this->writer->endAttribute();
        }
    }

    /**
     * Loop thought the relations of the model, with the possiblity to override the builder instead of the default
     *
     * @param null $builderString
     */
    protected function loopRelations($builderString = null):void
    {
        foreach ($this->model->getRelations() as $attribute => $class) {
            if (!$builderString) {
                $builderString = str_replace('Model', 'Builder' , $class) . 'Builder';
            }

            $methodName = 'get' . ucfirst($attribute);
            $this->relationBuilder($builderString, $this->model->$methodName());
        }
    }

    /**
     * Add the child to the parent
     *
     * @param $builderString
     * @param array $relations
     */
    private function relationBuilder($builderString, array $relations)
    {
        foreach ($relations as $relation) {
            // If a relation is empty then skip the record, it shouldnt be used as a child
            if (!$relation) {
                continue;
            }

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
