<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_product_types")
 */
class ProductType extends AbstractEntity implements ProductTypeInterface
{
    use ProductTypeTrait;

    protected $hydrateConversions = [
        'id' => 'externalId'
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
     * @ORM\Column(type="integer", unique=true)
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
     * @ORM\JoinTable(name="ldf_product_type_product_type_field")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeField")
     */
    protected $productTypeFields;

    /**
     * @var ProductTypeFormula[]|ArrayCollection
     *
     * @ORM\JoinTable(name="ldf_product_type_product_type_formula")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeFormula")
     */
    protected $productTypeFormulas;

    /**
     * @var ProductTypeVat[]|ArrayCollection
     *
     * @ORM\JoinTable(name="ldf_product_type_product_type_vat")
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
     * @return ProductTypeInterface
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
     * @return ProductType
     */
    public function setExternalId(int $externalId)
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
     * @return ProductTypeInterface
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
     * @return ProductTypeInterface
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
     * @return ProductTypeInterface
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
     * @return ProductTypeInterface
     */
    public function setProductTypeVats($productTypeVats)
    {
        $this->productTypeVats = $productTypeVats;
        return $this;
    }
}
