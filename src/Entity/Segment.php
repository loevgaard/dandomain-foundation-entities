<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\SegmentInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\SegmentTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_segments")
 */
class Segment implements SegmentInterface
{
    use SegmentTrait;

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
     * @ORM\Column(type="string", unique=true)
     */
    protected $externalId;

    /**
     * @var Category[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="segments", targetEntity="Category")
     */
    protected $categories;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="segments", targetEntity="Product")
     */
    protected $products;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $segmentOptions;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return Segment
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
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return Segment
     */
    public function setExternalId(string $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return ArrayCollection|Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param ArrayCollection|Category[] $categories
     * @return Segment
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection|Product[] $products
     * @return Segment
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return array
     */
    public function getSegmentOptions()
    {
        return $this->segmentOptions;
    }

    /**
     * @param array $segmentOptions
     * @return Segment
     */
    public function setSegmentOptions(array $segmentOptions)
    {
        $this->segmentOptions = $segmentOptions;
        return $this;
    }
}