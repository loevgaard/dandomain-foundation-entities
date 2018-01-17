<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;
use Loevgaard\DandomainFoundation\Entity\State;
use Loevgaard\DandomainFoundation\Repository\Generated\StateRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StateRepository extends AbstractRepository
{
    use StateRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, State::class);
    }

    public function findOneByExternalId(int $externalId): ?StateInterface
    {
        /** @var StateInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
