<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_product_types")
 */
class ProductType implements ProductTypeInterface
{
    use ProductTypeTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, length=191)
     */
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @var ProductTypeField[]|ArrayCollection
     *
     * @ORM\JoinTable(name="loevgaard_dandomain_product_type_product_type_field")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeField")
     */
    protected $productTypeFields;

    /**
     * @var ProductTypeFormula[]|ArrayCollection
     *
     * @ORM\JoinTable(name="loevgaard_dandomain_product_type_product_type_formula")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeFormula")
     */
    protected $productTypeFormulas;

    /**
     * @var ProductTypeVat[]|ArrayCollection
     *
     * @ORM\JoinTable(name="loevgaard_dandomain_product_type_product_type_vat")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeVat")
     */
    protected $productTypeVats;

    public function __construct()
    {
        $this->productTypeFields = new ArrayCollection();
        $this->productTypeFormulas = new ArrayCollection();
        $this->productTypeVats = new ArrayCollection();
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
     * @return ProductType
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return (string)$this->externalId;
    }

    /**
     * @param string $externalId
     * @return ProductType
     */
    public function setExternalId(string $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return ProductType
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return ArrayCollection|ProductTypeField[]
     */
    public function getProductTypeFields()
    {
        return $this->productTypeFields;
    }

    /**
     * @param ArrayCollection|ProductTypeField[] $productTypeFields
     * @return ProductType
     */
    public function setProductTypeFields($productTypeFields)
    {
        $this->productTypeFields = $productTypeFields;
        return $this;
    }

    /**
     * @return ArrayCollection|ProductTypeFormula[]
     */
    public function getProductTypeFormulas()
    {
        return $this->productTypeFormulas;
    }

    /**
     * @param ArrayCollection|ProductTypeFormula[] $productTypeFormulas
     * @return ProductType
     */
    public function setProductTypeFormulas($productTypeFormulas)
    {
        $this->productTypeFormulas = $productTypeFormulas;
        return $this;
    }

    /**
     * @return ArrayCollection|ProductTypeVat[]
     */
    public function getProductTypeVats()
    {
        return $this->productTypeVats;
    }

    /**
     * @param ArrayCollection|ProductTypeVat[] $productTypeVats
     * @return ProductType
     */
    public function setProductTypeVats($productTypeVats)
    {
        $this->productTypeVats = $productTypeVats;
        return $this;
    }
}