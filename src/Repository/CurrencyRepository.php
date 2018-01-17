<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Loevgaard\DandomainFoundation\Entity\Currency;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Repository\Generated\CurrencyRepositoryTrait;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CurrencyRepository extends AbstractRepository
{
    use CurrencyRepositoryTrait;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Currency::class);
    }

    public function findOneByExternalId(string $externalId): ?CurrencyInterface
    {
        /** @var CurrencyInterface $obj */
        $obj = $this->_findOneByExternalId($externalId);

        return $obj;
    }

    public function findOneByCode(string $code): ?CurrencyInterface
    {
        /** @var CurrencyInterface $obj */
        $obj = $this->findOneBy([
            'code' => $code
        ]);

        return $obj;
    }
}
