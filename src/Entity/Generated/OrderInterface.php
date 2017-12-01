<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Order!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface OrderInterface extends AbstractEntityInterface
{

    /**
     * Populates an order based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/OrderService/help/operations/GetOrder
     *
     * @param \stdClass|array $data
     * @param bool $populateEmbedded
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function populateFromApiResponse($data, bool $populateEmbedded = false): \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

    /**
     * @return \Money\Money|null
     */
    public function getTotalPrice(): ?\Money\Money;

    /**
     * @param \Money\Money $money
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setTotalPrice(\Money\Money $money = null): \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

    /**
     * @return \Money\Money|null
     */
    public function getSalesDiscount(): ?\Money\Money;

    /**
     * @param \Money\Money $money
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setSalesDiscount(\Money\Money $money = null): \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

    /**
     * @return \Money\Money|null
     */
    public function getGiftCertificateAmount(): ?\Money\Money;

    /**
     * @param \Money\Money $money
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setGiftCertificateAmount(\Money\Money $money = null): \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

    /**
     * @return \Money\Money|null
     */
    public function getShippingMethodFee(): ?\Money\Money;

    /**
     * @param \Money\Money $money
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setShippingMethodFee(\Money\Money $money = null): \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

    /**
     * @return \Money\Money|null
     */
    public function getPaymentMethodFee(): ?\Money\Money;

    /**
     * @param \Money\Money $money
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setPaymentMethodFee(\Money\Money $money = null): \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setExternalId($externalId);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface|null
     */
    public function getCustomer();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface|null $customer
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setCustomer($customer);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface|null
     */
    public function getDelivery();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface|null $delivery
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setDelivery($delivery);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\InvoiceInterface|null
     */
    public function getInvoice();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Generated\InvoiceInterface|null $invoice
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setInvoice($invoice);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|null
     */
    public function getOrderLines();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|null $orderLines
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setOrderLines($orderLines);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface|null
     */
    public function getPaymentMethod();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface|null $paymentMethod
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setPaymentMethod($paymentMethod);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface|null
     */
    public function getShippingMethod();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface|null $shippingMethod
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setShippingMethod($shippingMethod);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface|null
     */
    public function getSite();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface|null $site
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setSite($site);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\StateInterface|null
     */
    public function getState();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Generated\StateInterface|null $state
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setState($state);

    /**
     * @return null|string
     */
    public function getComment();

    /**
     * @param null|string $comment
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setComment($comment);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedDate();

    /**
     * @param \DateTimeImmutable|null $createdDate
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * @return null|string
     */
    public function getCreditNoteNumber();

    /**
     * @param null|string $creditNoteNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Order
     */
    public function setCreditNoteNumber($creditNoteNumber);

    /**
     * @return null|string
     */
    public function getCurrencyCode();

    /**
     * @param null|string $currencyCode
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return null|string
     */
    public function getCustomerComment();

    /**
     * @param null|string $customerComment
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setCustomerComment($customerComment);

    /**
     * @return null|string
     */
    public function getGiftCertificateNumber();

    /**
     * @param null|string $giftCertificateNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setGiftCertificateNumber($giftCertificateNumber);

    /**
     * @return bool|null
     */
    public function getIncomplete();

    /**
     * @param bool|null $incomplete
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setIncomplete($incomplete);

    /**
     * @return null|string
     */
    public function getIp();

    /**
     * @param null|string $ip
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setIp($ip);

    /**
     * @return bool|null
     */
    public function getModified();

    /**
     * @param bool|null $modified
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setModified($modified);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getModifiedDate();

    /**
     * @param \DateTimeImmutable|null $modifiedDate
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setModifiedDate($modifiedDate);

    /**
     * @return null|string
     */
    public function getReferenceNumber();

    /**
     * @param null|string $referenceNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setReferenceNumber($referenceNumber);

    /**
     * @return null|string
     */
    public function getReferrer();

    /**
     * @param null|string $referrer
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setReferrer($referrer);

    /**
     * @return null|string
     */
    public function getReservedField1();

    /**
     * @param null|string $reservedField1
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setReservedField1($reservedField1);

    /**
     * @return null|string
     */
    public function getReservedField2();

    /**
     * @param null|string $reservedField2
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setReservedField2($reservedField2);

    /**
     * @return null|string
     */
    public function getReservedField3();

    /**
     * @param null|string $reservedField3
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setReservedField3($reservedField3);

    /**
     * @return null|string
     */
    public function getReservedField4();

    /**
     * @param null|string $reservedField4
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setReservedField4($reservedField4);

    /**
     * @return null|string
     */
    public function getReservedField5();

    /**
     * @param null|string $reservedField5
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setReservedField5($reservedField5);

    /**
     * @return float|null
     */
    public function getTotalWeight();

    /**
     * @param float|null $totalWeight
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setTotalWeight($totalWeight);

    /**
     * @return null|string
     */
    public function getTrackingNumber();

    /**
     * @param null|string $trackingNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setTrackingNumber($trackingNumber);

    /**
     * @return int|null
     */
    public function getTransactionNumber();

    /**
     * @param int|null $transactionNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setTransactionNumber($transactionNumber);

    /**
     * @return float|null
     */
    public function getVatPct();

    /**
     * @param float|null $vatPct
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setVatPct($vatPct);

    /**
     * @return null|string
     */
    public function getVatRegNumber();

    /**
     * @param null|string $vatRegNumber
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setVatRegNumber($vatRegNumber);

    /**
     * @return null|string
     */
    public function getXmlParams();

    /**
     * @param null|string $xmlParams
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface
     */
    public function setXmlParams($xmlParams);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
