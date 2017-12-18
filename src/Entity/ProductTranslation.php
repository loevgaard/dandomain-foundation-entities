<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTranslationTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_product_translations")
 */
class ProductTranslation extends AbstractEntity implements ProductTranslationInterface
{
    use ProductTranslationTrait;
    use Translation;

    protected $hydrateConversions = [
        'siteID' => 'siteId',
        'urlname' => 'urlName'
    ];

    // @todo fix doctrine mapping for these relations
    /**
     * @var Period
     */
    protected $periodFrontPage;

    /**
     * @var Period
     */
    protected $periodHidden;

    /**
     * @var Period
     */
    protected $periodNew;

    /**
     * @var Unit
     */
    protected $unit;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField01;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField02;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField03;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField04;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField05;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField06;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField07;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField08;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField09;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField10;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $expectedDeliveryTime;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $expectedDeliveryTimeNotInStock;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $giftCertificatePdfBackgroundImage;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hidden;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hiddenForMobile;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $imageAltText;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isTopListHidden;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $keyWords;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription2;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $metaDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $pageTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $rememberToBuyTextHeading;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $rememberToBuyTextSubheading;

    /**
     * @var float|null
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $retailSalesPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $shortDescription;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $showAsNew;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $showOnFrontPage;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $techDocLink;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $techDocLink2;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $techDocLink3;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $unitNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $urlName;

    public function hydrate(array $data, bool $useConversions = false, $scalarsOnly = true)
    {
        if (isset($data['expectedDeliveryTime'])) {
            $data['expectedDeliveryTime'] = $this->getDateTimeFromJson($data['expectedDeliveryTime']);
        }

        if (isset($data['expectedDeliveryTimeNotInStock'])) {
            $data['expectedDeliveryTimeNotInStock'] = $this->getDateTimeFromJson($data['expectedDeliveryTimeNotInStock']);
        }

        parent::hydrate($data, $useConversions, $scalarsOnly);
    }

    /**
     * @return Period
     */
    public function getPeriodFrontPage(): Period
    {
        return $this->periodFrontPage;
    }

    /**
     * @param Period $periodFrontPage
     * @return ProductTranslationInterface
     */
    public function setPeriodFrontPage(Period $periodFrontPage)
    {
        $this->periodFrontPage = $periodFrontPage;
        return $this;
    }

    /**
     * @return Period
     */
    public function getPeriodHidden(): Period
    {
        return $this->periodHidden;
    }

    /**
     * @param Period $periodHidden
     * @return ProductTranslationInterface
     */
    public function setPeriodHidden(Period $periodHidden)
    {
        $this->periodHidden = $periodHidden;
        return $this;
    }

    /**
     * @return Period
     */
    public function getPeriodNew(): Period
    {
        return $this->periodNew;
    }

    /**
     * @param Period $periodNew
     * @return ProductTranslationInterface
     */
    public function setPeriodNew(Period $periodNew)
    {
        $this->periodNew = $periodNew;
        return $this;
    }

    /**
     * @return Unit
     */
    public function getUnit(): Unit
    {
        return $this->unit;
    }

