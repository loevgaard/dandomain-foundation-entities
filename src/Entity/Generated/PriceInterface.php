<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Price!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface PriceInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setId(int $id);

    /**
     * @return int|null
     */
    public function getAmount();

    /**
     * @param int|null $amount
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setAmount($amount);

    /**
     * @return int|null
     */
    public function getAvance();

    /**
     * @param int|null $avance
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setAvance($avance);

    /**
     * @return null|string
     */
    public function getB2bGroupId();

    /**
     * @param null|string $b2bGroupId
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * @return null|string
     */
    public function getCurrencyCode();

    /**
     * @param null|string $currencyCode
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return int|null
     */
    public function getIsoCode();

    /**
     * @param int|null $isoCode
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setIsoCode($isoCode);

    /**
     * @return \Money\Money|null
     */
    public function getSpecialOfferPrice();

    /**
     * @param \Money\Money|null $specialOfferPrice
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setSpecialOfferPrice(\Money\Money $specialOfferPrice = null);

    /**
     * @return \Money\Money|null
     */
    public function getUnitPrice();

    /**
     * @param \Money\Money|null $unitPrice
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setUnitPrice(\Money\Money $unitPrice = null);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Period|null
     */
    public function getPeriod();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Period|null $period
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setPeriod($period);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\Price
     */
    public function setProducts($products);
}
