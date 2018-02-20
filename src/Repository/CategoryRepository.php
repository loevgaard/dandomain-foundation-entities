<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Category;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Repository\Generated\CategoryRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|CategoryInterface find($id)
 * @method CategoryInterface[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|CategoryInterface findOneBy(array $criteria)
 * @method CategoryInterface[]    findAll()
 */
class CategoryRepository extends AbstractRepository
{
    use CategoryRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findOneByNumber(string $number): ?CategoryInterface
    {
        /** @var CategoryInterface $obj */
        $obj = $this->findOneBy([
            'number' => $number,
        ]);

        return $obj;
    }

    public function findOneByExternalId(int $externalId): ?CategoryInterface
    {
        /** @var CategoryInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
