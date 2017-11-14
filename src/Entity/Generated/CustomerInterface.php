<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Customer!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface CustomerInterface
{

    /**
     * Populates a customer based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/CustomerService/help/operations/GetCustomer
     *
     * @param \stdClass|array $data
     * @return CustomerInterface
     */
    public function populateFromApiResponse($data);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return CustomerInterface
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     * @return CustomerInterface
     */
    public function setExternalId($externalId);

    /**
     * @return null|string
     */
    public function getAddress();

    /**
     * @param null|string $address
     * @return CustomerInterface
     */
    public function setAddress($address);

    /**
     * @return null|string
     */
    public function getAddress2();

    /**
     * @param null|string $address2
     * @return CustomerInterface
     */
    public function setAddress2($address2);

    /**
     * @return null|string
     */
    public function getAttention();

    /**
     * @param null|string $attention
     * @return CustomerInterface
     */
    public function setAttention($attention);

    /**
     * @return null|string
     */
    public function getCity();

    /**
     * @param null|string $city
     * @return CustomerInterface
     */
    public function setCity($city);

    /**
     * @return null|string
     */
    public function getCountry();

    /**
     * @param null|string $country
     * @return CustomerInterface
     */
    public function setCountry($country);

    /**
     * @return null|string
     */
    public function getEan();

    /**
     * @param null|string $ean
     * @return CustomerInterface
     */
    public function setEan($ean);

    /**
     * @return null|string
     */
    public function getEmail();

    /**
     * @param null|string $email
     * @return CustomerInterface
     */
    public function setEmail($email);

    /**
     * @return null|string
     */
    public function getFax();

    /**
     * @param null|string $fax
     * @return CustomerInterface
     */
    public function setFax($fax);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return CustomerInterface
     */
    public function setName($name);

    /**
     * @return null|string
     */
    public function getPhone();

    /**
     * @param null|string $phone
     * @return CustomerInterface
     */
    public function setPhone($phone);

    /**
     * @return null|string
     */
    public function getState();

    /**
     * @param null|string $state
     * @return CustomerInterface
     */
    public function setState($state);

    /**
     * @return null|string
     */
    public function getZipCode();

    /**
     * @param null|string $zipCode
     * @return CustomerInterface
     */
    public function setZipCode($zipCode);

    /**
     * @return null|string
     */
    public function getCvr();

    /**
     * @param null|string $cvr
     * @return CustomerInterface
     */
    public function setCvr($cvr);

    /**
     * @return null|string
     */
    public function getB2bGroupId();

    /**
     * @param null|string $b2bGroupId
     * @return CustomerInterface
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * @return null|string
     */
    public function getComments();

    /**
     * @param null|string $comments
     * @return CustomerInterface
     */
    public function setComments($comments);

    /**
     * @return int|null
     */
    public function getCountryId();

    /**
     * @param int|null $countryId
     * @return CustomerInterface
     */
    public function setCountryId($countryId);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedDate();

    /**
     * @param \DateTimeImmutable|null $createdDate
     * @return CustomerInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * @return null|string
     */
    public function getCustomerGroupId();

    /**
     * @param null|string $customerGroupId
     * @return CustomerInterface
     */
    public function setCustomerGroupId($customerGroupId);

    /**
     * @return null|string
     */
    public function getCustomerType();

    /**
     * @param null|string $customerType
     * @return CustomerInterface
     */
    public function setCustomerType($customerType);

    /**
     * @return bool|null
     */
    public function getB2b();

    /**
     * @param bool|null $b2b
     * @return CustomerInterface
     */
    public function setB2b($b2b);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getLastLoginDate();

    /**
     * @param \DateTimeImmutable|null $lastLoginDate
     * @return CustomerInterface
     */
    public function setLastLoginDate($lastLoginDate);

    /**
     * @return int|null
     */
    public function getLoginCount();

    /**
     * @param int|null $loginCount
     * @return CustomerInterface
     */
    public function setLoginCount($loginCount);

    /**
     * @return null|string
     */
    public function getPassword();

    /**
     * @param null|string $password
     * @return CustomerInterface
     */
    public function setPassword($password);

    /**
     * @return null|string
     */
    public function getReservedField1();

    /**
     * @param null|string $reservedField1
     * @return CustomerInterface
     */
    public function setReservedField1($reservedField1);

    /**
     * @return null|string
     */
    public function getReservedField2();

    /**
     * @param null|string $reservedField2
     * @return CustomerInterface
     */
    public function setReservedField2($reservedField2);

    /**
     * @return null|string
     */
    public function getReservedField3();

    /**
     * @param null|string $reservedField3
     * @return CustomerInterface
     */
    public function setReservedField3($reservedField3);

    /**
     * @return null|string
     */
    public function getReservedField4();

    /**
     * @param null|string $reservedField4
     * @return CustomerInterface
     */
    public function setReservedField4($reservedField4);

    /**
     * @return null|string
     */
    public function getReservedField5();

    /**
     * @param null|string $reservedField5
     * @return CustomerInterface
     */
    public function setReservedField5($reservedField5);
}
