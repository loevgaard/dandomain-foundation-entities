<?php

namespace Loevgaard\Dandomain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\Dandomain\Pay\PaymentRequest;

/**
 * The Payment entity is a special entity since it maps a payment from the Dandomain Payment API
 * This is also the reason why it doesn't implement an interface but extends the PaymentRequest
 * from the Dandomain Pay PHP SDK
 *
 * Also it doesn't relate to any other entities other than PaymentLine since they Dandomain Payment API
 * POST request is not complete with all information needed to populate all the related entities, i.e. customers,
 * deliveries etc.
 *
 * @ORM\Entity
 */
abstract class Payment extends PaymentRequest
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $apiKey;

    /**
     * @ORM\Column(type="string")
     */
    protected $merchant;

    /**
     * @ORM\Column(type="integer")
     */
    protected $orderId;

    /**
     * @ORM\Column(type="text")
     */
    protected $sessionId;

    /**
     * @ORM\Column(type="string")
     */
    protected $currencySymbol;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    protected $totalAmount;

    /**
     * @ORM\Column(type="string")
     */
    protected $callBackUrl;

    /**
     * @ORM\Column(type="string")
     */
    protected $fullCallBackOkUrl;

    /**
     * @ORM\Column(type="string")
     */
    protected $callBackOkUrl;

    /**
     * @ORM\Column(type="string")
     */
    protected $callBackServerUrl;

    /**
     * @ORM\Column(type="integer")
     */
    protected $languageId;

    /**
     * @ORM\Column(type="string")
     */
    protected $testMode;

    /**
     * @ORM\Column(type="integer")
     */
    protected $paymentGatewayCurrencyCode;

    /**
     * @ORM\Column(type="integer")
     */
    protected $cardTypeId;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerRekvNr;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerName;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerCompany;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerAddress;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerAddress2;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerZipCode;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerCity;

    /**
     * @ORM\Column(type="integer")
     */
    protected $customerCountryId;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerCountry;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerPhone;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerFax;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerEmail;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerNote;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerCvrnr;

    /**
     * @ORM\Column(type="integer")
     */
    protected $customerCustTypeId;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerEan;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerRes1;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerRes2;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerRes3;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerRes4;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerRes5;

    /**
     * @ORM\Column(type="string")
     */
    protected $customerIp;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryName;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryCompany;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryAddress;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryAddress2;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryZipCode;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryCity;

    /**
     * @ORM\Column(type="integer")
     */
    protected $deliveryCountryID;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryCountry;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryPhone;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryFax;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryEmail;

    /**
     * @ORM\Column(type="string")
     */
    protected $deliveryEan;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingMethod;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    protected $shippingFee;

    /**
     * @ORM\Column(type="string")
     */
    protected $paymentMethod;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    protected $paymentFee;

    /**
     * @ORM\Column(type="string")
     */
    protected $loadBalancerRealIp;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $referrer;

    /**
     * Use this property to save the status for the payment
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $status;

    public function __construct()
    {
        parent::__construct();

        $this->paymentLines = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Payment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Payment
     */
    public function setStatus(string $status) : self
    {
        $this->status = $status;
        return $this;
    }
}
