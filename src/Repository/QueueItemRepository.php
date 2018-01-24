<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemInterface;
use Loevgaard\DandomainFoundation\Entity\QueueItem;
use Loevgaard\DandomainFoundation\Repository\Generated\QueueItemRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|QueueItemInterface find($id)
 * @method QueueItemInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|QueueItemInterface findOneBy(array $criteria)
 * @method QueueItemInterface[] findAll()
 */
class QueueItemRepository extends AbstractRepository
{
    use QueueItemRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QueueItem::class);
    }
}
