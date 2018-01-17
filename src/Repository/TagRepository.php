<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;
use Loevgaard\DandomainFoundation\Entity\Tag;
use Loevgaard\DandomainFoundation\Repository\Generated\TagRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TagRepository extends AbstractRepository
{
    use TagRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tag::class);
    }

    public function findOneByExternalId(int $externalId): ?TagInterface
    {
        /** @var TagInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
