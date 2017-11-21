<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in ProductTypeFormula!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ProductTypeFormulaInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeFormula
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getExternalId(): string;

    /**
     * @param string $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeFormula
     */
    public function setExternalId(string $externalId);

    /**
     * @return null|string
     */
    public function getFormula();

    /**
     * @param null|string $formula
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeFormula
     */
    public function setFormula($formula);

    /**
     * @return int|null
     */
    public function getProductTypeGroupId();

    /**
     * @param int|null $productTypeGroupId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeFormula
     */
    public function setProductTypeGroupId($productTypeGroupId);

    /**
     * @return int|null
     */
    public function getSiteId();

    /**
     * @param int|null $siteId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeFormula
     */
    public function setSiteId($siteId);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductType[]
     */
    public function getProductTypes();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductType[] $productTypes
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeFormula
     */
    public function setProductTypes($productTypes);
}
