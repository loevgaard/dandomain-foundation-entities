<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorInterface;

abstract class AbstractEntity
{
    /**
     * This will hold the conversions applied when calling hydrate
     *
     * @var array
     */
    protected $hydrateConversions;

    /**
     * This will hold the conversions applied when calling extract
     *
     * @var array
     */
    protected $extractConversions;

    /**
     * @param array $data
     * @param bool $useConversions
     * @param bool $scalarsOnly If true, it will only hydrate scalars, i.e. floats, integers, strings, and booleans
     */
    public function hydrate(array $data, bool $useConversions = false, $scalarsOnly = true)
    {
        $hydrator = $this->getHydrator();

        if ($scalarsOnly) {
            foreach ($data as $key => $val) {
                if (!is_scalar($val)) {
                    unset($data[$key]);
                }
            }
        }

        if ($useConversions && is_array($this->hydrateConversions)) {
            $data = $this->convert($data, $this->hydrateConversions);
        }

        $hydrator->hydrate($data, $this);
    }

    public function extract(bool $useConversions = false) : array
    {
        $hydrator = $this->getHydrator();

        $data = $hydrator->extract($this);

        if ($useConversions && is_array($this->extractConversions)) {
            $data = $this->convert($data, $this->extractConversions);
        }

        return $data;
    }

    protected function convert(array $data, $conversions) : array
    {
        foreach ($conversions as $from => $to) {
            if (isset($data[$to])) {
                throw new \InvalidArgumentException('The $to argument in the $data object is already set');
            }

            $tmp = $data[$from] ?? null;
            if ($tmp) {
                unset($data[$from]);
                $data[$to] = $tmp;
            }
        }

        return $data;
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
