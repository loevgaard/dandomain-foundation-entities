<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Product!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ProductInterface extends AbstractEntityInterface
{

    
    public function addDisabledVariant(\Loevgaard\DandomainFoundation\Entity\Generated\VariantInterface $variant): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function addMedium(\Loevgaard\DandomainFoundation\Entity\Generated\MediumInterface $medium): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function addCategory(\Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface $category): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function addManufacturer(\Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface $manufacturer): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function removeManufacturer(\Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface $manufacturer): bool;

    
    public function addPrice(\Loevgaard\DandomainFoundation\Entity\Generated\PriceInterface $price): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function addProductRelation(\Loevgaard\DandomainFoundation\Entity\Generated\ProductRelationInterface $productRelation): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function addSegment(\Loevgaard\DandomainFoundation\Entity\Generated\SegmentInterface $segment): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function addVariant(\Loevgaard\DandomainFoundation\Entity\Generated\VariantInterface $variant): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    
    public function addVariantGroup(\Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface $variantGroup): \Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setExternalId(int $externalId);

    /**
     * @return null|string
     */
    public function getBarCodeNumber();

    /**
     * @param null|string $barCodeNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setBarCodeNumber($barCodeNumber);

    /**
     * @return array|null
     */
    public function getCategoryIdList();

    /**
     * @param array|null $categoryIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setCategoryIdList($categoryIdList);

    /**
     * @return null|string
     */
    public function getComments();

    /**
     * @param null|string $comments
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setComments($comments);

    /**
     * @return float|null
     */
    public function getCostPrice();

    /**
     * @param float|null $costPrice
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setCostPrice($costPrice);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreated();

    /**
     * @param \DateTimeImmutable|null $created
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setCreated($created);

    /**
     * @return null|string
     */
    public function getCreatedBy();

    /**
     * @param null|string $createdBy
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setCreatedBy($createdBy);

    /**
     * @return int|null
     */
    public function getDefaultCategoryId();

    /**
     * @param int|null $defaultCategoryId
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setDefaultCategoryId($defaultCategoryId);

    /**
     * @return array|null
     */
    public function getDisabledVariantIdList();

    /**
     * @param array|null $disabledVariantIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setDisabledVariantIdList($disabledVariantIdList);

    /**
     * @return null|string
     */
    public function getEdbPriserProductNumber();

    /**
     * @param null|string $edbPriserProductNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setEdbPriserProductNumber($edbPriserProductNumber);

    /**
     * @return null|string
     */
    public function getFileSaleLink();

    /**
     * @param null|string $fileSaleLink
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setFileSaleLink($fileSaleLink);

    /**
     * @return null|string
     */
    public function getGoogleFeedCategory();

    /**
     * @param null|string $googleFeedCategory
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setGoogleFeedCategory($googleFeedCategory);

    /**
     * @return bool|null
     */
    public function getisGiftCertificate();

    /**
     * @param bool|null $isGiftCertificate
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setIsGiftCertificate($isGiftCertificate);

    /**
     * @return bool|null
     */
    public function getisModified();

    /**
     * @param bool|null $isModified
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setIsModified($isModified);

    /**
     * @return bool|null
     */
    public function getisRateVariants();

    /**
     * @param bool|null $isRateVariants
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setIsRateVariants($isRateVariants);

    /**
     * @return bool|null
     */
    public function getisReviewVariants();

    /**
     * @param bool|null $isReviewVariants
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setIsReviewVariants($isReviewVariants);

    /**
     * @return bool|null
     */
    public function getisVariantMaster();

    /**
     * @param bool|null $isVariantMaster
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setIsVariantMaster($isVariantMaster);

    /**
     * @return null|string
     */
    public function getLocationNumber();

    /**
     * @param null|string $locationNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setLocationNumber($locationNumber);

    /**
     * @return array|null
     */
    public function getManufacturereIdList();

    /**
     * @param array|null $manufacturereIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setManufacturereIdList($manufacturereIdList);

    /**
     * @return int|null
     */
    public function getMaxBuyAmount();

    /**
     * @param int|null $maxBuyAmount
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setMaxBuyAmount($maxBuyAmount);

    /**
     * @return int|null
     */
    public function getMinBuyAmount();

    /**
     * @param int|null $minBuyAmount
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setMinBuyAmount($minBuyAmount);

    /**
     * @return int|null
     */
    public function getMinBuyAmountB2B();

    /**
     * @param int|null $minBuyAmountB2B
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B);

    /**
     * @return null|string
     */
    public function getNumber();

    /**
     * @param null|string $number
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setNumber($number);

    /**
     * @return null|string
     */
    public function getPicture();

    /**
     * @param null|string $picture
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setPicture($picture);

    /**
     * @return int|null
     */
    public function getSalesCount();

    /**
     * @param int|null $salesCount
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setSalesCount($salesCount);

    /**
     * @return array|null
     */
    public function getSegmentIdList();

    /**
     * @param array|null $segmentIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setSegmentIdList($segmentIdList);

    /**
     * @return int|null
     */
    public function getSortOrder();

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setSortOrder($sortOrder);

    /**
     * @return int|null
     */
    public function getStockCount();

    /**
     * @param int|null $stockCount
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setStockCount($stockCount);

    /**
     * @return int|null
     */
    public function getStockLimit();

    /**
     * @param int|null $stockLimit
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setStockLimit($stockLimit);

    /**
     * @return int|null
     */
    public function getTypeId();

    /**
     * @param int|null $typeId
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setTypeId($typeId);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getUpdated();

    /**
     * @param \DateTimeImmutable|null $updated
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setUpdated($updated);

    /**
     * @return null|string
     */
    public function getUpdatedBy();

    /**
     * @param null|string $updatedBy
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setUpdatedBy($updatedBy);

    /**
     * @return array|null
     */
    public function getVariantGroupIdList();

    /**
     * @param array|null $variantGroupIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setVariantGroupIdList($variantGroupIdList);

    /**
     * @return array|null
     */
    public function getVariantIdList();

    /**
     * @param array|null $variantIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setVariantIdList($variantIdList);

    /**
     * @return int|null
     */
    public function getVariantMasterId();

    /**
     * @param int|null $variantMasterId
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setVariantMasterId($variantMasterId);

    /**
     * @return null|string
     */
    public function getVendorNumber();

    /**
     * @param null|string $vendorNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setVendorNumber($vendorNumber);

    /**
     * @return int|null
     */
    public function getWeight();

    /**
     * @param int|null $weight
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setWeight($weight);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[]
     */
    public function getCategories();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[] $categories
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setCategories($categories);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Variant[]
     */
    public function getDisabledVariants();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Variant[] $disabledVariants
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setDisabledVariants($disabledVariants);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Manufacturer[]
     */
    public function getManufacturers();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Manufacturer[] $manufacturers
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setManufacturers($manufacturers);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Medium[]
     */
    public function getMedia();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Medium[] $media
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setMedia($media);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Price[]
     */
    public function getPrices();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Price[] $prices
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setPrices($prices);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductRelation[]
     */
    public function getProductRelations();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductRelation[] $productRelations
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setProductRelations($productRelations);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\ProductType
     */
    public function getProductType(): \Loevgaard\DandomainFoundation\Entity\ProductType;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\ProductType $productType
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setProductType(\Loevgaard\DandomainFoundation\Entity\ProductType $productType);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Segment[]
     */
    public function getSegments();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Segment[] $segments
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setSegments($segments);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\VariantGroup[]
     */
    public function getVariantGroups();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\VariantGroup[] $variantGroups
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setVariantGroups($variantGroups);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Variant[]
     */
    public function getVariants();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Variant[] $variants
     * @return \Loevgaard\DandomainFoundation\Entity\Product
     */
    public function setVariants($variants);

    
    public function hydrate(array $data);

    
    public function extract(): array;

    /**
     * Returns createdAt value.
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Returns updatedAt value.
     *
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Updates createdAt and updatedAt timestamps.
     */
    public function updateTimestamps();

    /**
     * Marks entity as deleted.
     */
    public function delete();

    /**
     * Restore entity by undeleting it
     */
    public function restore();

    /**
     * Checks whether the entity has been deleted.
     *
     * @return \Loevgaard\DandomainFoundation\Entity\Boolean
     */
    public function isDeleted();

    /**
     * Checks whether the entity will be deleted.
     *
     * @return \Loevgaard\DandomainFoundation\Entity\Boolean
     */
    public function willBeDeleted(\DateTime $at = null);

    /**
     * Returns date on which entity was been deleted.
     *
     * @return \Loevgaard\DandomainFoundation\Entity\DateTime|null
     */
    public function getDeletedAt();

    /**
     * Set the delete date to given date.
     *
     * @param \Loevgaard\DandomainFoundation\Entity\DateTime $date
     * @param \Loevgaard\DandomainFoundation\Entity\Object
     *
     * @return $this
     */
    public function setDeletedAt(\DateTime $date);

    /**
     * Returns collection of translations.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTranslations();

    /**
     * Returns collection of new translations.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getNewTranslations();

    /**
     * Adds new translation.
     *
     * @param \Loevgaard\DandomainFoundation\Entity\Translation $translation The translation
     *
     * @return $this
     */
    public function addTranslation($translation);

    /**
     * Removes specific translation.
     *
     * @param \Loevgaard\DandomainFoundation\Entity\Translation $translation The translation
     */
    public function removeTranslation($translation);

    /**
     * Returns translation for specific locale (creates new one if doesn&#039;t exists).
     * If requested translation doesn&#039;t exist, it will first try to fallback default locale
     * If any translation doesn&#039;t exist, it will be added to newTranslations collection.
     * In order to persist new translations, call mergeNewTranslations method, before flush
     *
     * @param string $locale The locale (en, ru, fr) | null If null, will try with current locale
     * @param bool $fallbackToDefault Whether fallback to default locale
     *
     * @return \Loevgaard\DandomainFoundation\Entity\Translation
     */
    public function translate($locale = null, $fallbackToDefault = true);

    /**
     * Merges newly created translations into persisted translations.
     */
    public function mergeNewTranslations();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\mixed $locale the current locale
     */
    public function setCurrentLocale($locale);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Returns the current locale
     */
    public function getCurrentLocale();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\mixed $locale the default locale
     */
    public function setDefaultLocale($locale);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Returns the default locale
     */
    public function getDefaultLocale();
}
