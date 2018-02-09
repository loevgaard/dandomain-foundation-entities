<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Assert\Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\MediumInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PriceInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductRelationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTrait;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\SegmentInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_products", indexes={
 *     @ORM\Index(name="is_variant_master", columns={"is_variant_master"})
 * }, uniqueConstraints={
 *     @ORM\UniqueConstraint(name="external_id", columns={"external_id"}),
 *     @ORM\UniqueConstraint(name="number", columns={"number"})
 * })
 * @ORM\HasLifecycleCallbacks()
 *
 * @method ProductTranslationInterface translate(string $locale = null, bool $fallbackToDefault = true)
 */
class Product extends AbstractEntity implements ProductInterface
{
    use ProductTrait;
    use Timestampable;
    use SoftDeletable;
    use Translatable;

    protected $hydrateConversions = [
        'id' => 'externalId',
    ];

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
     * @ORM\Column(name="external_id", type="integer", nullable=true)
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
     * @ORM\Column(nullable=true, type="text")
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
     * @ORM\Column(name="is_variant_master", nullable=true, type="boolean")
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
     * The product number.
     *
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=191)
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
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="products")
     * @ORM\JoinTable(name="ldf_products_categories")
     */
    protected $categories;

    /**
     * @var Variant[]|ArrayCollection
     */
    protected $disabledVariants;

    /**
     * @var Manufacturer[]|ArrayCollection
     *
     * @ORM\JoinTable(name="ldf_product_manufacturer")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Manufacturer")
     */
    protected $manufacturers;

    /**
     * @var Medium[]|ArrayCollection
     */
    protected $media;

    /**
     * @var PriceInterface[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Price", mappedBy="product", cascade={"persist", "remove"}, orphanRemoval=true)
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
     *
     * @ORM\JoinTable(name="ldf_product_variant_group")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="VariantGroup")
     */
    protected $variantGroups;

    /**
     * @var Variant[]|ArrayCollection
     */
    protected $variants;

    /**
     * This is the master for this product.
     *
     * @var Product|null
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="children")
     */
    protected $parent;

    /**
     * This is the children (i.e. variants) of this products.
     *
     * @var Product[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Product", mappedBy="parent")
     */
    protected $children;

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
        $this->children = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->number;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function validate()
    {
        Assert::that($this->number)
            ->string('The number needs to be string', 'number')
            ->maxLength(191, 'The number must have a max length of 191');
        Assert::thatNullOr($this->externalId)->integer('['.$this->number.'] The external id can only be null or an integer', 'externalId');

        if (is_null($this->externalId)) {
            Assert::that($this->isDeleted())->true('['.$this->number.'] The external id can only be null if the product is marked as deleted', 'externalId');
        }
    }

    public function hydrate(array $data, bool $useConversions = false, $scalarsOnly = true)
    {
        if (isset($data['created'])) {
            $data['created'] = $this->getDateTimeFromJson($data['created']);
        }

        if (isset($data['updated'])) {
            $data['updated'] = $this->getDateTimeFromJson($data['updated']);
        }

        parent::hydrate($data, $useConversions, $scalarsOnly);
    }

    /*
     * Collection/relation methods
     */

    public function addDisabledVariant(VariantInterface $variant): ProductInterface
    {
        if (!$this->disabledVariants->contains($variant)) {
            $this->disabledVariants->add($variant);
        }

        return $this;
    }

    public function addMedium(MediumInterface $medium): ProductInterface
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
        }

        return $this;
    }

    public function addCategory(CategoryInterface $category): ProductInterface
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function addManufacturer(ManufacturerInterface $manufacturer): ProductInterface
    {
        if (!$this->hasManufacturer($manufacturer)) {
            $this->manufacturers->add($manufacturer);
        }

        return $this;
    }

    public function removeManufacturer(ManufacturerInterface $manufacturer): bool
    {
        return $this->manufacturers->removeElement($manufacturer);
    }

    public function hasManufacturer(ManufacturerInterface $manufacturer): bool
    {
        return $this->manufacturers->exists(function ($key, ManufacturerInterface $element) use ($manufacturer) {
            return $element->getExternalId() === $manufacturer->getExternalId();
        });
    }

    public function clearManufacturers() : void
    {
        $this->manufacturers->clear();
    }

    public function addVariantGroup(VariantGroupInterface $variantGroup): ProductInterface
    {
        if (!$this->hasVariantGroup($variantGroup)) {
            $this->variantGroups->add($variantGroup);
        }

        return $this;
    }

    public function removeVariantGroup(VariantGroupInterface $variantGroup): bool
    {
        return $this->variantGroups->removeElement($variantGroup);
    }

    public function clearVariantGroups() : void
    {
        $this->variantGroups->clear();
    }

    public function hasVariantGroup($variantGroup): bool
    {
        if ($variantGroup instanceof VariantGroupInterface) {
            $variantGroup = $variantGroup->getExternalId();
        }

        return $this->variantGroups->exists(function ($key, VariantGroupInterface $element) use ($variantGroup) {
            return $element->getExternalId() === $variantGroup;
        });
    }

    public function addPrice(PriceInterface $price): ProductInterface
    {
        if (!$this->prices->contains($price)) {
            $this->prices->add($price);
            $price->setProduct($this);
        }

        return $this;
    }

    /**
     * @param PriceInterface[] $prices
     */
    public function updatePrices(array $prices): void
    {
        // this holds the final array of prices, whether updated or added
        $finalPrices = [];

        foreach ($prices as $price) {
            $existingPrice = $this->findPrice($price);

            if ($existingPrice) {
                $existingPrice->copyProperties($price);
                $existingPrice->setProduct($this);
                $finalPrices[] = $existingPrice;
            } else {
                $this->addPrice($price);
                $price->setProduct($this);
                $finalPrices[] = $price;
            }
        }

        foreach ($this->prices as $price) {
            if (!in_array($price, $finalPrices, true)) {
                $this->removePrice($price);
            }
        }
    }

    public function removePrice(PriceInterface $price): bool
    {
        $price->setProduct(null);

        return $this->prices->removeElement($price);
    }

    public function clearPrices() : void
    {
        foreach ($this->prices as $price) {
            $price->setProduct(null);
        }

        $this->prices->clear();
    }

    /**
     * Will try to find a price based on currency.
     *
     * @param string|\Money\Currency|CurrencyInterface $currency
     *
     * @return PriceInterface|null
     */
    public function findPriceByCurrency($currency): ?PriceInterface
    {
        if ($currency instanceof \Money\Currency) {
            $currency = $currency->getCode();
        } elseif ($currency instanceof CurrencyInterface) {
            $currency = $currency->getIsoCodeAlpha();
        }

        if (!is_string($currency)) {
            throw new \InvalidArgumentException('$currency has to be a string');
        }

        foreach ($this->prices as $price) {
            if ($price->getCurrency()->getIsoCodeAlpha() === $currency) {
                return $price;
            }
        }

        return null;
    }

    public function addProductRelation(ProductRelationInterface $productRelation): ProductInterface
    {
        if (!$this->productRelations->contains($productRelation)) {
            $this->productRelations->add($productRelation);
        }

        return $this;
    }

    public function addSegment(SegmentInterface $segment): ProductInterface
    {
        if (!$this->segments->contains($segment)) {
            $this->segments->add($segment);
        }

        return $this;
    }

    public function addVariant(VariantInterface $variant): ProductInterface
    {
        if (!$this->variants->contains($variant)) {
            $this->variants->add($variant);
        }

        return $this;
    }

    public function addChild(ProductInterface $product): ProductInterface
    {
        if (!$this->hasChild($product)) {
            $this->children->add($product);
            $product->setParent($this);
        }

        return $this;
    }

    public function removeChild(ProductInterface $product): bool
    {
        $product->setParent(null);

        return $this->children->removeElement($product);
    }

    public function hasChild($product): bool
    {
        if ($product instanceof ProductInterface) {
            $product = $product->getExternalId();
        }

        return $this->children->exists(function ($key, ProductInterface $element) use ($product) {
            return $element->getExternalId() === $product;
        });
    }

    /*
     * Getters / Setters
     */

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     *
     * @return ProductInterface
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
        return (int) $this->externalId;
    }

    /**
     * @param int $externalId
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
     */
    public function setGoogleFeedCategory($googleFeedCategory)
    {
        $this->googleFeedCategory = $googleFeedCategory;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsGiftCertificate()
    {
        return $this->isGiftCertificate;
    }

    /**
     * @param bool|null $isGiftCertificate
     *
     * @return ProductInterface
     */
    public function setIsGiftCertificate($isGiftCertificate)
    {
        $this->isGiftCertificate = $isGiftCertificate;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsModified()
    {
        return $this->isModified;
    }

    /**
     * @param bool|null $isModified
     *
     * @return ProductInterface
     */
    public function setIsModified($isModified)
    {
        $this->isModified = $isModified;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsRateVariants()
    {
        return $this->isRateVariants;
    }

    /**
     * @param bool|null $isRateVariants
     *
     * @return ProductInterface
     */
    public function setIsRateVariants($isRateVariants)
    {
        $this->isRateVariants = $isRateVariants;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsReviewVariants()
    {
        return $this->isReviewVariants;
    }

    /**
     * @param bool|null $isReviewVariants
     *
     * @return ProductInterface
     */
    public function setIsReviewVariants($isReviewVariants)
    {
        $this->isReviewVariants = $isReviewVariants;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsVariantMaster()
    {
        return $this->isVariantMaster;
    }

    /**
     * @param bool|null $isVariantMaster
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B)
    {
        $this->minBuyAmountB2B = $minBuyAmountB2B;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return (string) $this->number;
    }

    /**
     * @param string $number
     *
     * @return ProductInterface
     */
    public function setNumber(string $number)
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
     */
    public function setProductRelations($productRelations)
    {
        $this->productRelations = $productRelations;

        return $this;
    }

    /**
     * @return ProductTypeInterface
     */
    public function getProductType(): ProductTypeInterface
    {
        return $this->productType;
    }

    /**
     * @param ProductType $productType
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
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
     *
     * @return ProductInterface
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;

        return $this;
    }

    /**
     * @return ProductInterface|null
     */
    public function getParent(): ?ProductInterface
    {
        return $this->parent;
    }

    /**
     * @param ProductInterface|null $parent
     *
     * @return Product
     */
    public function setParent(?ProductInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param ArrayCollection|Product[] $children
     *
     * @return Product
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * This method will try to find a price based on the unique constraint defined in price.
     *
     * @param PriceInterface $searchPrice
     *
     * @return PriceInterface|null
     */
    protected function findPrice(PriceInterface $searchPrice): ?PriceInterface
    {
        foreach ($this->prices as $price) {
            if ($price->getAmount() == $searchPrice->getAmount() && $price->getB2bGroupId() == $searchPrice->getB2bGroupId() && $price->getCurrency()->getId() == $searchPrice->getCurrency()->getId()) {
                return $price;
            }
        }

        return null;
    }
}
