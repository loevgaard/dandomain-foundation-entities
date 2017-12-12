<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new Product();
        $this->assertSame(0, $entity->getId());
        $this->assertSame(0, $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $entity = new Product();
        $entity
            ->setId(1)
        ;

        $this->assertSame(1, $entity->getId());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-product-data.json'), true);
        $entity = new Product();
        $entity->hydrate($data, true);

        $created = DateTimeImmutable::createFromJson($data['created']);
        $updated = DateTimeImmutable::createFromJson($data['updated']);

        $this->assertSame($data['barCodeNumber'], $entity->getBarCodeNumber());
        $this->assertSame($data['comments'], $entity->getComments());
        $this->assertSame($data['costPrice'], $entity->getCostPrice());
        $this->assertEquals($created, $entity->getCreated());
        $this->assertSame($data['createdBy'], $entity->getCreatedBy());
        $this->assertSame($data['defaultCategoryId'], $entity->getDefaultCategoryId());
        $this->assertSame($data['edbPriserProductNumber'], $entity->getEdbPriserProductNumber());
        $this->assertSame($data['fileSaleLink'], $entity->getFileSaleLink());
        $this->assertSame($data['googleFeedCategory'], $entity->getGoogleFeedCategory());
        $this->assertSame($data['id'], $entity->getExternalId());
        $this->assertSame($data['isGiftCertificate'], $entity->getIsGiftCertificate());
        $this->assertSame($data['isModified'], $entity->getIsModified());
        $this->assertSame($data['isRateVariants'], $entity->getIsRateVariants());
        $this->assertSame($data['isReviewVariants'], $entity->getIsReviewVariants());
        $this->assertSame($data['isVariantMaster'], $entity->getIsVariantMaster());
        $this->assertSame($data['locationNumber'], $entity->getLocationNumber());
        $this->assertSame($data['maxBuyAmount'], $entity->getMaxBuyAmount());
        $this->assertSame($data['minBuyAmount'], $entity->getMinBuyAmount());
        $this->assertSame($data['minBuyAmountB2B'], $entity->getMinBuyAmountB2B());
        $this->assertSame($data['number'], $entity->getNumber());
        $this->assertSame($data['picture'], $entity->getPicture());
        $this->assertSame($data['salesCount'], $entity->getSalesCount());
        $this->assertSame($data['sortOrder'], $entity->getSortOrder());
        $this->assertSame($data['stockCount'], $entity->getStockCount());
        $this->assertSame($data['stockLimit'], $entity->getStockLimit());
        $this->assertSame($data['typeId'], $entity->getTypeId());
        $this->assertEquals($updated, $entity->getUpdated());
        $this->assertSame($data['updatedBy'], $entity->getUpdatedBy());
        $this->assertSame($data['variantMasterId'], $entity->getVariantMasterId());
        $this->assertSame($data['vendorNumber'], $entity->getVendorNumber());
        $this->assertSame($data['weight'], $entity->getWeight());
    }
}
