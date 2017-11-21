<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodTrait;
use Money\Currency;
use Money\Money;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_shipping_methods")
 */
class ShippingMethod implements ShippingMethodInterface
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
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * Populates a shipping method based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/OrderService/help/operations/GetOrder
     *
     * @param \stdClass|array $data
     * @param string $currency
     * @return ShippingMethodInterface
     */
    public function populateFromApiResponse($data, $currency) : ShippingMethodInterface
    {
        $data = DandomainFoundation\objectToArray($data);

        $this
            ->setExternalId($data['id'])
            ->setFee(DandomainFoundation\createMoney((string)$currency, $data['fee']))
            ->setFeeInclVat($data['feeInclVat'])
            ->setName($data['name'])
        ;

        return $this;
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
     * @return ShippingMethod
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
     * @return ShippingMethod
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
     * @return ShippingMethodInterface
     */
    public function setFee(Money $money) : ShippingMethodInterface
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
     * @return ShippingMethodInterface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}