<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CustomerTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_customers")
 *
 * @todo missing properties, see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/CustomerService/help/operations/GetCustomer
 */
class Customer extends AbstractEntity implements CustomerInterface
{
    use CustomerTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * This is the customer id in Dandomain
     *
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $address;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $address2;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $attention;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $city;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $country;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $countryId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $ean;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $email;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $state;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $zipCode;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $cvr;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $b2bGroupId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $comments;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $createdDate;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customerGroupId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customerType;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $b2b;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $lastLoginDate;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $loginCount;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $password;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField1;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField2;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField3;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField4;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField5;

    /**
     * Populates a customer based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/CustomerService/help/operations/GetCustomer
     *
     * @param \stdClass|array $data
     * @return CustomerInterface
     */
    public function populateFromApiResponse($data) : CustomerInterface
    {
        $data = DandomainFoundation\objectToArray($data);

        $this
            ->setExternalId($data['id'])
            ->setAddress($data['address'])
            ->setAddress2($data['address2'])
            ->setAttention($data['attention'])
            ->setCity($data['city'])
            ->setCountry($data['country'])
            ->setCountryId($data['countryId'])
            ->setEan($data['ean'])
            ->setEmail($data['email'])
            ->setFax($data['fax'])
            ->setName($data['name'])
            ->setPhone($data['phone'])
            ->setState($data['state'])
            ->setZipCode($data['zipCode'])
        ;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return CustomerInterface
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return (int)$this->externalId;
    }

    /**
     * @param int $externalId
     * @return CustomerInterface
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     * @return CustomerInterface
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param null|string $address2
     * @return CustomerInterface
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAttention()
    {
        return $this->attention;
    }

    /**
     * @param null|string $attention
     * @return CustomerInterface
     */
    public function setAttention($attention)
    {
        $this->attention = $attention;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     * @return CustomerInterface
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param null|string $country
     * @return CustomerInterface
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param null|string $ean
     * @return CustomerInterface
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return CustomerInterface
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param null|string $fax
     * @return CustomerInterface
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return CustomerInterface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     * @return CustomerInterface
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     * @return CustomerInterface
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param null|string $zipCode
     * @return CustomerInterface
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCvr()
    {
        return $this->cvr;
    }

    /**
     * @param null|string $cvr
     * @return CustomerInterface
     */
    public function setCvr($cvr)
    {
        $this->cvr = $cvr;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getB2bGroupId()
    {
        return $this->b2bGroupId;
    }

    /**
     * @param null|string $b2bGroupId
     * @return CustomerInterface
     */
    public function setB2bGroupId($b2bGroupId)
    {
        $this->b2bGroupId = $b2bGroupId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param null|string $comments
     * @return CustomerInterface
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param int|null $countryId
     * @return CustomerInterface
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTimeImmutable|null $createdDate
     * @return CustomerInterface
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param null|string $customerGroupId
     * @return CustomerInterface
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->customerGroupId = $customerGroupId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * @param null|string $customerType
     * @return CustomerInterface
     */
    public function setCustomerType($customerType)
    {
        $this->customerType = $customerType;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getB2b()
    {
        return $this->b2b;
    }

    /**
     * @param bool|null $b2b
     * @return CustomerInterface
     */
    public function setB2b($b2b)
    {
        $this->b2b = $b2b;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    /**
     * @param \DateTimeImmutable|null $lastLoginDate
     * @return CustomerInterface
     */
    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLoginCount()
    {
        return $this->loginCount;
    }

    /**
     * @param int|null $loginCount
     * @return CustomerInterface
     */
    public function setLoginCount($loginCount)
    {
        $this->loginCount = $loginCount;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null|string $password
     * @return CustomerInterface
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReservedField1()
    {
        return $this->reservedField1;
    }

    /**
     * @param null|string $reservedField1
     * @return CustomerInterface
     */
    public function setReservedField1($reservedField1)
    {
        $this->reservedField1 = $reservedField1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReservedField2()
    {
        return $this->reservedField2;
    }

    /**
     * @param null|string $reservedField2
     * @return CustomerInterface
     */
    public function setReservedField2($reservedField2)
    {
        $this->reservedField2 = $reservedField2;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReservedField3()
    {
        return $this->reservedField3;
    }

    /**
     * @param null|string $reservedField3
     * @return CustomerInterface
     */
    public function setReservedField3($reservedField3)
    {
        $this->reservedField3 = $reservedField3;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReservedField4()
    {
        return $this->reservedField4;
    }

    /**
     * @param null|string $reservedField4
     * @return CustomerInterface
     */
    public function setReservedField4($reservedField4)
    {
        $this->reservedField4 = $reservedField4;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReservedField5()
    {
        return $this->reservedField5;
    }

    /**
     * @param null|string $reservedField5
     * @return CustomerInterface
     */
    public function setReservedField5($reservedField5)
    {
        $this->reservedField5 = $reservedField5;
        return $this;
    }
}
