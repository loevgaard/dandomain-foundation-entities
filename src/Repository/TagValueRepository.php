<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;
use Loevgaard\DandomainFoundation\Entity\TagValue;
use Loevgaard\DandomainFoundation\Repository\Generated\TagValueRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|TagValueInterface find($id)
 * @method TagValueInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|TagValueInterface findOneBy(array $criteria)
 * @method TagValueInterface[] findAll()
 */
class TagValueRepository extends AbstractRepository
{
    use TagValueRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TagValue::class);
    }

    public function findOneByExternalId(int $externalId): ?TagValueInterface
    {
        /** @var TagValueInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
