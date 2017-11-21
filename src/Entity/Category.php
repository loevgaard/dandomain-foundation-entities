<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_categories")
 */
class Category implements CategoryInterface
{
    use CategoryTrait;

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
     * @ORM\JoinTable(name="loevgaard_dandomain_category_parents")
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
     * @ORM\JoinTable(name="loevgaard_dandomain_category_segments")
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
}
