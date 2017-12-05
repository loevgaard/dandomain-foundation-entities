<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
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

    protected function getDateTimeFromJson($val = null) : ?DateTimeImmutable
    {
        if (!$val) {
            return null;
        }

        if ($val instanceof DateTimeImmutable) {
            return $val;
        }

        return DateTimeImmutable::createFromJson($val);
    }

    /**
     * @return HydratorInterface
     */
    protected function getHydrator() : HydratorInterface
    {
        return new ClassMethods(false);
    }
}
