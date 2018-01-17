<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Customer;
use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;
use Loevgaard\DandomainFoundation\Repository\Generated\CustomerRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

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
