<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;
use Loevgaard\DandomainFoundation\Entity\ShippingMethod;
use Loevgaard\DandomainFoundation\Repository\Generated\ShippingMethodRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|ShippingMethodInterface find($id)
 * @method ShippingMethodInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|ShippingMethodInterface findOneBy(array $criteria)
 * @method ShippingMethodInterface[] findAll()
 */
class ShippingMethodRepository extends AbstractRepository
{
    use ShippingMethodRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ShippingMethod::class);
    }

    public function findOneByExternalId(int $externalId): ?ShippingMethodInterface
    {
        /** @var ShippingMethodInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
