<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\SiteTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_sites")
 */
class Site extends AbstractEntity implements SiteInterface
{
    use SiteTrait;
    use SoftDeletable;

    protected $hydrateConversions = [
        'id' => 'externalId'
    ];

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
     * The currency code in the Dandomain API refers in fact to the currencies' field named 'id' or 'code'
     * Therefore we don't have a currencyCode property, but a currency property
     *
     * @var CurrencyInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $currency;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function validate()
    {
        Assert::that($this->externalId)->integer();
        Assert::thatNullOr($this->countryId)->integer();
        Assert::that($this->currency)->isInstanceOf(CurrencyInterface::class);
        Assert::thatNullOr($this->name)->string();
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
        return (int)$this->externalId;
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
     * @return CurrencyInterface|null
     */
    public function getCurrency(): ?CurrencyInterface
    {
        return $this->currency;
    }

    /**
     * @param CurrencyInterface|null $currency
     * @return Site
     */
    public function setCurrency(?CurrencyInterface $currency)
    {
        $this->currency = $currency;
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
