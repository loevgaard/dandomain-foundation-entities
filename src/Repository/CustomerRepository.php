<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Customer;
use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;
use Loevgaard\DandomainFoundation\Repository\Generated\CustomerRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|CustomerInterface find($id)
 * @method CustomerInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|CustomerInterface findOneBy(array $criteria)
 * @method CustomerInterface[] findAll()
 */
class CustomerRepository extends AbstractRepository
{
    use CustomerRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    public function findOneByExternalId(int $externalId): ?CustomerInterface
    {
        /** @var CustomerInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
