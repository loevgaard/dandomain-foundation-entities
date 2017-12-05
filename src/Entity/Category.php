<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTrait;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTranslationInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_categories")
 * @method CategoryTranslationInterface translate(string $locale = null, bool $fallbackToDefault = true)
 */
class Category extends AbstractEntity implements CategoryInterface
{
    use CategoryTrait;
    use Timestampable;
    use SoftDeletable;
    use Translatable;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * This is the internal id in the API
     *
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, length=191)
     */
    protected $number;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $b2bGroupId;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $createdDate;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $customInfoLayout;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $customListLayout;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $defaultParentId;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(nullable=true, type="datetime_immutable")
     */
    protected $editedDate;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $infoLayout;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $internalId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $listLayout;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $modified;

    /**
     * The parent 'id' really refers to the parent number
     *
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $parentIdList;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="json")
     */
    protected $segmentIdList;

    /**
     * @var Category[]|ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="parentCategories", targetEntity="Category")
     */
    protected $childrenCategories;

    /**
     * @var Category[]|ArrayCollection
     *
     * @ORM\JoinTable(name="ldf_category_parents")
     * @ORM\ManyToMany(inversedBy="childrenCategories", targetEntity="Category")
     */
    protected $parentCategories;

    /**
     * @var Product[]||ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="categories", targetEntity="Product")
     */
    protected $products;

    /**
     * @var Segment[]|ArrayCollection
     *
     * @ORM\JoinTable(name="ldf_category_segments")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="categories", targetEntity="Segment")
     */
    protected $segments;

    public function __construct()
    {
        $this->childrenCategories = new ArrayCollection();
        $this->parentCategories = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->segments = new ArrayCollection();
    }

    /*
     * Collection methods
     */
    public function addParentCategory(CategoryInterface $category) : CategoryInterface
    {
        if (!$this->hasParentCategory($category)) {
            $this->parentCategories->add($category);
        }

        return $this;
    }

    /**
     * @param CategoryInterface|int $category
     * @return bool
     */
    public function hasParentCategory($category) : bool
    {
        if ($category instanceof CategoryInterface) {
            $category = $category->getExternalId();
        }

        return $this->parentCategories->exists(function ($key, CategoryInterface $element) use ($category) {
            return $element->getExternalId() === $category;
        });
    }

    public function removeParentCategory(CategoryInterface $category) : CategoryInterface
    {
        $this->parentCategories->removeElement($category);

        return $this;
    }

    /*
     * Getters / Setters
     */
    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return CategoryInterface
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
     * @return CategoryInterface
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return (string)$this->number;
    }

    /**
     * @param string $number
     * @return CategoryInterface
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getB2bGroupId()
    {
        return $this->b2bGroupId;
    }

    /**
     * @param null|string $b2bGroupId
     * @return CategoryInterface
     */
    public function setB2bGroupId($b2bGroupId)
    {
        $this->b2bGroupId = $b2bGroupId;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTimeImmutable|null $createdDate
     * @return CategoryInterface
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCustomInfoLayout()
    {
        return $this->customInfoLayout;
    }

    /**
     * @param int|null $customInfoLayout
     * @return CategoryInterface
     */
    public function setCustomInfoLayout($customInfoLayout)
    {
        $this->customInfoLayout = $customInfoLayout;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCustomListLayout()
    {
        return $this->customListLayout;
    }

    /**
     * @param int|null $customListLayout
     * @return CategoryInterface
     */
    public function setCustomListLayout($customListLayout)
    {
        $this->customListLayout = $customListLayout;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDefaultParentId()
    {
        return $this->defaultParentId;
    }

    /**
     * @param int|null $defaultParentId
     * @return CategoryInterface
     */
    public function setDefaultParentId($defaultParentId)
    {
        $this->defaultParentId = $defaultParentId;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getEditedDate()
    {
        return $this->editedDate;
    }

    /**
     * @param \DateTimeImmutable|null $editedDate
     * @return CategoryInterface
     */
    public function setEditedDate($editedDate)
    {
        $this->editedDate = $editedDate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInfoLayout()
    {
        return $this->infoLayout;
    }

    /**
     * @param int|null $infoLayout
     * @return CategoryInterface
     */
    public function setInfoLayout($infoLayout)
    {
        $this->infoLayout = $infoLayout;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * @param int|null $internalId
     * @return CategoryInterface
     */
    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getListLayout()
    {
        return $this->listLayout;
    }

    /**
     * @param int|null $listLayout
     * @return CategoryInterface
     */
    public function setListLayout($listLayout)
    {
        $this->listLayout = $listLayout;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param bool|null $modified
     * @return CategoryInterface
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getParentIdList()
    {
        return $this->parentIdList;
    }

    /**
     * @param array|null $parentIdList
     * @return CategoryInterface
     */
    public function setParentIdList($parentIdList)
    {
        $this->parentIdList = $parentIdList;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getSegmentIdList()
    {
        return $this->segmentIdList;
    }

    /**
     * @param array|null $segmentIdList
     * @return CategoryInterface
     */
    public function setSegmentIdList($segmentIdList)
    {
        $this->segmentIdList = $segmentIdList;
        return $this;
    }

    /**
     * @return ArrayCollection|Category[]
     */
    public function getChildrenCategories()
    {
        return $this->childrenCategories;
    }

    /**
     * @param ArrayCollection|Category[] $childrenCategories
     * @return CategoryInterface
     */
    public function setChildrenCategories($childrenCategories)
    {
        $this->childrenCategories = $childrenCategories;
        return $this;
    }

    /**
     * @return ArrayCollection|Category[]
     */
    public function getParentCategories()
    {
        return $this->parentCategories;
    }

    /**
     * @param ArrayCollection|Category[] $parentCategories
     * @return CategoryInterface
     */
    public function setParentCategories($parentCategories)
    {
        $this->parentCategories = $parentCategories;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     * @return CategoryInterface
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return ArrayCollection|Segment[]
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * @param ArrayCollection|Segment[] $segments
     * @return CategoryInterface
     */
    public function setSegments($segments)
    {
        $this->segments = $segments;
        return $this;
    }
}
