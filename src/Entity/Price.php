<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PriceInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PriceTrait;
use Money\Money;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_prices", uniqueConstraints={@ORM\UniqueConstraint(columns={"amount", "b2b_group_id", "currency_id", "product_id"})})
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(name="amount", type="integer")
     */
    protected $amount;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $avance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="b2b_group_id", type="string", length=191)
     */
    protected $b2bGroupId;

    /**
     * The currency code in the Dandomain API refers in fact to the currencies' field named 'id' or 'code'
     * Therefore we don't have a currencyCode and isoCode property, but a currency property
     *
     * @var CurrencyInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumn(name="currency_id", nullable=false)
     */
    protected $currency;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $specialOfferPrice;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $unitPrice;

    /**
     * @var PeriodInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL", nullable=true)
     * @ORM\ManyToOne(targetEntity="Period")
     */
    protected $period;

    /**
     * @var ProductInterface
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="prices")
     * @ORM\JoinColumn(name="product_id", nullable=false, onDelete="CASCADE")
     */
    protected $product;

    /**
     * Creates a valid Price
     *
     * @param int $amount
     * @param int $avance
     * @param string $b2bGroupId
     * @param CurrencyInterface $currency
     * @param int $specialOfferPrice In cents/ører (in danish)
     * @param int $unitPrice In cents/ører (in danish)
     * @return PriceInterface
     */
    public static function create(int $amount, int $avance, string $b2bGroupId, CurrencyInterface $currency, int $specialOfferPrice, int $unitPrice) : PriceInterface
    {
        $specialOfferPrice = new Money($specialOfferPrice, new \Money\Currency($currency->getIsoCodeAlpha()));
        $unitPrice = new Money($unitPrice, new \Money\Currency($currency->getIsoCodeAlpha()));

        $price = new Price();
        $price
            ->setAmount($amount)
            ->setAvance($avance)
            ->setB2bGroupId($b2bGroupId)
            ->setCurrency($currency)
            ->setSpecialOfferPrice($specialOfferPrice)
            ->setUnitPrice($unitPrice)
        ;

        return $price;
    }

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function validate()
    {
        Assert::that($this->amount)->integer(null, 'amount')->greaterThan(0);
        Assert::that($this->avance)->integer(null, 'avance');
        Assert::that($this->b2bGroupId)->string(null, 'b2bGroupId');
        Assert::that($this->currency)->isInstanceOf(CurrencyInterface::class, null, 'currency');
        Assert::that($this->specialOfferPrice)->integer(null, 'specialOfferPrice')->greaterOrEqualThan(0, null, 'specialOfferPrice');
        Assert::that($this->unitPrice)->integer(null, 'unitPrice')->greaterOrEqualThan(0, null, 'unitPrice');
        Assert::thatNullOr($this->period)->isInstanceOf(PeriodInterface::class, null, 'period');
        Assert::that($this->product)->isInstanceOf(ProductInterface::class);
    }

    /**
     * Will copy properties from $price
     *
     * @param PriceInterface $price
     */
    public function copyProperties(PriceInterface $price) : void
    {
        $this->setAmount($price->getAmount());
        $this->setAvance($price->getAvance());
        $this->setB2bGroupId($price->getB2bGroupId());
        $this->setCurrency($price->getCurrency());
        $this->setSpecialOfferPrice($price->getSpecialOfferPrice());
        $this->setUnitPrice($price->getUnitPrice());
        $this->setPeriod($price->getPeriod());
        $this->setProduct($price->getProduct());
    }

    /*
     * Helper methods
     */
    public function getUnitPriceExclVat(float $vat) : ?Money
    {
        $unitPrice = $this->getUnitPrice();

        if(!$unitPrice) {
            return null;
        }

        $multiplier = 100 / (100 + $vat);

        return $unitPrice->multiply($multiplier);
    }

    public function getSpecialOfferPriceExclVat(float $vat) : ?Money
    {
        $specialOfferPrice = $this->getSpecialOfferPrice();

        if(!$specialOfferPrice) {
            return null;
        }

        $multiplier = 100 / (100 + $vat);

        return $specialOfferPrice->multiply($multiplier);
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
    public function setId(int $id) : PriceInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAmount() : ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     * @return PriceInterface
     */
    public function setAmount(int $amount) : PriceInterface
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAvance() : ?int
    {
        return $this->avance;
    }

    /**
     * @param int|null $avance
     * @return PriceInterface
     */
    public function setAvance(int $avance) : PriceInterface
    {
        $this->avance = $avance;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getB2bGroupId() : ?string
    {
        return $this->b2bGroupId;
    }

    /**
     * @param null|string $b2bGroupId
     * @return PriceInterface
     */
    public function setB2bGroupId(string $b2bGroupId) : PriceInterface
    {
        $this->b2bGroupId = $b2bGroupId;
        return $this;
    }

    /**
     * @return null|CurrencyInterface
     */
    public function getCurrency() : ?CurrencyInterface
    {
        return $this->currency;
    }

    /**
     * @param null|CurrencyInterface $currency
     * @return PriceInterface
     */
    public function setCurrency(CurrencyInterface $currency) : PriceInterface
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getSpecialOfferPrice() : ?Money
    {
        if(!$this->currency) {
            return null;
        }
        return DandomainFoundation\createMoney($this->currency->getIsoCodeAlpha(), (int)$this->specialOfferPrice);
    }

    /**
     * @param Money|null $specialOfferPrice
     * @return PriceInterface
     */
    public function setSpecialOfferPrice(Money $specialOfferPrice) : PriceInterface
    {
        // @todo change type from int to string
        $this->specialOfferPrice = (int)$specialOfferPrice->getAmount();

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getUnitPrice() : ?Money
    {
        if(!$this->currency) {
            return null;
        }
        return DandomainFoundation\createMoney($this->currency->getIsoCodeAlpha(), (int)$this->unitPrice);
    }

    /**
     * @param Money|null $unitPrice
     * @return PriceInterface
     */
    public function setUnitPrice(Money $unitPrice) : PriceInterface
    {
        // @todo change type from int to string
        $this->unitPrice = (int)$unitPrice->getAmount();

        return $this;
    }

    /**
     * @return Period|null
     */
    public function getPeriod() : ?PeriodInterface
    {
        return $this->period;
    }

    /**
     * @param PeriodInterface|null $period
     * @return PriceInterface
     */
    public function setPeriod(?PeriodInterface $period) : PriceInterface
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return ProductInterface
     */
    public function getProduct() : ?ProductInterface
    {
        return $this->product;
    }

    /**
     * @param ProductInterface|null $product
     * @return PriceInterface
     */
    public function setProduct(?ProductInterface $product) : PriceInterface
    {
        $this->product = $product;
        return $this;
    }
}
