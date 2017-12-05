<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\InvoiceInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\InvoiceTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_invoices")
 */
class Invoice extends AbstractEntity implements InvoiceInterface
{
    use InvoiceTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $creditNoteNumber;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $date;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isPaid;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $number;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $state;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return Invoice
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Invoice
     */
    public function setCreditNoteNumber($creditNoteNumber)
    {
        $this->creditNoteNumber = $creditNoteNumber;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTimeImmutable|null $date
     * @return Invoice
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisPaid()
    {
        return $this->isPaid;
    }

    /**
     * @param bool|null $isPaid
     * @return Invoice
     */
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     * @return Invoice
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     * @return Invoice
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }
}
