<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Unit!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface UnitInterface extends AbstractEntityInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Unit
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Unit
     */
    public function setExternalId(int $externalId);

    /**
     * @return null|string
     */
    public function getText();

    /**
     * @param null|string $text
     * @return \Loevgaard\DandomainFoundation\Entity\Unit
     */
    public function setText($text);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
