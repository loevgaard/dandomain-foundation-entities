<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;
use Loevgaard\DandomainFoundation\Entity\PaymentMethod;
use Loevgaard\DandomainFoundation\Repository\Generated\PaymentMethodRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method null|PaymentMethodInterface find($id)
 * @method PaymentMethodInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|PaymentMethodInterface findOneBy(array $criteria)
 * @method PaymentMethodInterface[] findAll()
 */
class PaymentMethodRepository extends AbstractRepository
{
    use PaymentMethodRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PaymentMethod::class);
    }

    public function findOneByExternalId(int $externalId): ?PaymentMethodInterface
    {
        /** @var PaymentMethodInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }
}
