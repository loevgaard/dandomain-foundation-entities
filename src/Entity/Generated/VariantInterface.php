<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Variant!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface VariantInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Variant
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Variant
     */
    public function setExternalId(int $externalId);

    /**
     * @return int|null
     */
    public function getSortOrder();

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\Variant
     */
    public function setSortOrder($sortOrder);

    /**
     * @return null|string
     */
    public function getText();

    /**
     * @param null|string $text
     * @return \Loevgaard\DandomainFoundation\Entity\Variant
     */
    public function setText($text);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getDisabledProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $disabledProducts
     * @return \Loevgaard\DandomainFoundation\Entity\Variant
     */
    public function setDisabledProducts($disabledProducts);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\Variant
     */
    public function setProducts($products);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\VariantGroup[]
     */
    public function getVariantGroups();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\VariantGroup[] $variantGroups
     * @return \Loevgaard\DandomainFoundation\Entity\Variant
     */
    public function setVariantGroups($variantGroups);
}