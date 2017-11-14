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
     * @return PaymentMethodInterface
     */
    public function populateFromApiResponse($data, $currency);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return PaymentMethodInterface
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     * @return PaymentMethodInterface
     */
    public function setExternalId($externalId);

    /**
     * @return Money|null
     */
    public function getFee();

    /**
     * @param Money $money
     * @return PaymentMethodInterface
     */
    public function setFee(\Money\Money $money);

    /**
     * @return bool|null
     */
    public function getFeeInclVat();

    /**
     * @param bool|null $feeInclVat
     * @return PaymentMethodInterface
     */
    public function setFeeInclVat($feeInclVat);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return PaymentMethodInterface
     */
    public function setName($name);
}
