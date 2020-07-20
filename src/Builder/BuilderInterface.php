<?php

namespace JorisRos\IDMLlib\Builder;

use JorisRos\IDMLlib\Model\ModelInterface;

interface BuilderInterface
{
    public function __construct(ModelInterface $model,\XMLWriter $writer);
    public function toXML();
    public function toString(): string;
}
