<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in VariantGroup!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface VariantGroupInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setExternalId(int $externalId);

    /**
     * @return null|string
     */
    public function getGroupName();

    /**
     * @param null|string $groupName
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setGroupName($groupName);

    /**
     * @return null|string
     */
    public function getHeadline();

    /**
     * @param null|string $headline
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setHeadline($headline);

    /**
     * @return null|string
     */
    public function getSelectText();

    /**
     * @param null|string $selectText
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setSelectText($selectText);

    /**
     * @return int|null
     */
    public function getSiteId();

    /**
     * @param int|null $siteId
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setSiteId($siteId);

    /**
     * @return int|null
     */
    public function getSortOrder();

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setSortOrder($sortOrder);

    /**
     * @return null|string
     */
    public function getText();

    /**
     * @param null|string $text
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setText($text);

    /**
     * @return int|null
     */
    public function getVariantType();

    /**
     * @param int|null $variantType
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setVariantType($variantType);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setProducts($products);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Variant[]
     */
    public function getVariants();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Variant[] $variants
     * @return \Loevgaard\DandomainFoundation\Entity\VariantGroup
     */
    public function setVariants($variants);
}
