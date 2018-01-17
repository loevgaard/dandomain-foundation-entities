<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodTrait;
use Money\Currency;
use Money\Money;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_payment_methods")
 *
 * @todo a lot of missing properties on this entity, see http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/SettingService/help/operations/GetPaymentMethods
 */
class PaymentMethod extends AbstractEntity implements PaymentMethodInterface
{
    use PaymentMethodTrait;

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
     * @var integer|null
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
        return (string)$this->name;
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
     * @return PaymentMethodInterface
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
     * @return PaymentMethodInterface
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getFee() : ?Money
    {
        if (!$this->feeCurrency) {
            return null;
        }

        return new Money($this->feeAmount, new Currency($this->feeCurrency));
    }

    /**
     * @param Money $money
     * @return PaymentMethodInterface
     */
    public function setFee(Money $money) : PaymentMethodInterface
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
     * @return PaymentMethodInterface
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
     * @return PaymentMethodInterface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
