<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeVatInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeVatTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_product_type_vats")
 */
class ProductTypeVat extends AbstractEntity implements ProductTypeVatInterface
{
    use ProductTypeVatTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $country;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $countryId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $vatPct;

    /**
     * @var ProductType[]|ArrayCollection
     */
    protected $productTypes;

    public function __construct()
    {
        $this->productTypes = new ArrayCollection();
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
     * @return ProductTypeVatInterface
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param null|string $country
     * @return ProductTypeVatInterface
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param int|null $countryId
     * @return ProductTypeVatInterface
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
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
     * @return ProductTypeVatInterface
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getVatPct()
    {
        return $this->vatPct;
    }

    /**
     * @param null|string $vatPct
     * @return ProductTypeVatInterface
     */
    public function setVatPct($vatPct)
    {
        $this->vatPct = $vatPct;
        return $this;
    }

    /**
     * @return ArrayCollection|ProductType[]
     */
    public function getProductTypes()
    {
        return $this->productTypes;
    }

    /**
     * @param ArrayCollection|ProductType[] $productTypes
     * @return ProductTypeVatInterface
     */
    public function setProductTypes($productTypes)
    {
        $this->productTypes = $productTypes;
        return $this;
    }
}
