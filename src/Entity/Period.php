<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PeriodTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_periods")
 */
class Period extends AbstractEntity implements PeriodInterface
{
    use PeriodTrait;

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
     * @ORM\Column(type="string", unique=true)
     */
    protected $externalId;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $disabled;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $endDate;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $startDate;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $title;

    public function hydrate(array $data)
    {
        $data['startDate'] = $this->getDateTimeFromJson($data['startDate']);
        $data['endDate'] = $this->getDateTimeFromJson($data['endDate']);

        parent::hydrate($data);
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
     * @return Period
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
     * @return Period
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param bool|null $disabled
     * @return Period
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeImmutable|null $endDate
     * @return Period
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeImmutable|null $startDate
     * @return Period
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     * @return Period
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}
