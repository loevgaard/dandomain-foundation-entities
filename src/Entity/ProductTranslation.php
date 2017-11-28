<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTranslationTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_product_translations")
 */
class ProductTranslation implements ProductTranslationInterface
{
    use ProductTranslationTrait;
    use Translation;

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
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField01;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField02;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField03;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField04;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField05;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField06;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField07;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField08;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField09;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $customField10;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $expectedDeliveryTime;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $expectedDeliveryTimeNotInStock;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $giftCertificatePdfBackgroundImage;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hidden;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hiddenForMobile;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $imageAltText;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isTopListHidden;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $keyWords;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription2;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $pageTitle;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $rememberToBuyTextHeading;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $rememberToBuyTextSubheading;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $retailSalesPrice;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $shortDescription;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $showAsNew;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $showOnFrontPage;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $techDocLink;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $techDocLink2;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $techDocLink3;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $unitNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $urlName;
}
