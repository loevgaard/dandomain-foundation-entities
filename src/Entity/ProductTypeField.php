<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeFieldInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeFieldTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_product_type_fields")
 */
class ProductTypeField extends AbstractEntity implements ProductTypeFieldInterface
{
    use ProductTypeFieldTrait;

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
     * @ORM\Column(type="string", unique=true)
     */
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $label;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $languageId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $number;

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
     * @return ProductTypeField
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
     * @return ProductTypeField
     */
    public function setExternalId(string $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param null|string $label
     * @return ProductTypeField
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param int|null $languageId
     * @return ProductTypeField
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     * @return ProductTypeField
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
     * @return ProductTypeField
     */
    public function setProductTypes($productTypes)
    {
        $this->productTypes = $productTypes;
        return $this;
    }
}
