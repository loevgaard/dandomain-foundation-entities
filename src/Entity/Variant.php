<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_variants")
 */
class Variant extends AbstractEntity implements VariantInterface
{
    use VariantTrait;

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
    protected $text;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="disabledVariants", targetEntity="Product")
     */
    protected $disabledProducts;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="variants", targetEntity="Product")
     */
    protected $products;

    /**
     * @var VariantGroup[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="variants", targetEntity="VariantGroup")
     */
    protected $variantGroups;

    public function __construct()
    {
        $this->disabledProducts = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->variantGroups = new ArrayCollection();
    }

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
     * @return VariantInterface
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
     * @return VariantInterface
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;

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
     * @return VariantInterface
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
     *
     * @return VariantInterface
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getDisabledProducts()
    {
        return $this->disabledProducts;
    }

    /**
     * @param ArrayCollection|Product[] $disabledProducts
     *
     * @return VariantInterface
     */
    public function setDisabledProducts($disabledProducts)
    {
        $this->disabledProducts = $disabledProducts;

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
     *
     * @return VariantInterface
     */
    public function setProducts($products)
    {
        $this->products = $products;

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
     * @return VariantInterface
     */
    public function setVariantGroups($variantGroups)
    {
        $this->variantGroups = $variantGroups;

        return $this;
    }
}
