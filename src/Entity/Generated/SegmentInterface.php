<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Segment!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface SegmentInterface extends AbstractEntityInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Segment
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getExternalId(): string;

    /**
     * @param string $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Segment
     */
    public function setExternalId(string $externalId);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[]
     */
    public function getCategories();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[] $categories
     * @return \Loevgaard\DandomainFoundation\Entity\Segment
     */
    public function setCategories($categories);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\Segment
     */
    public function setProducts($products);

    /**
     * @return array
     */
    public function getSegmentOptions();

    /**
     * @param array $segmentOptions
     * @return \Loevgaard\DandomainFoundation\Entity\Segment
     */
    public function setSegmentOptions(array $segmentOptions);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
