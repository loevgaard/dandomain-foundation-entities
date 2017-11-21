<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in ProductTypeVat!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ProductTypeVatInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeVat
     */
    public function setId(int $id);

    /**
     * @return null|string
     */
    public function getCountry();

    /**
     * @param null|string $country
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeVat
     */
    public function setCountry($country);

    /**
     * @return int|null
     */
    public function getCountryId();

    /**
     * @param int|null $countryId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeVat
     */
    public function setCountryId($countryId);

    /**
     * @return int|null
     */
    public function getSiteId();

    /**
     * @param int|null $siteId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeVat
     */
    public function setSiteId($siteId);

    /**
     * @return null|string
     */
    public function getVatPct();

    /**
     * @param null|string $vatPct
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeVat
     */
    public function setVatPct($vatPct);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductType[]
     */
    public function getProductTypes();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductType[] $productTypes
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeVat
     */
    public function setProductTypes($productTypes);
}
