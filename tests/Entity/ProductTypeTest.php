<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

final class ProductTypeTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new ProductType();
        $this->assertSame(0, $entity->getId());
        $this->assertSame(0, $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $fields = new ArrayCollection();
        $formulae = new ArrayCollection();
        $vats = new ArrayCollection();

        $entity = new ProductType();
        $entity
            ->setId(1)
            ->setProductTypeFields($fields)
            ->setProductTypeFormulas($formulae)
            ->setProductTypeVats($vats)
        ;

        $this->assertSame(1, $entity->getId());
        $this->assertSame($fields, $entity->getProductTypeFields());
        $this->assertSame($formulae, $entity->getProductTypeFormulas());
        $this->assertSame($vats, $entity->getProductTypeVats());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-product-type.json'), true);
        $entity = new ProductType();
        $entity->hydrate($data, true);

        $this->assertSame($data['id'], $entity->getExternalId());
        $this->assertSame($data['name'], $entity->getName());
    }
}
