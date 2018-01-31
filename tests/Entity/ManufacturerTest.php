<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

final class ManufacturerTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new Manufacturer();
        $this->assertSame(0, $entity->getId());
        $this->assertSame('', $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $products = new ArrayCollection();

        $entity = new Manufacturer();
        $entity
            ->setId(1)
            ->setProducts($products)
        ;

        $this->assertSame(1, $entity->getId());
        $this->assertSame($products, $entity->getProducts());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-manufacturer.json'), true);
        $entity = new Manufacturer();
        $entity->hydrate($data, true);

        $this->assertSame($data['id'], $entity->getExternalId());
        $this->assertSame($data['link'], $entity->getLink());
        $this->assertSame($data['linkText'], $entity->getLinkText());
        $this->assertSame($data['name'], $entity->getName());
    }
}
