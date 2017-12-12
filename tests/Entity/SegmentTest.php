<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

final class SegmentTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new Segment();
        $this->assertSame(0, $entity->getId());
        $this->assertSame('', $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $categories = new ArrayCollection();
        $products = new ArrayCollection();
        $segmentOptions = [];

        $entity = new Segment();
        $entity
            ->setId(1)
            ->setCategories($categories)
            ->setProducts($products)
            ->setSegmentOptions($segmentOptions)
        ;

        $this->assertSame(1, $entity->getId());
        $this->assertSame($categories, $entity->getCategories());
        $this->assertSame($products, $entity->getProducts());
        $this->assertSame($segmentOptions, $entity->getSegmentOptions());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-segment.json'), true);
        $entity = new Segment();
        $entity->hydrate($data, true);

        $this->assertSame($data['id'], $entity->getExternalId());
    }
}
