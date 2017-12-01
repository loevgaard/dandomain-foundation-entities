<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorInterface;

abstract class AbstractEntity
{
    public function hydrate(array $data)
    {
        $hydrator = $this->getHydrator();
        $hydrator->hydrate($data, $this);
    }

    public function extract() : array
    {
        $hydrator = $this->getHydrator();
        return $hydrator->extract($this);
    }

    /**
     * @return HydratorInterface
     */
    protected function getHydrator() : HydratorInterface
    {
        return new ClassMethods();
    }
}