    /**
     * @param Unit $unit
     * @return ProductTranslationInterface
     */
    public function setUnit(Unit $unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField01(): ?string
    {
        return $this->customField01;
    }

    /**
     * @param null|string $customField01
     * @return ProductTranslationInterface
     */
    public function setCustomField01(?string $customField01)
    {
        $this->customField01 = $customField01;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField02(): ?string
    {
        return $this->customField02;
    }

    /**
     * @param null|string $customField02
     * @return ProductTranslationInterface
     */
    public function setCustomField02(?string $customField02)
    {
        $this->customField02 = $customField02;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField03(): ?string
    {
        return $this->customField03;
    }

    /**
     * @param null|string $customField03
     * @return ProductTranslationInterface
     */
    public function setCustomField03(?string $customField03)
    {
        $this->customField03 = $customField03;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField04(): ?string
    {
        return $this->customField04;
    }

    /**
     * @param null|string $customField04
     * @return ProductTranslationInterface
     */
    public function setCustomField04(?string $customField04)
    {
        $this->customField04 = $customField04;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField05(): ?string
    {
        return $this->customField05;
    }

    /**
     * @param null|string $customField05
     * @return ProductTranslationInterface
     */
    public function setCustomField05(?string $customField05)
    {
        $this->customField05 = $customField05;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField06(): ?string
    {
        return $this->customField06;
    }

    /**
     * @param null|string $customField06
     * @return ProductTranslationInterface
     */
    public function setCustomField06(?string $customField06)
    {
        $this->customField06 = $customField06;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField07(): ?string
    {
        return $this->customField07;
    }

    /**
     * @param null|string $customField07
     * @return ProductTranslationInterface
     */
    public function setCustomField07(?string $customField07)
    {
        $this->customField07 = $customField07;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField08(): ?string
    {
        return $this->customField08;
    }

    /**
     * @param null|string $customField08
     * @return ProductTranslationInterface
     */
    public function setCustomField08(?string $customField08)
    {
        $this->customField08 = $customField08;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField09(): ?string
    {
        return $this->customField09;
    }

    /**
     * @param null|string $customField09
     * @return ProductTranslationInterface
     */
    public function setCustomField09(?string $customField09)
    {
        $this->customField09 = $customField09;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomField10(): ?string
    {
        return $this->customField10;
    }

    /**
     * @param null|string $customField10
     * @return ProductTranslationInterface
     */
    public function setCustomField10(?string $customField10)
    {
        $this->customField10 = $customField10;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getExpectedDeliveryTime(): ?\DateTimeImmutable
    {
        return $this->expectedDeliveryTime;
    }

    /**
     * @param \DateTimeImmutable|null $expectedDeliveryTime
     * @return ProductTranslationInterface
     */
    public function setExpectedDeliveryTime(?\DateTimeImmutable $expectedDeliveryTime)
    {
        $this->expectedDeliveryTime = $expectedDeliveryTime;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getExpectedDeliveryTimeNotInStock(): ?\DateTimeImmutable
    {
        return $this->expectedDeliveryTimeNotInStock;
    }

    /**
     * @param \DateTimeImmutable|null $expectedDeliveryTimeNotInStock
     * @return ProductTranslationInterface
     */
    public function setExpectedDeliveryTimeNotInStock(?\DateTimeImmutable $expectedDeliveryTimeNotInStock)
    {
        $this->expectedDeliveryTimeNotInStock = $expectedDeliveryTimeNotInStock;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getGiftCertificatePdfBackgroundImage(): ?string
    {
        return $this->giftCertificatePdfBackgroundImage;
    }

    /**
     * @param null|string $giftCertificatePdfBackgroundImage
     * @return ProductTranslationInterface
     */
    public function setGiftCertificatePdfBackgroundImage(?string $giftCertificatePdfBackgroundImage)
    {
        $this->giftCertificatePdfBackgroundImage = $giftCertificatePdfBackgroundImage;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }

    /**
     * @param bool|null $hidden
     * @return ProductTranslationInterface
     */
    public function setHidden(?bool $hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHiddenForMobile(): ?bool
    {
        return $this->hiddenForMobile;
    }

    /**
     * @param bool|null $hiddenForMobile
     * @return ProductTranslationInterface
     */
    public function setHiddenForMobile(?bool $hiddenForMobile)
    {
        $this->hiddenForMobile = $hiddenForMobile;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getImageAltText(): ?string
    {
        return $this->imageAltText;
    }

    /**
     * @param null|string $imageAltText
     * @return ProductTranslationInterface
     */
    public function setImageAltText(?string $imageAltText)
    {
        $this->imageAltText = $imageAltText;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisTopListHidden(): ?bool
    {
        return $this->isTopListHidden;
    }

    /**
     * @param bool|null $isTopListHidden
     * @return ProductTranslationInterface
     */
    public function setIsTopListHidden(?bool $isTopListHidden)
    {
        $this->isTopListHidden = $isTopListHidden;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getKeyWords(): ?string
    {
        return $this->keyWords;
    }

    /**
     * @param null|string $keyWords
     * @return ProductTranslationInterface
     */
    public function setKeyWords(?string $keyWords)
    {
        $this->keyWords = $keyWords;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    /**
     * @param null|string $longDescription
     * @return ProductTranslationInterface
     */
    public function setLongDescription(?string $longDescription)
    {
        $this->longDescription = $longDescription;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLongDescription2(): ?string
    {
        return $this->longDescription2;
    }

    /**
     * @param null|string $longDescription2
     * @return ProductTranslationInterface
     */
    public function setLongDescription2(?string $longDescription2)
    {
        $this->longDescription2 = $longDescription2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param null|string $metaDescription
     * @return ProductTranslationInterface
     */
    public function setMetaDescription(?string $metaDescription)
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return ProductTranslationInterface
     */
    public function setName(?string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPageTitle(): ?string
    {
        return $this->pageTitle;
    }

    /**
     * @param null|string $pageTitle
     * @return ProductTranslationInterface
     */
    public function setPageTitle(?string $pageTitle)
    {
        $this->pageTitle = $pageTitle;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRememberToBuyTextHeading(): ?string
    {
        return $this->rememberToBuyTextHeading;
    }

    /**
     * @param null|string $rememberToBuyTextHeading
     * @return ProductTranslationInterface
     */
    public function setRememberToBuyTextHeading(?string $rememberToBuyTextHeading)
    {
        $this->rememberToBuyTextHeading = $rememberToBuyTextHeading;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRememberToBuyTextSubheading(): ?string
    {
        return $this->rememberToBuyTextSubheading;
    }

    /**
     * @param null|string $rememberToBuyTextSubheading
     * @return ProductTranslationInterface
     */
    public function setRememberToBuyTextSubheading(?string $rememberToBuyTextSubheading)
    {
        $this->rememberToBuyTextSubheading = $rememberToBuyTextSubheading;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getRetailSalesPrice(): ?float
    {
        return $this->retailSalesPrice;
    }

    /**
     * @param float|null $retailSalesPrice
     * @return ProductTranslationInterface
     */
    public function setRetailSalesPrice(?float $retailSalesPrice)
    {
        $this->retailSalesPrice = $retailSalesPrice;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param null|string $shortDescription
     * @return ProductTranslationInterface
     */
    public function setShortDescription(?string $shortDescription)
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowAsNew(): ?bool
    {
        return $this->showAsNew;
    }

    /**
     * @param bool|null $showAsNew
     * @return ProductTranslationInterface
     */
    public function setShowAsNew(?bool $showAsNew)
    {
        $this->showAsNew = $showAsNew;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowOnFrontPage(): ?bool
    {
        return $this->showOnFrontPage;
    }

    /**
     * @param bool|null $showOnFrontPage
     * @return ProductTranslationInterface
     */
    public function setShowOnFrontPage(?bool $showOnFrontPage)
    {
        $this->showOnFrontPage = $showOnFrontPage;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSiteId(): ?int
    {
        return $this->siteId;
    }

    /**
     * @param int|null $siteId
     * @return ProductTranslationInterface
     */
    public function setSiteId(?int $siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return ProductTranslationInterface
     */
    public function setSortOrder(?int $sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTechDocLink(): ?string
    {
        return $this->techDocLink;
    }

    /**
     * @param null|string $techDocLink
     * @return ProductTranslationInterface
     */
    public function setTechDocLink(?string $techDocLink)
    {
        $this->techDocLink = $techDocLink;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTechDocLink2(): ?string
    {
        return $this->techDocLink2;
    }

    /**
     * @param null|string $techDocLink2
     * @return ProductTranslationInterface
     */
    public function setTechDocLink2(?string $techDocLink2)
    {
        $this->techDocLink2 = $techDocLink2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTechDocLink3(): ?string
    {
        return $this->techDocLink3;
    }

    /**
     * @param null|string $techDocLink3
     * @return ProductTranslationInterface
     */
    public function setTechDocLink3(?string $techDocLink3)
    {
        $this->techDocLink3 = $techDocLink3;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUnitNumber(): ?string
    {
        return $this->unitNumber;
    }

    /**
     * @param null|string $unitNumber
     * @return ProductTranslationInterface
     */
    public function setUnitNumber(?string $unitNumber)
    {
        $this->unitNumber = $unitNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUrlName(): ?string
    {
        return $this->urlName;
    }

    /**
     * @param null|string $urlName
     * @return ProductTranslationInterface
     */
    public function setUrlName(?string $urlName)
    {
        $this->urlName = $urlName;
        return $this;
    }
}
