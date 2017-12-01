<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in ProductRelation!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ProductRelationInterface extends AbstractEntityInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\ProductRelation
     */
    public function setId(int $id);

    /**
     * @return int|null
     */
    public function getProductNumber();

    /**
     * @param int|null $productNumber
     * @return \Loevgaard\DandomainFoundation\Entity\ProductRelation
     */
    public function setProductNumber($productNumber);

    /**
     * @return int|null
     */
    public function getRelatedType();

    /**
     * @param int|null $relatedType
     * @return \Loevgaard\DandomainFoundation\Entity\ProductRelation
     */
    public function setRelatedType($relatedType);

    /**
     * @return int|null
     */
    public function getSortOrder();

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\ProductRelation
     */
    public function setSortOrder($sortOrder);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\ProductRelation
     */
    public function setProducts($products);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
