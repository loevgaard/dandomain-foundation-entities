<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Brick\Math\BigDecimal;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\InvoiceInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderLineInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderTrait;
use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;
use Money\Money;

/**
 * We use the Money library for amounts, and we use a shared currency, namely the property $currencyCode.
 *
 * @ORM\Entity()
 * @ORM\Table(name="ldf_orders", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="external_id", columns={"external_id"})
 * })
 */
class Order extends AbstractEntity implements OrderInterface
{
    use OrderTrait;
    use Timestampable;
    use SoftDeletable;

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
     * This is the order id in Dandomain.
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $externalId;

    /**
     * @var CustomerInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="Customer", cascade={"persist", "remove"})
     */
    protected $customer;

    /**
     * @var DeliveryInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="Delivery", cascade={"persist", "remove"})
     */
    protected $delivery;

    /**
     * @var InvoiceInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="Invoice", cascade={"persist", "remove"})
     */
    protected $invoice;

    /**
     * @var OrderLineInterface[]|ArrayCollection
     *
     * @ORM\OneToMany(mappedBy="order", targetEntity="OrderLine", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $orderLines;

    /**
     * @var PaymentMethodInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="PaymentMethod", cascade={"persist", "remove"})
     */
    protected $paymentMethod;

    /**
     * Because the fee can change on the payment method we have a field for here for the fee on this order.
     *
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $paymentMethodFee;

    /**
     * @var ShippingMethodInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="ShippingMethod", cascade={"persist", "remove"})
     */
    protected $shippingMethod;

    /**
     * Because the fee can change on the shipping method we have a field for here for the fee on this order.
     *
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $shippingMethodFee;

    /**
     * @var SiteInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="Site", cascade={"persist", "remove"})
     */
    protected $site;

    /**
     * @var StateInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="State", cascade={"persist", "remove"})
     */
    protected $state;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $comment;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable", options={"comment"="Created info from Dandomain"})
     */
    protected $createdDate;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $creditNoteNumber;

    /**
     * The currency code in the Dandomain API refers in fact to the currencies' field named 'id' or 'code'
     * Therefore we don't have a currencyCode property, but a currency property.
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
     * @ORM\Column(nullable=true, type="text")
     */
    protected $customerComment;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $giftCertificateAmount;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $giftCertificateNumber;

    /**
     * @var bool|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $incomplete;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $ip;

    /**
     * @var bool|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $modified;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable", options={"comment"="Modified info from Dandomain"})
     */
    protected $modifiedDate;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $referenceNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $referrer;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $reservedField1;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $reservedField2;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $reservedField3;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $reservedField4;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $reservedField5;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $salesDiscount;

    /**
     * This price is incl vat.
     *
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $totalPrice;

    /**
     * @var float|null
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $totalWeight;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $trackingNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $transactionNumber;

    /**
     * @var float|null
     *
     * @ORM\Column(nullable=true, type="decimal", precision=5, scale=2)
     */
    protected $vatPct;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $vatRegNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $xmlParams;

    public function __construct()
    {
        $this->orderLines = new ArrayCollection();
    }

    public function hydrate(array $data, bool $useConversions = false, $scalarsOnly = true)
    {
        $currency = $data['currencyCode'];

        if (isset($data['totalPrice'])) {
            $data['totalPrice'] = DandomainFoundation\createMoneyFromFloat($currency, $data['totalPrice']);
        }

        if (isset($data['giftCertificateAmount'])) {
            $data['giftCertificateAmount'] = DandomainFoundation\createMoneyFromFloat($currency, $data['giftCertificateAmount']);
        }

        if (isset($data['salesDiscount'])) {
            $data['salesDiscount'] = DandomainFoundation\createMoneyFromFloat($currency, $data['salesDiscount']);
        }

        if (isset($data['paymentInfo']['fee'])) {
            $data['paymentMethodFee'] = DandomainFoundation\createMoneyFromFloat($currency, $data['paymentInfo']['fee']);
        }

        if (isset($data['shippingInfo']['fee'])) {
            $data['shippingMethodFee'] = DandomainFoundation\createMoneyFromFloat($currency, $data['shippingInfo']['fee']);
        }

        if ($data['createdDate']) {
            $data['createdDate'] = $this->getDateTimeFromJson($data['createdDate']);
        }

        if ($data['modifiedDate']) {
            $data['modifiedDate'] = $this->getDateTimeFromJson($data['modifiedDate']);
        }

        parent::hydrate($data, $useConversions, $scalarsOnly);
    }

    /*
     * Helper methods
     */
    public function getTotalPriceInclVat(): ?Money
    {
        return $this->getTotalPrice();
    }

