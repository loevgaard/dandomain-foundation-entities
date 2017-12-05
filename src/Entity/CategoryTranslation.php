<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTranslationTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_category_translations")
 */
class CategoryTranslation extends AbstractEntity implements CategoryTranslationInterface
{
    use CategoryTranslationTrait;
    use Translation;

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
    protected $categoryNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $description;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hidden;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hiddenMobile;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $icon;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $image;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $keywords;

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
    protected $metaDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $string;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $title;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $urlName;

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return (int)$this->externalId;
    }

    /**
     * @param int $externalId
     * @return CategoryTranslationInterface
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCategoryNumber(): ?string
    {
        return $this->categoryNumber;
    }

    /**
     * @param null|string $categoryNumber
     * @return CategoryTranslationInterface
     */
    public function setCategoryNumber(?string $categoryNumber)
    {
        $this->categoryNumber = $categoryNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return CategoryTranslationInterface
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }

    /**
     * @param bool|null $hidden
     * @return CategoryTranslationInterface
     */
    public function setHidden(?bool $hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHiddenMobile(): ?bool
    {
        return $this->hiddenMobile;
    }

    /**
     * @param bool|null $hiddenMobile
     * @return CategoryTranslationInterface
     */
    public function setHiddenMobile(?bool $hiddenMobile)
    {
        $this->hiddenMobile = $hiddenMobile;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param null|string $icon
     * @return CategoryTranslationInterface
     */
    public function setIcon(?string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param null|string $image
     * @return CategoryTranslationInterface
     */
    public function setImage(?string $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    /**
     * @param null|string $keywords
     * @return CategoryTranslationInterface
     */
    public function setKeywords(?string $keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param null|string $link
     * @return CategoryTranslationInterface
     */
    public function setLink(?string $link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param null|string $metaDescription
     * @return CategoryTranslationInterface
     */
    public function setMetaDescription(?string $metaDescription)
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return CategoryTranslationInterface
     */
    public function setName(?string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSiteId(): ?int
    {
        return $this->siteId;
    }

    /**
     * @param int|null $siteId
     * @return CategoryTranslationInterface
     */
    public function setSiteId(?int $siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return CategoryTranslationInterface
     */
    public function setSortOrder(?int $sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getString(): ?string
    {
        return $this->string;
    }

    /**
     * @param null|string $string
     * @return CategoryTranslationInterface
     */
    public function setString(?string $string)
    {
        $this->string = $string;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     * @return CategoryTranslationInterface
     */
    public function setTitle(?string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUrlName(): ?string
    {
        return $this->urlName;
    }

    /**
     * @param null|string $urlName
     * @return CategoryTranslationInterface
     */
    public function setUrlName(?string $urlName)
    {
        $this->urlName = $urlName;
        return $this;
    }
}
