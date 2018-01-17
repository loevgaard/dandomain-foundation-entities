<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;
use Loevgaard\DandomainFoundation\Entity\State;
use Loevgaard\DandomainFoundation\Repository\Generated\StateRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|StateInterface find($id)
 * @method StateInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|StateInterface findOneBy(array $criteria)
 * @method StateInterface[] findAll()
 */
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
