<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in PaymentMethod!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface PaymentMethodInterface
{

    /**
     * Populates a payment method based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/OrderService/help/operations/GetOrder
     *
     * @param \stdClass|array $data
     * @param string $currency
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface
     */
    public function populateFromApiResponse($data, $currency): \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface
     */
    public function setExternalId($externalId);

    /**
     * @return \Money\Money|null
     */
    public function getFee(): ?\Money\Money;

    /**
     * @param \Money\Money $money
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface
     */
    public function setFee(\Money\Money $money): \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;

    /**
     * @return bool|null
     */
    public function getFeeInclVat();

    /**
     * @param bool|null $feeInclVat
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface
     */
    public function setFeeInclVat($feeInclVat);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return \Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface
     */
    public function setName($name);
}