    public function getTotalPriceExclVat(): ?Money
    {
        $totalPrice = $this->getTotalPrice();
        if (!$totalPrice) {
            return null;
        }

        $multiplier = BigDecimal::of('100')->exactlyDividedBy(BigDecimal::of('100')->plus($this->vatPct));

        return $totalPrice->multiply((string) $multiplier);
    }

    public function totalPriceWithoutFees(): ?Money
    {
        $totalPrice = $this->getTotalPrice();
        if (!$totalPrice) {
            return null;
        }

        $paymentMethodFee = $this->getPaymentMethodFee();
        if ($paymentMethodFee) {
            $totalPrice = $totalPrice->subtract($paymentMethodFee);
        }

        $shippingMethodFee = $this->getShippingMethodFee();
        if ($shippingMethodFee) {
            $totalPrice = $totalPrice->subtract($shippingMethodFee);
        }

        return $totalPrice;
    }

    /*
     * Collection methods
     */
    public function addOrderLine(OrderLineInterface $orderLine): OrderInterface
    {
        if (!$this->hasOrderLine($orderLine)) {
            $this->orderLines->add($orderLine);
            $orderLine->setOrder($this);
        }

        return $this;
    }

    /**
     * @param OrderLineInterface|int $orderLine Either the OrderLineInterface or the external id
     *
     * @return bool
     */
    public function hasOrderLine($orderLine): bool
    {
        if ($orderLine instanceof OrderLineInterface) {
            $orderLine = $orderLine->getExternalId();
        }

        return $this->orderLines->exists(function ($key, OrderLineInterface $element) use ($orderLine) {
            return $element->getExternalId() === $orderLine;
        });
    }

    public function removeOrderLine(OrderLineInterface $orderLine): OrderInterface
    {
        $orderLine->setOrder(null);
        $this->orderLines->removeElement($orderLine);

        return $this;
    }

    public function clearOrderLines(): OrderInterface
    {
        foreach ($this->orderLines as $orderLine) {
            $orderLine->setOrder(null);
        }

        $this->orderLines->clear();

        return $this;
    }

    /**
     * @param OrderLineInterface[] $orderLines
     */
    public function updateOrderLines(array $orderLines): void
    {
        // this holds the final array of order lines, whether updated or added
        $final = [];
        foreach ($orderLines as $orderLine) {
            $existing = $this->findOrderLine($orderLine);
            if ($existing) {
                $existing->copyProperties($orderLine);
                $existing->setOrder($this);
                $final[] = $existing;
            } else {
                $this->addOrderLine($orderLine);
                $final[] = $orderLine;
            }
        }

        foreach ($this->orderLines as $orderLine) {
            if (!in_array($orderLine, $final, true)) {
                $this->removeOrderLine($orderLine);
            }
        }
    }

    /*
     * Getters / Setters
     */

    /**
     * @return Money|null
     */
    public function getTotalPrice(): ?Money
    {
        return $this->createMoney((int) $this->totalPrice);
    }

