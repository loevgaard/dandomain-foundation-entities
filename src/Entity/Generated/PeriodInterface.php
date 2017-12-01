<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Period!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface PeriodInterface extends AbstractEntityInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function setExternalId(int $externalId);

    /**
     * @return bool|null
     */
    public function getDisabled();

    /**
     * @param bool|null $disabled
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function setDisabled($disabled);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getEndDate();

    /**
     * @param \DateTimeImmutable|null $endDate
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function setEndDate($endDate);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getStartDate();

    /**
     * @param \DateTimeImmutable|null $startDate
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function setStartDate($startDate);

    /**
     * @return null|string
     */
    public function getTitle();

    /**
     * @param null|string $title
     * @return \Loevgaard\DandomainFoundation\Entity\Period
     */
    public function setTitle($title);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
