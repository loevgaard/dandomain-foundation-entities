<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Entity\Site;
use Loevgaard\DandomainFoundation\Repository\Generated\SiteRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|SiteInterface find($id)
 * @method SiteInterface[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|SiteInterface findOneBy(array $criteria)
 * @method SiteInterface[]    findAll()
 */
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
