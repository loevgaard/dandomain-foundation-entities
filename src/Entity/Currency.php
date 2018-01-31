<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Alcohol\ISO4217;
use Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_currencies")
 * @ORM\HasLifecycleCallbacks()
 */
class Currency extends AbstractEntity implements CurrencyInterface
{
    use CurrencyTrait;

    protected $hydrateConversions = [
        'id' => 'externalId',
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
     * In Dandomain, the external id and the code has the same contents
     * I guess it has something to do with backwards compatibility
     *
     * @var string|null
     *
     * @ORM\Column(type="string", unique=true, length=191)
     */
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", unique=true, length=191)
     */
    protected $code;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean")
     */
    protected $deActivated;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=1)
     */
    protected $delimiterDecimal;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=1)
     */
    protected $delimiterThousand;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $factor;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    protected $icon;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="`default`", type="boolean")
     */
    protected $default;

    /**
     * This is the currency's ISO code
     *
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $payCode;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $roundCondition;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $roundDirection;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $roundParam;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $roundPrices;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $symbol;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $symbolAlign;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $text;

    /**
     * We have added these two properties (which are not in the Dandomain API)
     */
    /**
     * This is the currency's ISO code (numeric)
     *
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    protected $isoCodeNumeric;

    /**
     * This is the currency's ISO code (alpha)
     *
     * @var string|null
     *
     * @ORM\Column(type="string", length=3)
     */
    protected $isoCodeAlpha;

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function validate()
    {
        Assert::that($this->externalId)->string()->maxLength(191);
        Assert::that($this->code)->string()->maxLength(191);
        Assert::that($this->deActivated)->boolean();
        Assert::that($this->delimiterDecimal)->choice([',', '.']);
        Assert::that($this->delimiterThousand)->choice([',', '.']);
        Assert::that($this->factor)->integer();
        Assert::thatNullOr($this->icon)->string()->maxLength(191);
        Assert::that($this->default)->boolean();
        Assert::that($this->payCode)->integer();
        Assert::that($this->roundCondition)->integer();
        Assert::that($this->roundDirection)->integer();
        Assert::that($this->roundParam)->string()->maxLength(191);
        Assert::that($this->roundPrices)->integer();
        Assert::that($this->symbol)->string()->maxLength(191);
        Assert::that($this->symbolAlign)->integer();
        Assert::that($this->isoCodeNumeric)->integer();
        Assert::that($this->text)->string()->maxLength(191);
        Assert::that($this->isoCodeAlpha)->string()->length(3);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Currency
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param null|string $externalId
     * @return Currency
     */
    public function setExternalId(?string $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     * @return Currency
     */
    public function setCode(?string $code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeActivated(): ?bool
    {
        return $this->deActivated;
    }

    /**
     * @param bool|null $deActivated
     * @return Currency
     */
    public function setDeActivated(?bool $deActivated)
    {
        $this->deActivated = $deActivated;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDelimiterDecimal(): ?string
    {
        return $this->delimiterDecimal;
    }

    /**
     * @param null|string $delimiterDecimal
     * @return Currency
     */
    public function setDelimiterDecimal(?string $delimiterDecimal)
    {
        $this->delimiterDecimal = $delimiterDecimal;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDelimiterThousand(): ?string
    {
        return $this->delimiterThousand;
    }

    /**
     * @param null|string $delimiterThousand
     * @return Currency
     */
    public function setDelimiterThousand(?string $delimiterThousand)
    {
        $this->delimiterThousand = $delimiterThousand;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFactor(): ?int
    {
        return $this->factor;
    }

    /**
     * @param int|null $factor
     * @return Currency
     */
    public function setFactor(?int $factor)
    {
        $this->factor = $factor;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param null|string $icon
     * @return Currency
     */
    public function setIcon(?string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDefault(): ?bool
    {
        return $this->default;
    }

    /**
     * @param bool|null $default
     * @return Currency
     */
    public function setDefault(?bool $default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPayCode(): ?int
    {
        return $this->payCode;
    }

    /**
     * @param int|null $payCode
     * @return Currency
     */
    public function setPayCode(?int $payCode)
    {
        $this->payCode = $payCode;
        $this->setIsoCodeNumeric($payCode);

        if ($payCode) {
            $iso4217 = new ISO4217();
            $currency = $iso4217->getByNumeric($payCode);
            $this->setIsoCodeAlpha($currency['alpha3']);
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRoundCondition(): ?int
    {
        return $this->roundCondition;
    }

    /**
     * @param int|null $roundCondition
     * @return Currency
     */
    public function setRoundCondition(?int $roundCondition)
    {
        $this->roundCondition = $roundCondition;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRoundDirection(): ?int
    {
        return $this->roundDirection;
    }

    /**
     * @param int|null $roundDirection
     * @return Currency
     */
    public function setRoundDirection(?int $roundDirection)
    {
        $this->roundDirection = $roundDirection;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRoundParam(): ?string
    {
        return $this->roundParam;
    }

    /**
     * @param null|string $roundParam
     * @return Currency
     */
    public function setRoundParam(?string $roundParam)
    {
        $this->roundParam = $roundParam;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRoundPrices(): ?int
    {
        return $this->roundPrices;
    }

    /**
     * @param int|null $roundPrices
     * @return Currency
     */
    public function setRoundPrices(?int $roundPrices)
    {
        $this->roundPrices = $roundPrices;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * @param null|string $symbol
     * @return Currency
     */
    public function setSymbol(?string $symbol)
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSymbolAlign(): ?int
    {
        return $this->symbolAlign;
    }

    /**
     * @param int|null $symbolAlign
     * @return Currency
     */
    public function setSymbolAlign(?int $symbolAlign)
    {
        $this->symbolAlign = $symbolAlign;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     * @return Currency
     */
    public function setText(?string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIsoCodeNumeric(): ?int
    {
        return $this->isoCodeNumeric;
    }

    /**
     * @param int|null $isoCodeNumeric
     * @return Currency
     */
    public function setIsoCodeNumeric(?int $isoCodeNumeric)
    {
        $this->isoCodeNumeric = $isoCodeNumeric;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIsoCodeAlpha(): ?string
    {
        return $this->isoCodeAlpha;
    }

    /**
     * @param null|string $isoCodeAlpha
     * @return Currency
     */
    public function setIsoCodeAlpha(?string $isoCodeAlpha)
    {
        $this->isoCodeAlpha = $isoCodeAlpha;
        return $this;
    }
}
