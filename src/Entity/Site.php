<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\SiteTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_sites")
 */
class Site extends AbstractEntity implements SiteInterface
{
    use SiteTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $countryId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=3)
     */
    protected $currencyCode;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return SiteInterface
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
        return $this->externalId;
    }

    /**
     * @param int $externalId
     * @return SiteInterface
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
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
     * @return SiteInterface
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param null|string $currencyCode
     * @return SiteInterface
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
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
     * @return SiteInterface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
