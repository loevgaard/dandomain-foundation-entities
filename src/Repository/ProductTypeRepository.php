<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeInterface;
use Loevgaard\DandomainFoundation\Entity\ProductType;
use Loevgaard\DandomainFoundation\Repository\Generated\ProductTypeRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|ProductTypeInterface find($id)
 * @method ProductTypeInterface[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|ProductTypeInterface findOneBy(array $criteria)
 * @method ProductTypeInterface[]    findAll()
 */
class ProductTypeRepository extends AbstractRepository
{
    use ProductTypeRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductType::class);
    }

    public function findOneByExternalId(int $externalId): ?ProductTypeInterface
    {
        /** @var ProductTypeInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
