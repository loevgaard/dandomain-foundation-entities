<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Invoice!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface InvoiceInterface
{

    /**
     * Populates a invoice based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/OrderService/help/operations/GetOrder
     *
     * @param \stdClass|array $data
     * @return InvoiceInterface
     */
    public function populateFromApiResponse($data);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return Invoice
     */
    public function setId($id);

    /**
     * @return null|string
     */
    public function getCreditNoteNumber();

    /**
     * @param null|string $creditNoteNumber
     * @return Invoice
     */
    public function setCreditNoteNumber($creditNoteNumber);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate();

    /**
     * @param \DateTimeImmutable|null $date
     * @return Invoice
     */
    public function setDate($date);

    /**
     * @return bool|null
     */
    public function getisPaid();

    /**
     * @param bool|null $isPaid
     * @return Invoice
     */
    public function setIsPaid($isPaid);

    /**
     * @return int|null
     */
    public function getNumber();

    /**
     * @param int|null $number
     * @return Invoice
     */
    public function setNumber($number);

    /**
     * @return null|string
     */
    public function getState();

    /**
     * @param null|string $state
     * @return Invoice
     */
    public function setState($state);
}
