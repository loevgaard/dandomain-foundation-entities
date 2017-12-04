<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductRelationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductRelationTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_product_relations")
 */
class ProductRelation extends AbstractEntity implements ProductRelationInterface
{
    use ProductRelationTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $productNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $relatedType;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="productRelations", targetEntity="Product")
     */
    protected $products;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return ProductRelation
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * @param int|null $productNumber
     * @return ProductRelation
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRelatedType()
    {
        return $this->relatedType;
    }

    /**
     * @param int|null $relatedType
     * @return ProductRelation
     */
    public function setRelatedType($relatedType)
    {
        $this->relatedType = $relatedType;
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
     * @return ProductRelation
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
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
     * @return ProductRelation
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}
