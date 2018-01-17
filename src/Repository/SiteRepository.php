<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Entity\Site;
use Loevgaard\DandomainFoundation\Repository\Generated\SiteRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SiteRepository extends AbstractRepository
{
    use SiteRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Site::class);
    }

    public function findOneByExternalId(int $externalId): ?SiteInterface
    {
        /** @var SiteInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
