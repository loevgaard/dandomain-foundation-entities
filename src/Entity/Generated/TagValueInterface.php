<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in TagValue!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface TagValueInterface extends AbstractEntityInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\TagValue
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\TagValue
     */
    public function setExternalId(int $externalId);

    /**
     * @return int|null
     */
    public function getSortOrder();

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\TagValue
     */
    public function setSortOrder($sortOrder);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Tag
     */
    public function getTag(): \Loevgaard\DandomainFoundation\Entity\Tag;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Tag $tag
     * @return \Loevgaard\DandomainFoundation\Entity\TagValue
     */
    public function setTag(\Loevgaard\DandomainFoundation\Entity\Tag $tag);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
