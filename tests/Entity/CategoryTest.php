<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class CategoryTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new Category();
        $this->assertSame(0, $entity->getId());
        $this->assertSame(0, $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $childrenCategories = new ArrayCollection();
        $parentCategories = new ArrayCollection();
        $products = new ArrayCollection();
        $segments = new ArrayCollection();
        $parentIdList = [1];
        $segmentIdList = [2];
        $entity = new Category();
        $entity
            ->setId(1)
            ->setParentIdList($parentIdList)
            ->setSegmentIdList($segmentIdList)
            ->setChildrenCategories($childrenCategories)
            ->setParentCategories($parentCategories)
            ->setProducts($products)
            ->setSegments($segments)
        ;

        $this->assertSame(1, $entity->getId());
        $this->assertSame($parentIdList, $entity->getParentIdList());
        $this->assertSame($segmentIdList, $entity->getSegmentIdList());
        $this->assertSame($childrenCategories, $entity->getChildrenCategories());
        $this->assertSame($parentCategories, $entity->getParentCategories());
        $this->assertSame($products, $entity->getProducts());
        $this->assertSame($segments, $entity->getSegments());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-category.json'), true);
        $entity = new Category();
        $entity->hydrate($data, true);

        $createdDate = DateTimeImmutable::createFromJson($data['createdDate']);
        $editedDate = DateTimeImmutable::createFromJson($data['editedDate']);

        $this->assertSame($data['b2BGroupId'], $entity->getB2bGroupId());
        $this->assertSame($data['customInfoLayout'], $entity->getCustomInfoLayout());
        $this->assertSame($data['customListLayout'], $entity->getCustomListLayout());
        $this->assertSame($data['defaultParentId'], $entity->getDefaultParentId());
        $this->assertSame($data['infoLayout'], $entity->getInfoLayout());
        $this->assertSame($data['internalId'], $entity->getExternalId());
        $this->assertSame($data['listLayout'], $entity->getListLayout());
        $this->assertSame($data['modified'], $entity->getModified());
        $this->assertSame($data['number'], $entity->getNumber());
        $this->assertEquals($createdDate, $entity->getCreatedDate());
        $this->assertEquals($editedDate, $entity->getEditedDate());
    }

    public function testAddParentCategory()
    {
        $entity = new Category();
        $entityParent = new Category();
        $entity->addParentCategory($entityParent);

        $this->assertCount(1, $entity->getParentCategories());
    }

    public function testHasParentCategory1()
    {
        $entity = new Category();
        $entity2 = new Category();
        $entity->addParentCategory($entity2);

        $this->assertTrue($entity->hasParentCategory($entity2));
    }

    public function testHasParentCategory2()
    {
        $entity = new Category();
        $entity2 = new Category();
        $entity2->setExternalId(1);
        $entity->addParentCategory($entity2);

        $this->assertTrue($entity->hasParentCategory(1));
    }

    public function testRemoveParentCategory()
    {
        $entity = new Category();
        $entity2 = new Category();
        $entity->addParentCategory($entity2);
        $entity->removeParentCategory($entity2);

        $this->assertCount(0, $entity->getParentCategories());
    }

    public function testClearParentCategories()
    {
        $entity = new Category();
        $entity2 = new Category();
        $entity->addParentCategory($entity2);

        $entity2 = new Category();
        $entity->addParentCategory($entity2);

        $entity->clearParentCategories();

        $this->assertCount(0, $entity->getParentCategories());
    }
}
