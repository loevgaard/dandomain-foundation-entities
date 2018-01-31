<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Doctrine\ORM\ORMException;
use Doctrine\ORM\UnexpectedResultException;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Product;
use Loevgaard\DandomainFoundation\Repository\Generated\ProductRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|ProductInterface find($id)
 * @method ProductInterface[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|ProductInterface findOneBy(array $criteria)
 * @method ProductInterface[]    findAll()
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

    /**
     * @param array $productIds
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateParentChildRelationships(array $productIds = [])
    {
        $variantMasterIdCache = [];

        $innerQb = $this->createQueryBuilder('p');
        $innerQb->where('p.isVariantMaster = 1')
            ->andWhere('p.number = :number');

        $qb = $this->createQueryBuilder('p');
        $qb
            ->where('p.isVariantMaster = 0')
            ->andWhere('p.variantMasterId is not null')
        ;

        if (count($productIds)) {
            $qb->andWhere($qb->expr()->in('p.id', ':productIds'));
            $qb->setParameter('productIds', $productIds);
        }

        $batchSize = 50;
        $i = 1;

        $iterableResult = $qb->getQuery()->iterate();
        foreach ($iterableResult as $row) {
            /** @var ProductInterface $product */
            $product = $row[0];

            if (!isset($variantMasterIdCache[$product->getVariantMasterId()])) {
                try {
                    /** @var ProductInterface $parent */
                    $parent = $innerQb->setParameter(
                        'number',
                        $product->getVariantMasterId()
                    )->getQuery()->getSingleResult();
                    $parent = $parent->getId();
                } catch (UnexpectedResultException $e) {
                    $parent = null;
                }

                $variantMasterIdCache[$product->getVariantMasterId()] = $parent;
            }

            $ref = $variantMasterIdCache[$product->getVariantMasterId()];
            if ($ref) {
                try {
                    $ref = $this->getEntityManager()->getReference(Product::class, $ref);
                } catch (ORMException $e) {
                    $ref = null;
                }
            }

            $product->setParent($ref);

            if (0 === ($i % $batchSize)) {
                $this->getEntityManager()->flush();
                $this->getEntityManager()->clear();
            }

            ++$i;
        }

        $this->getEntityManager()->flush();
    }
}
