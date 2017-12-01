<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_manufacturers")
 */
class Manufacturer implements ManufacturerInterface
{
    use ManufacturerTrait;

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
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $link;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $linkText;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="manufacturers", targetEntity="Product")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * @return Manufacturer
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
     * @return Manufacturer
     */
    public function setExternalId(string $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param null|string $link
     * @return Manufacturer
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLinkText()
    {
        return $this->linkText;
    }

    /**
     * @param null|string $linkText
     * @return Manufacturer
     */
    public function setLinkText($linkText)
    {
        $this->linkText = $linkText;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Manufacturer
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Manufacturer
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}
