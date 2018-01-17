<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundation\Entity\Order;
use Loevgaard\DandomainFoundation\Repository\Generated\OrderRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|OrderInterface find($id)
 * @method OrderInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|OrderInterface findOneBy(array $criteria)
 * @method OrderInterface[] findAll()
 */
class OrderRepository extends AbstractRepository
{
    use OrderRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function findOneByExternalId(int $externalId): ?OrderInterface
    {
        /** @var OrderInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
