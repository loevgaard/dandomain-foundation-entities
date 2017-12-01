<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTrait;
use Loevgaard\DandomainFoundation\Entity\Generated\MediumInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PriceInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductRelationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\SegmentInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_products")
 * @method ProductTranslationInterface translate(string $locale = null, bool $fallbackToDefault = true)
 */
class Product implements ProductInterface
{
    use ProductTrait;
    use Timestampable;
    use SoftDeletable;
    use Translatable;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $barCodeNumber;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $categoryIdList;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $comments;

    /**
     * @var float|null
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $costPrice;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable", options={"comment"="Created info from Dandomain"})
     */
    protected $created;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191, options={"comment"="Created by info from Dandomain"})
     */
    protected $createdBy;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $defaultCategoryId;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $disabledVariantIdList;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $edbPriserProductNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $fileSaleLink;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $googleFeedCategory;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isGiftCertificate;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isModified;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isRateVariants;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isReviewVariants;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isVariantMaster;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $locationNumber;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $manufacturereIdList;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $maxBuyAmount;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $minBuyAmount;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $minBuyAmountB2B;

    /**
     * The product number
     *
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $number;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $picture;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $salesCount;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $segmentIdList;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $stockCount;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $stockLimit;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $typeId;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable", options={"comment"="Updated info from Dandomain"})
     */
    protected $updated;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191, options={"comment"="Updated by info from Dandomain"})
     */
    protected $updatedBy;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $variantGroupIdList;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $variantIdList;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $variantMasterId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $vendorNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $weight;

    /**
     * @var Category[]|ArrayCollection
     */
    protected $categories;

    /**
     * @var Variant[]|ArrayCollection
     */
    protected $disabledVariants;

    /**
     * @var Manufacturer[]|ArrayCollection
     *
     * @ORM\JoinTable(name="loevgaard_dandomain_product_manufacturer")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Manufacturer")
     */
    protected $manufacturers;

    /**
     * @var Medium[]|ArrayCollection
     */
    protected $media;

    /**
     * @var Price[]|ArrayCollection
     */
    protected $prices;

    /**
     * @var ProductRelation[]|ArrayCollection
     */
    protected $productRelations;

    /**
     * @var ProductType
     */
    protected $productType;

    /**
     * @var Segment[]|ArrayCollection
     */
    protected $segments;

    /**
     * @var VariantGroup[]|ArrayCollection
     */
    protected $variantGroups;

    /**
     * @var Variant[]|ArrayCollection
     */
    protected $variants;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->disabledVariants = new ArrayCollection();
        $this->manufacturers = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->prices = new ArrayCollection();
        $this->productRelations = new ArrayCollection();
        $this->segments = new ArrayCollection();
        $this->variants = new ArrayCollection();
        $this->variantGroups = new ArrayCollection();
    }

    public function addDisabledVariant(VariantInterface $variant) : ProductInterface
    {
        if(!$this->disabledVariants->contains($variant)) {
            $this->disabledVariants->add($variant);
        }

        return $this;
    }

    public function addMedium(MediumInterface $medium) : ProductInterface
    {
        if(!$this->media->contains($medium)) {
            $this->media->add($medium);
        }

        return $this;
    }

    public function addCategory(CategoryInterface $category) : ProductInterface
    {
        if(!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function addManufacturer(ManufacturerInterface $manufacturer) : ProductInterface
    {
        if(!$this->manufacturers->exists(function($key, ManufacturerInterface $element) use ($manufacturer) {
            return $element->getExternalId() === $manufacturer->getExternalId();
        })) {
            $this->manufacturers->add($manufacturer);
        }

        return $this;
    }

    public function removeManufacturer(ManufacturerInterface $manufacturer) : bool
    {
        return $this->manufacturers->removeElement($manufacturer);
    }

    public function addPrice(PriceInterface $price) : ProductInterface
    {
        if(!$this->prices->contains($price)) {
            $this->prices->add($price);
        }

        return $this;
    }

    public function addProductRelation(ProductRelationInterface $productRelation) : ProductInterface
    {
        if(!$this->productRelations->contains($productRelation)) {
            $this->productRelations->add($productRelation);
        }

        return $this;
    }

    public function addSegment(SegmentInterface $segment) : ProductInterface
    {
        if(!$this->segments->contains($segment)) {
            $this->segments->add($segment);
        }

        return $this;
    }

    public function addVariant(VariantInterface $variant) : ProductInterface
    {
        if(!$this->variants->contains($variant)) {
            $this->variants->add($variant);
        }

        return $this;
    }

    public function addVariantGroup(VariantGroupInterface $variantGroup) : ProductInterface
    {
        if(!$this->variantGroups->contains($variantGroup)) {
            $this->variantGroups->add($variantGroup);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return (int)$this->externalId;
    }

    /**
     * @param int $externalId
     * @return Product
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBarCodeNumber()
    {
        return $this->barCodeNumber;
    }

    /**
     * @param null|string $barCodeNumber
     * @return Product
     */
    public function setBarCodeNumber($barCodeNumber)
    {
        $this->barCodeNumber = $barCodeNumber;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCategoryIdList()
    {
        return $this->categoryIdList;
    }

    /**
     * @param array|null $categoryIdList
     * @return Product
     */
    public function setCategoryIdList($categoryIdList)
    {
        $this->categoryIdList = $categoryIdList;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param null|string $comments
     * @return Product
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * @param float|null $costPrice
     * @return Product
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTimeImmutable|null $created
     * @return Product
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param null|string $createdBy
     * @return Product
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDefaultCategoryId()
    {
        return $this->defaultCategoryId;
    }

    /**
     * @param int|null $defaultCategoryId
     * @return Product
     */
    public function setDefaultCategoryId($defaultCategoryId)
    {
        $this->defaultCategoryId = $defaultCategoryId;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getDisabledVariantIdList()
    {
        return $this->disabledVariantIdList;
    }

    /**
     * @param array|null $disabledVariantIdList
     * @return Product
     */
    public function setDisabledVariantIdList($disabledVariantIdList)
    {
        $this->disabledVariantIdList = $disabledVariantIdList;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEdbPriserProductNumber()
    {
        return $this->edbPriserProductNumber;
    }

    /**
     * @param null|string $edbPriserProductNumber
     * @return Product
     */
    public function setEdbPriserProductNumber($edbPriserProductNumber)
    {
        $this->edbPriserProductNumber = $edbPriserProductNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFileSaleLink()
    {
        return $this->fileSaleLink;
    }

    /**
     * @param null|string $fileSaleLink
     * @return Product
     */
    public function setFileSaleLink($fileSaleLink)
    {
        $this->fileSaleLink = $fileSaleLink;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getGoogleFeedCategory()
    {
        return $this->googleFeedCategory;
    }

    /**
     * @param null|string $googleFeedCategory
     * @return Product
     */
    public function setGoogleFeedCategory($googleFeedCategory)
    {
        $this->googleFeedCategory = $googleFeedCategory;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisGiftCertificate()
    {
        return $this->isGiftCertificate;
    }

    /**
     * @param bool|null $isGiftCertificate
     * @return Product
     */
    public function setIsGiftCertificate($isGiftCertificate)
    {
        $this->isGiftCertificate = $isGiftCertificate;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisModified()
    {
        return $this->isModified;
    }

    /**
     * @param bool|null $isModified
     * @return Product
     */
    public function setIsModified($isModified)
    {
        $this->isModified = $isModified;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisRateVariants()
    {
        return $this->isRateVariants;
    }

    /**
     * @param bool|null $isRateVariants
     * @return Product
     */
    public function setIsRateVariants($isRateVariants)
    {
        $this->isRateVariants = $isRateVariants;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisReviewVariants()
    {
        return $this->isReviewVariants;
    }

    /**
     * @param bool|null $isReviewVariants
     * @return Product
     */
    public function setIsReviewVariants($isReviewVariants)
    {
        $this->isReviewVariants = $isReviewVariants;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisVariantMaster()
    {
        return $this->isVariantMaster;
    }

    /**
     * @param bool|null $isVariantMaster
     * @return Product
     */
    public function setIsVariantMaster($isVariantMaster)
    {
        $this->isVariantMaster = $isVariantMaster;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocationNumber()
    {
        return $this->locationNumber;
    }

    /**
     * @param null|string $locationNumber
     * @return Product
     */
    public function setLocationNumber($locationNumber)
    {
        $this->locationNumber = $locationNumber;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getManufacturereIdList()
    {
        return $this->manufacturereIdList;
    }

    /**
     * @param array|null $manufacturereIdList
     * @return Product
     */
    public function setManufacturereIdList($manufacturereIdList)
    {
        $this->manufacturereIdList = $manufacturereIdList;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxBuyAmount()
    {
        return $this->maxBuyAmount;
    }

    /**
     * @param int|null $maxBuyAmount
     * @return Product
     */
    public function setMaxBuyAmount($maxBuyAmount)
    {
        $this->maxBuyAmount = $maxBuyAmount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinBuyAmount()
    {
        return $this->minBuyAmount;
    }

    /**
     * @param int|null $minBuyAmount
     * @return Product
     */
    public function setMinBuyAmount($minBuyAmount)
    {
        $this->minBuyAmount = $minBuyAmount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinBuyAmountB2B()
    {
        return $this->minBuyAmountB2B;
    }

    /**
     * @param int|null $minBuyAmountB2B
     * @return Product
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B)
    {
        $this->minBuyAmountB2B = $minBuyAmountB2B;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param null|string $number
     * @return Product
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param null|string $picture
     * @return Product
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSalesCount()
    {
        return $this->salesCount;
    }

    /**
     * @param int|null $salesCount
     * @return Product
     */
    public function setSalesCount($salesCount)
    {
        $this->salesCount = $salesCount;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getSegmentIdList()
    {
        return $this->segmentIdList;
    }

    /**
     * @param array|null $segmentIdList
     * @return Product
     */
    public function setSegmentIdList($segmentIdList)
    {
        $this->segmentIdList = $segmentIdList;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return Product
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStockCount()
    {
        return $this->stockCount;
    }

    /**
     * @param int|null $stockCount
     * @return Product
     */
    public function setStockCount($stockCount)
    {
        $this->stockCount = $stockCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStockLimit()
    {
        return $this->stockLimit;
    }

    /**
     * @param int|null $stockLimit
     * @return Product
     */
    public function setStockLimit($stockLimit)
    {
        $this->stockLimit = $stockLimit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param int|null $typeId
     * @return Product
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTimeImmutable|null $updated
     * @return Product
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * @param null|string $updatedBy
     * @return Product
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getVariantGroupIdList()
    {
        return $this->variantGroupIdList;
    }

    /**
     * @param array|null $variantGroupIdList
     * @return Product
     */
    public function setVariantGroupIdList($variantGroupIdList)
    {
        $this->variantGroupIdList = $variantGroupIdList;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getVariantIdList()
    {
        return $this->variantIdList;
    }

    /**
     * @param array|null $variantIdList
     * @return Product
     */
    public function setVariantIdList($variantIdList)
    {
        $this->variantIdList = $variantIdList;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVariantMasterId()
    {
        return $this->variantMasterId;
    }

    /**
     * @param int|null $variantMasterId
     * @return Product
     */
    public function setVariantMasterId($variantMasterId)
    {
        $this->variantMasterId = $variantMasterId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getVendorNumber()
    {
        return $this->vendorNumber;
    }

    /**
     * @param null|string $vendorNumber
     * @return Product
     */
    public function setVendorNumber($vendorNumber)
    {
        $this->vendorNumber = $vendorNumber;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int|null $weight
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return ArrayCollection|Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param ArrayCollection|Category[] $categories
     * @return Product
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return ArrayCollection|Variant[]
     */
    public function getDisabledVariants()
    {
        return $this->disabledVariants;
    }

    /**
     * @param ArrayCollection|Variant[] $disabledVariants
     * @return Product
     */
    public function setDisabledVariants($disabledVariants)
    {
        $this->disabledVariants = $disabledVariants;
        return $this;
    }

    /**
     * @return ArrayCollection|Manufacturer[]
     */
    public function getManufacturers()
    {
        return $this->manufacturers;
    }

    /**
     * @param ArrayCollection|Manufacturer[] $manufacturers
     * @return Product
     */
    public function setManufacturers($manufacturers)
    {
        $this->manufacturers = $manufacturers;
        return $this;
    }

    /**
     * @return ArrayCollection|Medium[]
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param ArrayCollection|Medium[] $media
     * @return Product
     */
    public function setMedia($media)
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @return ArrayCollection|Price[]
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param ArrayCollection|Price[] $prices
     * @return Product
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
        return $this;
    }

    /**
     * @return ArrayCollection|ProductRelation[]
     */
    public function getProductRelations()
    {
        return $this->productRelations;
    }

    /**
     * @param ArrayCollection|ProductRelation[] $productRelations
     * @return Product
     */
    public function setProductRelations($productRelations)
    {
        $this->productRelations = $productRelations;
        return $this;
    }

    /**
     * @return ProductType
     */
    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    /**
     * @param ProductType $productType
     * @return Product
     */
    public function setProductType(ProductType $productType)
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return ArrayCollection|Segment[]
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * @param ArrayCollection|Segment[] $segments
     * @return Product
     */
    public function setSegments($segments)
    {
        $this->segments = $segments;
        return $this;
    }

    /**
     * @return ArrayCollection|VariantGroup[]
     */
    public function getVariantGroups()
    {
        return $this->variantGroups;
    }

    /**
     * @param ArrayCollection|VariantGroup[] $variantGroups
     * @return Product
     */
    public function setVariantGroups($variantGroups)
    {
        $this->variantGroups = $variantGroups;
        return $this;
    }

    /**
     * @return ArrayCollection|Variant[]
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * @param ArrayCollection|Variant[] $variants
     * @return Product
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
        return $this;
    }
}
