<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Manufacturer!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ManufacturerInterface extends AbstractEntityInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Manufacturer
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getExternalId(): string;

    /**
     * @param string $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Manufacturer
     */
    public function setExternalId(string $externalId);

    /**
     * @return null|string
     */
    public function getLink();

    /**
     * @param null|string $link
     * @return \Loevgaard\DandomainFoundation\Entity\Manufacturer
     */
    public function setLink($link);

    /**
     * @return null|string
     */
    public function getLinkText();

    /**
     * @param null|string $linkText
     * @return \Loevgaard\DandomainFoundation\Entity\Manufacturer
     */
    public function setLinkText($linkText);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return \Loevgaard\DandomainFoundation\Entity\Manufacturer
     */
    public function setName($name);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\Manufacturer
     */
    public function setProducts($products);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
