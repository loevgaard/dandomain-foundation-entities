<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTrait;
use Loevgaard\DandomainFoundation;
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
     * @ORM\Column(type="string", unique=true)
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
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="childrenCategories", targetEntity="Category")
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

        /*
        $actualTexts = null;
        if (is_array($data['texts'])) {
            foreach ($data['texts'] as $text) {
                if ($text->siteId != $this->defaultSiteId) {
                    continue;
                }

                $actualTexts = $text;
            }
        }
        */

        if ($data['createdDate']) {
            $this->createdDate = DateTimeImmutable::createFromJson($data['createdDate']);
        }

        if ($data['editedDate']) {
            $this->createdDate = DateTimeImmutable::createFromJson($data['editedDate']);
        }

        $this
            ->setB2bGroupId($data['b2BGroupId'])
            ->setCustomInfoLayout($data['customInfoLayout'])
            ->setCustomListLayout($data['customListLayout'])
            ->setDefaultParentId($data['defaultParentId'])
            ->setExternalId($data['number'])
            ->setInfoLayout($data['infoLayout'])
            ->setInternalId($data['internalId'])
            ->setListLayout($data['listLayout'])
            ->setModified($data['modified'])
            ->setParentIdList($data['parentIdList'])
            ->setSegmentIdList($data['segmentIdList'])
        ;

        /*
        if (is_array($data['parentIdList'])) {
            foreach ($data['parentIdList'] as $parentId) {
                $parentEntity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
                    'externalId' => (int) $parentId,
                ]);

                if (null !== $parentEntity) {
                    $this->addParentCategory($parentEntity);
                }
            }
        }

        if (is_array($data['segmentIdList'])) {
            foreach ($data['segmentIdList'] as $segmentId) {
                $segment = $this->segmentSynchronizer->syncSegment($segmentId, $flush);
                $this->addSegment($segment);
            }
        }

        if (($entity instanceof TranslatableInterface) && (is_array($data['texts']))) {
            foreach ($data['texts'] as $text) {
                $entity->translate($text->siteId)->setCategoryNumber($text->categoryNumber);
                $entity->translate($text->siteId)->setDescription($text->description);
                $entity->translate($text->siteId)->setExternalId($text->id);
                $entity->translate($text->siteId)->setHidden($text->hidden);
                $entity->translate($text->siteId)->setHiddenMobile($text->hiddenMobile);
                $entity->translate($text->siteId)->setIcon($text->icon);
                $entity->translate($text->siteId)->setImage($text->image);
                $entity->translate($text->siteId)->setKeywords($text->Keywords);
                $entity->translate($text->siteId)->setLink($text->link);
                $entity->translate($text->siteId)->setMetaDescription($text->metaDescription);
                $entity->translate($text->siteId)->setName($text->name);
                $entity->translate($text->siteId)->setSiteId($text->siteId);
                $entity->translate($text->siteId)->setSortOrder($text->sortOrder);
                $entity->translate($text->siteId)->setString($text->string);
                $entity->translate($text->siteId)->setTitle($text->title);
                $entity->translate($text->siteId)->setUrlname($text->urlname);

                $entity->mergeNewTranslations();
            }
        }
        */
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
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
     * @return Category
     */
    public function setSegments($segments)
    {
        $this->segments = $segments;
        return $this;
    }
}