    /**
     * @param Money $money
     *
     * @return OrderInterface
     */
    public function setTotalPrice(Money $money = null): OrderInterface
    {
        $this->totalPrice = $money->getAmount();

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getSalesDiscount(): ?Money
    {
        return $this->createMoney((int) $this->salesDiscount);
    }

    /**
     * @param Money $money
     *
     * @return OrderInterface
     */
    public function setSalesDiscount(Money $money = null): OrderInterface
    {
        $this->salesDiscount = $money->getAmount();

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getGiftCertificateAmount(): ?Money
    {
        return $this->createMoney((int) $this->giftCertificateAmount);
    }

    /**
     * @param Money $money
     *
     * @return OrderInterface
     */
    public function setGiftCertificateAmount(Money $money = null): OrderInterface
    {
        $this->giftCertificateAmount = $money->getAmount();

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getShippingMethodFee(): ?Money
    {
        return $this->createMoney((int) $this->shippingMethodFee);
    }

    /**
     * @param Money $money
     *
     * @return OrderInterface
     */
    public function setShippingMethodFee(Money $money = null): OrderInterface
    {
        $this->shippingMethodFee = $money->getAmount();

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getPaymentMethodFee(): ?Money
    {
        return $this->createMoney((int) $this->paymentMethodFee);
    }

    /**
     * @param Money $money
     *
     * @return OrderInterface
     */
    public function setPaymentMethodFee(Money $money = null): OrderInterface
    {
        $this->paymentMethodFee = $money->getAmount();

        return $this;
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
     * @return OrderInterface
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
     * @return OrderInterface
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return CustomerInterface|null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param CustomerInterface|null $customer
     *
     * @return OrderInterface
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return DeliveryInterface|null
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param DeliveryInterface|null $delivery
     *
     * @return OrderInterface
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return InvoiceInterface|null
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param InvoiceInterface|null $invoice
     *
     * @return OrderInterface
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return ArrayCollection|OrderLineInterface[]
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * @param ArrayCollection|null $orderLines
     *
     * @return OrderInterface
     */
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;

        return $this;
    }

    /**
     * @return PaymentMethodInterface|null
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param PaymentMethodInterface|null $paymentMethod
     *
     * @return OrderInterface
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return ShippingMethodInterface|null
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * @param ShippingMethodInterface|null $shippingMethod
     *
     * @return OrderInterface
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    /**
     * @return SiteInterface|null
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param SiteInterface|null $site
     *
     * @return OrderInterface
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return StateInterface|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param StateInterface|null $state
     *
     * @return OrderInterface
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param null|string $comment
     *
     * @return OrderInterface
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

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
     *
     * @return OrderInterface
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCreditNoteNumber()
    {
        return $this->creditNoteNumber;
    }

    /**
     * @param null|string $creditNoteNumber
     *
     * @return Order
     */
    public function setCreditNoteNumber($creditNoteNumber)
    {
        $this->creditNoteNumber = $creditNoteNumber;

        return $this;
    }

    /**
     * @return CurrencyInterface|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param null|CurrencyInterface $currency
     *
     * @return OrderInterface
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCustomerComment()
    {
        return $this->customerComment;
    }

    /**
     * @param null|string $customerComment
     *
     * @return OrderInterface
     */
    public function setCustomerComment($customerComment)
    {
        $this->customerComment = $customerComment;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getGiftCertificateNumber()
    {
        return $this->giftCertificateNumber;
    }

    /**
     * @param null|string $giftCertificateNumber
     *
     * @return OrderInterface
     */
    public function setGiftCertificateNumber($giftCertificateNumber)
    {
        $this->giftCertificateNumber = $giftCertificateNumber;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIncomplete()
    {
        return $this->incomplete;
    }

    /**
     * @param bool|null $incomplete
     *
     * @return OrderInterface
     */
    public function setIncomplete($incomplete)
    {
        $this->incomplete = $incomplete;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param null|string $ip
     *
     * @return OrderInterface
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param bool|null $modified
     *
     * @return OrderInterface
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @param \DateTimeImmutable|null $modifiedDate
     *
     * @return OrderInterface
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * @param null|string $referenceNumber
     *
     * @return OrderInterface
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param null|string $referrer
     *
     * @return OrderInterface
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;

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
     *
     * @return OrderInterface
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
     *
     * @return OrderInterface
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
     *
     * @return OrderInterface
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
     *
     * @return OrderInterface
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
     *
     * @return OrderInterface
     */
    public function setReservedField5($reservedField5)
    {
        $this->reservedField5 = $reservedField5;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * @param float|null $totalWeight
     *
     * @return OrderInterface
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @param null|string $trackingNumber
     *
     * @return OrderInterface
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTransactionNumber()
    {
        return $this->transactionNumber;
    }

    /**
     * @param int|null $transactionNumber
     *
     * @return OrderInterface
     */
    public function setTransactionNumber($transactionNumber)
    {
        $this->transactionNumber = $transactionNumber;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getVatPct()
    {
        return $this->vatPct;
    }

    /**
     * @param float|null $vatPct
     *
     * @return OrderInterface
     */
    public function setVatPct($vatPct)
    {
        $this->vatPct = $vatPct;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getVatRegNumber()
    {
        return $this->vatRegNumber;
    }

    /**
     * @param null|string $vatRegNumber
     *
     * @return OrderInterface
     */
    public function setVatRegNumber($vatRegNumber)
    {
        $this->vatRegNumber = $vatRegNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getXmlParams()
    {
        return $this->xmlParams;
    }

    /**
     * @param null|string $xmlParams
     *
     * @return OrderInterface
     */
    public function setXmlParams($xmlParams)
    {
        $this->xmlParams = $xmlParams;

        return $this;
    }

    protected function findOrderLine(OrderLineInterface $orderLine): ?OrderLineInterface
    {
        foreach ($this->orderLines as $ol) {
            if ($orderLine->getExternalId() === $ol->getExternalId()) {
                return $ol;
            }
        }

        return null;
    }

    /**
     * A helper method for creating a Money object from a float based on the shared currency.
     *
     * @param int $amount
     *
     * @return Money|null
     */
    private function createMoney(int $amount = 0): ?Money
    {
        if (!$this->currency) {
            return null;
        }

        return DandomainFoundation\createMoney($this->currency->getIsoCodeAlpha(), $amount);
    }
}
