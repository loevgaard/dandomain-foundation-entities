<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Delivery!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface DeliveryInterface
{

    /**
     * Populates a customer based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/OrderService/help/operations/GetOrder
     *
     * @param \stdClass|array $data
     * @return DeliveryInterface
     */
    public function populateFromApiResponse($data);

    /**
     * @return integer
     */
    public function getId();

    /**
     * @param integer $id
     * @return Delivery
     */
    public function setId($id);

    /**
     * @return null|string
     */
    public function getAddress();

    /**
     * @param null|string $address
     * @return Delivery
     */
    public function setAddress($address);

    /**
     * @return null|string
     */
    public function getAddress2();

    /**
     * @param null|string $address2
     * @return Delivery
     */
    public function setAddress2($address2);

    /**
     * @return null|string
     */
    public function getAttention();

    /**
     * @param null|string $attention
     * @return Delivery
     */
    public function setAttention($attention);

    /**
     * @return null|string
     */
    public function getCity();

    /**
     * @param null|string $city
     * @return Delivery
     */
    public function setCity($city);

    /**
     * @return null|string
     */
    public function getCountry();

    /**
     * @param null|string $country
     * @return Delivery
     */
    public function setCountry($country);

    /**
     * @return int|null
     */
    public function getCountryId();

    /**
     * @param int|null $countryId
     * @return Delivery
     */
    public function setCountryId($countryId);

    /**
     * @return null|string
     */
    public function getCvr();

    /**
     * @param null|string $cvr
     * @return Delivery
     */
    public function setCvr($cvr);

    /**
     * @return null|string
     */
    public function getEan();

    /**
     * @param null|string $ean
     * @return Delivery
     */
    public function setEan($ean);

    /**
     * @return null|string
     */
    public function getEmail();

    /**
     * @param null|string $email
     * @return Delivery
     */
    public function setEmail($email);

    /**
     * @return null|string
     */
    public function getFax();

    /**
     * @param null|string $fax
     * @return Delivery
     */
    public function setFax($fax);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return Delivery
     */
    public function setName($name);

    /**
     * @return null|string
     */
    public function getPhone();

    /**
     * @param null|string $phone
     * @return Delivery
     */
    public function setPhone($phone);

    /**
     * @return null|string
     */
    public function getState();

    /**
     * @param null|string $state
     * @return Delivery
     */
    public function setState($state);

    /**
     * @return null|string
     */
    public function getZipCode();

    /**
     * @param null|string $zipCode
     * @return Delivery
     */
    public function setZipCode($zipCode);
}
