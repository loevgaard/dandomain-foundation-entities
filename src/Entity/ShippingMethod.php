<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodTrait;
use Money\Currency;
use Money\Money;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_shipping_methods")
 */
class ShippingMethod extends AbstractEntity implements ShippingMethodInterface
{
    use ShippingMethodTrait;

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
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=3)
     */
    protected $feeCurrency;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $feeAmount;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $feeInclVat;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     *
     * @return ShippingMethodInterface
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
        return (int) $this->externalId;
    }

    /**
     * @param int $externalId
     *
     * @return ShippingMethodInterface
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getFee(): ?Money
    {
        if (!$this->feeCurrency) {
            return null;
        }

        return new Money($this->feeAmount, new Currency($this->feeCurrency));
    }

    /**
     * @param Money $money
     *
     * @return ShippingMethodInterface
     */
    public function setFee(Money $money): ShippingMethodInterface
    {
        $this->feeAmount = $money->getAmount();
        $this->feeCurrency = $money->getCurrency()->getCode();

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFeeInclVat()
    {
        return $this->feeInclVat;
    }

    /**
     * @param bool|null $feeInclVat
     *
     * @return ShippingMethodInterface
     */
    public function setFeeInclVat($feeInclVat)
    {
        $this->feeInclVat = $feeInclVat;

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
     *
     * @return ShippingMethodInterface
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
