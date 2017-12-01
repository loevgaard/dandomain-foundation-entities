<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in OrderLine!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface OrderLineInterface extends AbstractEntityInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setExternalId(int $externalId);

    /**
     * @return null|string
     */
    public function getFileUrl();

    /**
     * @param null|string $fileUrl
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setFileUrl($fileUrl);

    /**
     * @return int|null
     */
    public function getProductNumber();

    /**
     * @param int|null $productNumber
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setProductNumber($productNumber);

    /**
     * @return null|string
     */
    public function getProductName();

    /**
     * @param null|string $productName
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setProductName($productName);

    /**
     * @return int|null
     */
    public function getQuantity();

    /**
     * @param int|null $quantity
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setQuantity($quantity);

    /**
     * @return \Money\Money|null
     */
    public function getTotalPrice();

    /**
     * @param \Money\Money|null $totalPrice
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setTotalPrice(\Money\Money $totalPrice = null);

    /**
     * @return \Money\Money|null
     */
    public function getUnitPrice();

    /**
     * @param \Money\Money|null $unitPrice
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setUnitPrice(\Money\Money $unitPrice = null);

    /**
     * @return float|null
     */
    public function getVatPct();

    /**
     * @param float|null $vatPct
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setVatPct($vatPct);

    /**
     * @return null|string
     */
    public function getVariant();

    /**
     * @param null|string $variant
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setVariant($variant);

    /**
     * @return null|string
     */
    public function getXmlParams();

    /**
     * @param null|string $xmlParams
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setXmlParams($xmlParams);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Order
     */
    public function getOrder(): \Loevgaard\DandomainFoundation\Entity\Order;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Order $order
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setOrder(\Loevgaard\DandomainFoundation\Entity\Order $order);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Product|null
     */
    public function getProduct();

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Product|null $product
     * @return \Loevgaard\DandomainFoundation\Entity\OrderLine
     */
    public function setProduct($product);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
