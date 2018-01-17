<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Repository\Generated\ManufacturerRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ManufacturerRepository extends AbstractRepository
{
    use ManufacturerRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Manufacturer::class);
    }

    public function findOneByExternalId(string $externalId): ?ManufacturerInterface
    {
        /** @var ManufacturerInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
