<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderLineInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderLineTrait;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Money\Money;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_order_lines")
 */
class OrderLine extends AbstractEntity implements OrderLineInterface
{
    use OrderLineTrait;

    protected $hydrateConversions = [
        'id' => 'externalId',
        'productId' => 'productNumber'
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
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $fileUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $productNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $productName;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $quantity;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $totalPrice;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $unitPrice;

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
    protected $variant;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $xmlParams;

    /**
     * @var Order
     *
     * @ORM\JoinColumn(onDelete="CASCADE", nullable=false)
     * @ORM\ManyToOne(inversedBy="orderLines", targetEntity="Order")
     */
    protected $order;

    /**
     * @var ProductInterface|null
     *
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @ORM\ManyToOne(targetEntity="Product")
     */
    protected $product;

    // @todo implement withVat and withoutVat methods

    public function hydrate(array $data, bool $useConversions = false, $scalarsOnly = true)
    {
        if (is_null($this->order)) {
            throw new \RuntimeException('Cannot hydrate order line without an associated order');
        }

        $currency = $this->order->getCurrencyCode();

        if (isset($data['unitPrice'])) {
            $data['unitPrice'] = DandomainFoundation\createMoneyFromFloat($currency, $data['unitPrice']);
        }

        if (isset($data['totalPrice'])) {
            $data['totalPrice'] = DandomainFoundation\createMoneyFromFloat($currency, $data['totalPrice']);
        }

        parent::hydrate($data, $useConversions, $scalarsOnly);
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
     * @return OrderLineInterface
     */
    public function setId(int $id)
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
     * @return OrderLineInterface
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFileUrl()
    {
        return $this->fileUrl;
    }

    /**
     * @param null|string $fileUrl
     * @return OrderLineInterface
     */
    public function setFileUrl($fileUrl)
    {
        $this->fileUrl = $fileUrl;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * @param int|null $productNumber
     * @return OrderLineInterface
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param null|string $productName
     * @return OrderLineInterface
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return OrderLineInterface
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return Money|null
     */
    public function getTotalPrice()
    {
        return DandomainFoundation\createMoney((string)$this->getOrder()->getCurrencyCode(), (int)$this->totalPrice);
    }

    /**
     * @param Money|null $totalPrice
     * @return OrderLineInterface
     */
    public function setTotalPrice(Money $totalPrice = null)
    {
        $this->totalPrice = $totalPrice ? $totalPrice->getAmount() : $totalPrice;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getUnitPrice()
    {
        return DandomainFoundation\createMoney((string)$this->getOrder()->getCurrencyCode(), (int)$this->unitPrice);
    }

    /**
     * @param Money|null $unitPrice
     * @return OrderLineInterface
     */
    public function setUnitPrice(Money $unitPrice = null)
    {
        $this->unitPrice = $unitPrice ? $unitPrice->getAmount() : $unitPrice;
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
     * @return OrderLineInterface
     */
    public function setVatPct($vatPct)
    {
        $this->vatPct = $vatPct;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @param null|string $variant
     * @return OrderLineInterface
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;
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
     * @return OrderLineInterface
     */
    public function setXmlParams($xmlParams)
    {
        $this->xmlParams = $xmlParams;
        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     * @return OrderLineInterface
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return ProductInterface|null
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param ProductInterface|null $product
     * @return OrderLineInterface
     */
    public function setProduct(ProductInterface $product = null)
    {
        $this->product = $product;
        return $this;
    }
}
