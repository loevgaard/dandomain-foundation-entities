<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Category;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Repository\Generated\CategoryRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

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
}
