<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_manufacturers")
 */
class Manufacturer extends AbstractEntity implements ManufacturerInterface
{
    use ManufacturerTrait;

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
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
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
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="manufacturers", targetEntity="Product", fetch="EXTRA_LAZY")
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
     * @return ManufacturerInterface
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
     * @return ManufacturerInterface
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
     * @return ManufacturerInterface
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
     * @return ManufacturerInterface
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
     * @return ManufacturerInterface
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
     * @return ManufacturerInterface
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}
