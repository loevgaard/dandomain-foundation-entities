<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in ProductTranslation!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ProductTranslationInterface
{

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function getPeriodFrontPage(): \Loevgaard\DandomainFoundation\Entity\Period;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Period $periodFrontPage
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setPeriodFrontPage(\Loevgaard\DandomainFoundation\Entity\Period $periodFrontPage);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function getPeriodHidden(): \Loevgaard\DandomainFoundation\Entity\Period;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Period $periodHidden
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setPeriodHidden(\Loevgaard\DandomainFoundation\Entity\Period $periodHidden);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function getPeriodNew(): \Loevgaard\DandomainFoundation\Entity\Period;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Period $periodNew
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setPeriodNew(\Loevgaard\DandomainFoundation\Entity\Period $periodNew);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Unit
     */
    public function getUnit(): \Loevgaard\DandomainFoundation\Entity\Unit;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Unit $unit
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setUnit(\Loevgaard\DandomainFoundation\Entity\Unit $unit);

    /**
     * @return null|string
     */
    public function getCustomField01(): ?string;

    /**
     * @param null|string $customField01
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField01(?string $customField01);

    /**
     * @return null|string
     */
    public function getCustomField02(): ?string;

    /**
     * @param null|string $customField02
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField02(?string $customField02);

    /**
     * @return null|string
     */
    public function getCustomField03(): ?string;

    /**
     * @param null|string $customField03
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField03(?string $customField03);

    /**
     * @return null|string
     */
    public function getCustomField04(): ?string;

    /**
     * @param null|string $customField04
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField04(?string $customField04);

    /**
     * @return null|string
     */
    public function getCustomField05(): ?string;

    /**
     * @param null|string $customField05
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField05(?string $customField05);

    /**
     * @return null|string
     */
    public function getCustomField06(): ?string;

    /**
     * @param null|string $customField06
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField06(?string $customField06);

    /**
     * @return null|string
     */
    public function getCustomField07(): ?string;

    /**
     * @param null|string $customField07
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField07(?string $customField07);

    /**
     * @return null|string
     */
    public function getCustomField08(): ?string;

    /**
     * @param null|string $customField08
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField08(?string $customField08);

    /**
     * @return null|string
     */
    public function getCustomField09(): ?string;

    /**
     * @param null|string $customField09
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField09(?string $customField09);

    /**
     * @return null|string
     */
    public function getCustomField10(): ?string;

    /**
     * @param null|string $customField10
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setCustomField10(?string $customField10);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getExpectedDeliveryTime(): ?\DateTimeImmutable;

    /**
     * @param \DateTimeImmutable|null $expectedDeliveryTime
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setExpectedDeliveryTime(?\DateTimeImmutable $expectedDeliveryTime);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getExpectedDeliveryTimeNotInStock(): ?\DateTimeImmutable;

    /**
     * @param \DateTimeImmutable|null $expectedDeliveryTimeNotInStock
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setExpectedDeliveryTimeNotInStock(?\DateTimeImmutable $expectedDeliveryTimeNotInStock);

    /**
     * @return null|string
     */
    public function getGiftCertificatePdfBackgroundImage(): ?string;

    /**
     * @param null|string $giftCertificatePdfBackgroundImage
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setGiftCertificatePdfBackgroundImage(?string $giftCertificatePdfBackgroundImage);

    /**
     * @return bool|null
     */
    public function getHidden(): ?bool;

    /**
     * @param bool|null $hidden
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setHidden(?bool $hidden);

    /**
     * @return bool|null
     */
    public function getHiddenForMobile(): ?bool;

    /**
     * @param bool|null $hiddenForMobile
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setHiddenForMobile(?bool $hiddenForMobile);

    /**
     * @return null|string
     */
    public function getImageAltText(): ?string;

    /**
     * @param null|string $imageAltText
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setImageAltText(?string $imageAltText);

    /**
     * @return bool|null
     */
    public function getisTopListHidden(): ?bool;

    /**
     * @param bool|null $isTopListHidden
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setIsTopListHidden(?bool $isTopListHidden);

    /**
     * @return null|string
     */
    public function getKeyWords(): ?string;

    /**
     * @param null|string $keyWords
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setKeyWords(?string $keyWords);

    /**
     * @return null|string
     */
    public function getLongDescription(): ?string;

    /**
     * @param null|string $longDescription
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setLongDescription(?string $longDescription);

    /**
     * @return null|string
     */
    public function getLongDescription2(): ?string;

    /**
     * @param null|string $longDescription2
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setLongDescription2(?string $longDescription2);

    /**
     * @return null|string
     */
    public function getMetaDescription(): ?string;

    /**
     * @param null|string $metaDescription
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setMetaDescription(?string $metaDescription);

    /**
     * @return null|string
     */
    public function getName(): ?string;

    /**
     * @param null|string $name
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setName(?string $name);

    /**
     * @return null|string
     */
    public function getPageTitle(): ?string;

    /**
     * @param null|string $pageTitle
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setPageTitle(?string $pageTitle);

    /**
     * @return null|string
     */
    public function getRememberToBuyTextHeading(): ?string;

    /**
     * @param null|string $rememberToBuyTextHeading
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setRememberToBuyTextHeading(?string $rememberToBuyTextHeading);

    /**
     * @return null|string
     */
    public function getRememberToBuyTextSubheading(): ?string;

    /**
     * @param null|string $rememberToBuyTextSubheading
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setRememberToBuyTextSubheading(?string $rememberToBuyTextSubheading);

    /**
     * @return float|null
     */
    public function getRetailSalesPrice(): ?float;

    /**
     * @param float|null $retailSalesPrice
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setRetailSalesPrice(?float $retailSalesPrice);

    /**
     * @return null|string
     */
    public function getShortDescription(): ?string;

    /**
     * @param null|string $shortDescription
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setShortDescription(?string $shortDescription);

    /**
     * @return bool|null
     */
    public function getShowAsNew(): ?bool;

    /**
     * @param bool|null $showAsNew
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setShowAsNew(?bool $showAsNew);

    /**
     * @return bool|null
     */
    public function getShowOnFrontPage(): ?bool;

    /**
     * @param bool|null $showOnFrontPage
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setShowOnFrontPage(?bool $showOnFrontPage);

    /**
     * @return int|null
     */
    public function getSiteId(): ?int;

    /**
     * @param int|null $siteId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setSiteId(?int $siteId);

    /**
     * @return int|null
     */
    public function getSortOrder(): ?int;

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setSortOrder(?int $sortOrder);

    /**
     * @return null|string
     */
    public function getTechDocLink(): ?string;

    /**
     * @param null|string $techDocLink
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setTechDocLink(?string $techDocLink);

    /**
     * @return null|string
     */
    public function getTechDocLink2(): ?string;

    /**
     * @param null|string $techDocLink2
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setTechDocLink2(?string $techDocLink2);

    /**
     * @return null|string
     */
    public function getTechDocLink3(): ?string;

    /**
     * @param null|string $techDocLink3
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setTechDocLink3(?string $techDocLink3);

    /**
     * @return null|string
     */
    public function getUnitNumber(): ?string;

    /**
     * @param null|string $unitNumber
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setUnitNumber(?string $unitNumber);

    /**
     * @return null|string
     */
    public function getUrlName(): ?string;

    /**
     * @param null|string $urlName
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTranslation
     */
    public function setUrlName(?string $urlName);

    /**
     * Returns object id.
     *
     * @return \Loevgaard\DandomainFoundation\Entity\mixed
     */
    public function getId();

    /**
     * Sets entity, that this translation should be mapped to.
     *
     * @param \Loevgaard\DandomainFoundation\Entity\Translatable $translatable The translatable
     *
     * @return $this
     */
    public function setTranslatable($translatable);

    /**
     * Returns entity, that this translation is mapped to.
     *
     * @return \Loevgaard\DandomainFoundation\Entity\Translatable
     */
    public function getTranslatable();

    /**
     * Sets locale name for this translation.
     *
     * @param string $locale The locale
     *
     * @return $this
     */
    public function setLocale($locale);

    /**
     * Returns this translation locale.
     *
     * @return string
     */
    public function getLocale();

    /**
     * Tells if translation is empty
     *
     * @return bool true if translation is not filled
     */
    public function isEmpty();
}
