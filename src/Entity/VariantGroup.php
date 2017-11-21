<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_variant_groups")
 */
class VariantGroup implements VariantGroupInterface
{
    use VariantGroupTrait;

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
     * @ORM\Column(nullable=true, type="string")
     */
    protected $groupName;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $headline;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $selectText;

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
     * @ORM\Column(nullable=true, type="text")
     */
    protected $text;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $variantType;

    /**
     * @var Product[]|ArrayCollection
     */
    protected $products;

    /**
     * @var Variant[]|ArrayCollection
     */
    protected $variants;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->variants = new ArrayCollection();
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
     * @return VariantGroup
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
     * @return VariantGroup
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param null|string $groupName
     * @return VariantGroup
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param null|string $headline
     * @return VariantGroup
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSelectText()
    {
        return $this->selectText;
    }

    /**
     * @param null|string $selectText
     * @return VariantGroup
     */
    public function setSelectText($selectText)
    {
        $this->selectText = $selectText;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param int|null $siteId
     * @return VariantGroup
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
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
     * @return VariantGroup
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     * @return VariantGroup
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVariantType()
    {
        return $this->variantType;
    }

    /**
     * @param int|null $variantType
     * @return VariantGroup
     */
    public function setVariantType($variantType)
    {
        $this->variantType = $variantType;
        return $this;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection|Product[] $products
     * @return VariantGroup
     */
    public function setProducts($products)
    {
        $this->products = $products;
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
     * @return VariantGroup
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
        return $this;
    }
}
