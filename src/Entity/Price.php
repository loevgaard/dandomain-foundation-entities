<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\PriceInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PriceTrait;
use Money\Money;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_prices")
 */
class Price extends AbstractEntity implements PriceInterface
{
    use PriceTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $amount;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $avance;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $b2bGroupId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=3)
     */
    protected $currencyCode;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $isoCode;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $specialOfferPrice;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $unitPrice;

    /**
     * @var Period|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="Period")
     */
    protected $period;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="prices", targetEntity="Product")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * @return PriceInterface
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     * @return PriceInterface
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAvance()
    {
        return $this->avance;
    }

    /**
     * @param int|null $avance
     * @return PriceInterface
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;
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
     * @return PriceInterface
     */
    public function setB2bGroupId($b2bGroupId)
    {
        $this->b2bGroupId = $b2bGroupId;
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
     * @return PriceInterface
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @param int|null $isoCode
     * @return PriceInterface
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getSpecialOfferPrice()
    {
        return DandomainFoundation\createMoney((string)$this->currencyCode, (int)$this->specialOfferPrice);
    }

    /**
     * @param Money|null $specialOfferPrice
     * @return PriceInterface
     */
    public function setSpecialOfferPrice(Money $specialOfferPrice = null)
    {
        if ($specialOfferPrice) {
            $this->specialOfferPrice = $specialOfferPrice->getAmount();
            $this->setCurrencyCode($specialOfferPrice->getCurrency()->getCode());
        } else {
            $this->specialOfferPrice = $specialOfferPrice;
        }
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getUnitPrice()
    {
        return DandomainFoundation\createMoney((string)$this->currencyCode, (int)$this->unitPrice);
    }

    /**
     * @param Money|null $unitPrice
     * @return PriceInterface
     */
    public function setUnitPrice(Money $unitPrice = null)
    {
        if ($unitPrice) {
            $this->unitPrice = $unitPrice->getAmount();
            $this->setCurrencyCode($unitPrice->getCurrency()->getCode());
        } else {
            $this->unitPrice = $unitPrice;
        }
        return $this;
    }

    /**
     * @return Period|null
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param Period|null $period
     * @return PriceInterface
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection|Product[] $products
     * @return PriceInterface
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}
