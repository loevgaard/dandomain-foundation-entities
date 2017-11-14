<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Site!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface SiteInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return SiteInterface
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     * @return SiteInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int|null
     */
    public function getCountryId();

    /**
     * @param int|null $countryId
     * @return SiteInterface
     */
    public function setCountryId($countryId);

    /**
     * @return null|string
     */
    public function getCurrencyCode();

    /**
     * @param null|string $currencyCode
     * @return SiteInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return SiteInterface
     */
    public function setName($name);
}
