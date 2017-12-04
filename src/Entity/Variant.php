<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\VariantTrait;
use Loevgaard\DandomainFoundation;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_variants")
 */
class Variant extends AbstractEntity implements VariantInterface
{
    use VariantTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $text;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="disabledVariants", targetEntity="Product")
     */
    protected $disabledProducts;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="variants", targetEntity="Product")
     */
    protected $products;

    /**
     * @var VariantGroup[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="variants", targetEntity="VariantGroup")
     */
    protected $variantGroups;

    public function __construct()
    {
        $this->disabledProducts = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->variantGroups = new ArrayCollection();
    }

    /**
     * Populates a variant based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductDataService/help/operations/GetDataProduct
     *
     * @param \stdClass|array $data
     */
    public function populateFromApiResponse($data)
    {
        $data = DandomainFoundation\objectToArray($data);

        $this
            ->setExternalId($data['id'])
            ->setSortOrder($data['sortOrder'])
            ->setText($data['text'])
        ;
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
     * @return Variant
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return (int)$this->externalId;
    }

    /**
     * @param int $externalId
     * @return Variant
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return Variant
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     * @return Variant
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getDisabledProducts()
    {
        return $this->disabledProducts;
    }

    /**
     * @param ArrayCollection|Product[] $disabledProducts
     * @return Variant
     */
    public function setDisabledProducts($disabledProducts)
    {
        $this->disabledProducts = $disabledProducts;
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
     * @return Variant
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return ArrayCollection|VariantGroup[]
     */
    public function getVariantGroups()
    {
        return $this->variantGroups;
    }

    /**
     * @param ArrayCollection|VariantGroup[] $variantGroups
     * @return Variant
     */
    public function setVariantGroups($variantGroups)
    {
        $this->variantGroups = $variantGroups;
        return $this;
    }
}
