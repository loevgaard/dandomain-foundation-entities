<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;
use Loevgaard\DandomainFoundation\Entity\Period;
use Loevgaard\DandomainFoundation\Repository\Generated\PeriodRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PeriodRepository extends AbstractRepository
{
    use PeriodRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Period::class);
    }

    public function findOneByExternalId(string $externalId): ?PeriodInterface
    {
        /** @var PeriodInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
