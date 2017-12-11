<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\PeriodTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_periods")
 */
class Period extends AbstractEntity implements PeriodInterface
{
    use PeriodTrait;

    protected $hydrateConversions = [
        'id' => 'externalId'
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
     * @var string
     *
     * @ORM\Column(type="string", unique=true, length=191)
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

    public function hydrate(array $data, bool $useConversions = false, $scalarsOnly = true)
    {
        $data['startDate'] = $this->getDateTimeFromJson($data['startDate']);
        $data['endDate'] = $this->getDateTimeFromJson($data['endDate']);

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
     * @return PeriodInterface
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return (string)$this->externalId;
    }

    /**
     * @param string $externalId
     * @return PeriodInterface
     */
    public function setExternalId(string $externalId)
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
     * @return PeriodInterface
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
     * @return PeriodInterface
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
     * @return PeriodInterface
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
     * @return PeriodInterface
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}
