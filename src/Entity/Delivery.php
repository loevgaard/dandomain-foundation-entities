<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_deliveries")
 */
class Delivery extends AbstractEntity implements DeliveryInterface
{
    use DeliveryTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $address;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $address2;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $attention;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $city;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
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
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $cvr;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $ean;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $email;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $state;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $zipCode;

    /**
     * @return integer
     */
    public function getId() : int
    {
        return (int)$this->id;
    }

    /**
     * @param integer $id
     * @return Delivery
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
     */
    public function setCountry($country)
    {
        $this->country = $country;
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
     * @return Delivery
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
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
     * @return Delivery
     */
    public function setCvr($cvr)
    {
        $this->cvr = $cvr;
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
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
     * @return Delivery
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }
}
