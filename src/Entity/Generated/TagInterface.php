<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Tag!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface TagInterface
{

    /**
     * @inheritdoc
     */
    public function addTagValue(\Loevgaard\DandomainFoundation\Entity\TagValue $tagValue);

    /**
     * @inheritdoc
     */
    public function clearTagValues();

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Tag
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Tag
     */
    public function setExternalId(int $externalId);

    /**
     * @return null|string
     */
    public function getSelectorType();

    /**
     * @param null|string $selectorType
     * @return \Loevgaard\DandomainFoundation\Entity\Tag
     */
    public function setSelectorType($selectorType);

    /**
     * @return int|null
     */
    public function getSortOrder();

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\Tag
     */
    public function setSortOrder($sortOrder);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\TagValue[]
     */
    public function getTagValues();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\TagValue[] $tagValues
     * @return \Loevgaard\DandomainFoundation\Entity\Tag
     */
    public function setTagValues($tagValues);
}
