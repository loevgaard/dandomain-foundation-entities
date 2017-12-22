<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use PHPUnit\Framework\TestCase;

final class SiteTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new Site();
        $this->assertSame(0, $entity->getId());
        $this->assertSame(0, $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $entity = new Site();
        $entity
            ->setId(1)
        ;

        $this->assertSame(1, $entity->getId());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-site.json'), true);
        $entity = new Site();
        $entity->hydrate($data, true);

        $this->assertSame($data['countryId'], $entity->getCountryId());
        $this->assertSame($data['currencyCode'], $entity->getCurrencyCode());
        $this->assertSame($data['id'], $entity->getExternalId());
        $this->assertSame($data['name'], $entity->getName());
    }
}