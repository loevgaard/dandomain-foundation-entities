<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeFormulaInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeFormulaTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_product_type_formulas")
 */
class ProductTypeFormula extends AbstractEntity implements ProductTypeFormulaInterface
{
    use ProductTypeFormulaTrait;

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
    protected $formula;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $productTypeGroupId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

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
     * @return ProductTypeFormulaInterface
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
     * @return ProductTypeFormulaInterface
     */
    public function setExternalId(string $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFormula()
    {
        return $this->formula;
    }

    /**
     * @param null|string $formula
     * @return ProductTypeFormulaInterface
     */
    public function setFormula($formula)
    {
        $this->formula = $formula;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProductTypeGroupId()
    {
        return $this->productTypeGroupId;
    }

    /**
     * @param int|null $productTypeGroupId
     * @return ProductTypeFormulaInterface
     */
    public function setProductTypeGroupId($productTypeGroupId)
    {
        $this->productTypeGroupId = $productTypeGroupId;
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
     * @return ProductTypeFormulaInterface
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
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
     * @return ProductTypeFormulaInterface
     */
    public function setProductTypes($productTypes)
    {
        $this->productTypes = $productTypes;
        return $this;
    }
}
