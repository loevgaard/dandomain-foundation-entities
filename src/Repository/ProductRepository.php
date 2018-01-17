<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Product;
use Loevgaard\DandomainFoundation\Repository\Generated\ProductRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|ProductInterface find($id)
 * @method ProductInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|ProductInterface findOneBy(array $criteria)
 * @method ProductInterface[] findAll()
 */
class ProductRepository extends AbstractRepository
{
    use ProductRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findOneByExternalId(int $externalId): ?ProductInterface
    {
        /** @var ProductInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }

    /**
     * @param string $number
     *
     * @return ProductInterface|null
     */
    public function findOneByNumber(string $number): ?ProductInterface
    {
        /** @var ProductInterface $obj */
        $obj = $this->findOneBy([
            'number' => $number,
        ]);

        return $obj;
    }
}
