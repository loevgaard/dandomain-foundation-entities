<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Order!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface OrderInterface
{

    /**
     * Populates an order based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/OrderService/help/operations/GetOrder
     *
     * @param \stdClass|array $data
     * @param bool $populateEmbedded
     * @return OrderInterface
     */
    public function populateFromApiResponse($data, $populateEmbedded);

    /**
     * @return Money|null
     */
    public function getTotalPrice();

    /**
     * @param Money $money
     * @return OrderInterface
     */
    public function setTotalPrice(\Money\Money $money = null);

    /**
     * @return Money|null
     */
    public function getSalesDiscount();

    /**
     * @param Money $money
     * @return OrderInterface
     */
    public function setSalesDiscount(\Money\Money $money = null);

    /**
     * @return Money|null
     */
    public function getGiftCertificateAmount();

    /**
     * @param Money $money
     * @return OrderInterface
     */
    public function setGiftCertificateAmount(\Money\Money $money = null);

    /**
     * @return Money|null
     */
    public function getShippingMethodFee();

    /**
     * @param Money $money
     * @return OrderInterface
     */
    public function setShippingMethodFee(\Money\Money $money = null);

    /**
     * @return Money|null
     */
    public function getPaymentMethodFee();

    /**
     * @param Money $money
     * @return OrderInterface
     */
    public function setPaymentMethodFee(\Money\Money $money = null);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return OrderInterface
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     * @return OrderInterface
     */
    public function setExternalId($externalId);

    /**
     * @return CustomerInterface|null
     */
    public function getCustomer();

    /**
     * @param CustomerInterface|null $customer
     * @return OrderInterface
     */
    public function setCustomer($customer);

    /**
     * @return DeliveryInterface|null
     */
    public function getDelivery();

    /**
     * @param DeliveryInterface|null $delivery
     * @return OrderInterface
     */
    public function setDelivery($delivery);

    /**
     * @return InvoiceInterface|null
     */
    public function getInvoice();

    /**
     * @param InvoiceInterface|null $invoice
     * @return OrderInterface
     */
    public function setInvoice($invoice);

    /**
     * @return ArrayCollection|null
     */
    public function getOrderLines();

    /**
     * @param ArrayCollection|null $orderLines
     * @return OrderInterface
     */
    public function setOrderLines($orderLines);

    /**
     * @return PaymentMethodInterface|null
     */
    public function getPaymentMethod();

    /**
     * @param PaymentMethodInterface|null $paymentMethod
     * @return OrderInterface
     */
    public function setPaymentMethod($paymentMethod);

    /**
     * @return ShippingMethodInterface|null
     */
    public function getShippingMethod();

    /**
     * @param ShippingMethodInterface|null $shippingMethod
     * @return OrderInterface
     */
    public function setShippingMethod($shippingMethod);

    /**
     * @return SiteInterface|null
     */
    public function getSite();

    /**
     * @param SiteInterface|null $site
     * @return OrderInterface
     */
    public function setSite($site);

    /**
     * @return StateInterface|null
     */
    public function getState();

    /**
     * @param StateInterface|null $state
     * @return OrderInterface
     */
    public function setState($state);

    /**
     * @return null|string
     */
    public function getComment();

    /**
     * @param null|string $comment
     * @return OrderInterface
     */
    public function setComment($comment);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedDate();

    /**
     * @param \DateTimeImmutable|null $createdDate
     * @return OrderInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * @return null|string
     */
    public function getCreditNoteNumber();

    /**
     * @param null|string $creditNoteNumber
     * @return Order
     */
    public function setCreditNoteNumber($creditNoteNumber);

    /**
     * @return null|string
     */
    public function getCurrencyCode();

    /**
     * @param null|string $currencyCode
     * @return OrderInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return null|string
     */
    public function getCustomerComment();

    /**
     * @param null|string $customerComment
     * @return OrderInterface
     */
    public function setCustomerComment($customerComment);

    /**
     * @return null|string
     */
    public function getGiftCertificateNumber();

    /**
     * @param null|string $giftCertificateNumber
     * @return OrderInterface
     */
    public function setGiftCertificateNumber($giftCertificateNumber);

    /**
     * @return bool|null
     */
    public function getIncomplete();

    /**
     * @param bool|null $incomplete
     * @return OrderInterface
     */
    public function setIncomplete($incomplete);

    /**
     * @return null|string
     */
    public function getIp();

    /**
     * @param null|string $ip
     * @return OrderInterface
     */
    public function setIp($ip);

    /**
     * @return bool|null
     */
    public function getModified();

    /**
     * @param bool|null $modified
     * @return OrderInterface
     */
    public function setModified($modified);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getModifiedDate();

    /**
     * @param \DateTimeImmutable|null $modifiedDate
     * @return OrderInterface
     */
    public function setModifiedDate($modifiedDate);

    /**
     * @return null|string
     */
    public function getReferenceNumber();

    /**
     * @param null|string $referenceNumber
     * @return OrderInterface
     */
    public function setReferenceNumber($referenceNumber);

    /**
     * @return null|string
     */
    public function getReferrer();

    /**
     * @param null|string $referrer
     * @return OrderInterface
     */
    public function setReferrer($referrer);

    /**
     * @return null|string
     */
    public function getReservedField1();

    /**
     * @param null|string $reservedField1
     * @return OrderInterface
     */
    public function setReservedField1($reservedField1);

    /**
     * @return null|string
     */
    public function getReservedField2();

    /**
     * @param null|string $reservedField2
     * @return OrderInterface
     */
    public function setReservedField2($reservedField2);

    /**
     * @return null|string
     */
    public function getReservedField3();

    /**
     * @param null|string $reservedField3
     * @return OrderInterface
     */
    public function setReservedField3($reservedField3);

    /**
     * @return null|string
     */
    public function getReservedField4();

    /**
     * @param null|string $reservedField4
     * @return OrderInterface
     */
    public function setReservedField4($reservedField4);

    /**
     * @return null|string
     */
    public function getReservedField5();

    /**
     * @param null|string $reservedField5
     * @return OrderInterface
     */
    public function setReservedField5($reservedField5);

    /**
     * @return float|null
     */
    public function getTotalWeight();

    /**
     * @param float|null $totalWeight
     * @return OrderInterface
     */
    public function setTotalWeight($totalWeight);

    /**
     * @return null|string
     */
    public function getTrackingNumber();

    /**
     * @param null|string $trackingNumber
     * @return OrderInterface
     */
    public function setTrackingNumber($trackingNumber);

    /**
     * @return int|null
     */
    public function getTransactionNumber();

    /**
     * @param int|null $transactionNumber
     * @return OrderInterface
     */
    public function setTransactionNumber($transactionNumber);

    /**
     * @return float|null
     */
    public function getVatPct();

    /**
     * @param float|null $vatPct
     * @return OrderInterface
     */
    public function setVatPct($vatPct);

    /**
     * @return null|string
     */
    public function getVatRegNumber();

    /**
     * @param null|string $vatRegNumber
     * @return OrderInterface
     */
    public function setVatRegNumber($vatRegNumber);

    /**
     * @return null|string
     */
    public function getXmlParams();

    /**
     * @param null|string $xmlParams
     * @return OrderInterface
     */
    public function setXmlParams($xmlParams);
}
