<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;
use Loevgaard\DandomainFoundation\Entity\VariantGroup;
use Loevgaard\DandomainFoundation\Repository\Generated\VariantGroupRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|VariantGroupInterface find($id)
 * @method VariantGroupInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|VariantGroupInterface findOneBy(array $criteria)
 * @method VariantGroupInterface[] findAll()
 */
class VariantGroupRepository extends AbstractRepository
{
    use VariantGroupRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VariantGroup::class);
    }

    public function findOneByExternalId(int $externalId): ?VariantGroupInterface
    {
        /** @var VariantGroupInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
