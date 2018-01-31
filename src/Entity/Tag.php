<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\TagTrait;
use Loevgaard\DandomainFoundation\Entity\Generated\TagTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_tags")
 *
 * @method TagTranslationInterface translate(string $locale = null, bool $fallbackToDefault = true)
 */
class Tag extends AbstractEntity implements TagInterface
{
    use TagTrait;
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
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     **/
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=191)
     **/
    protected $selectorType;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     **/
    protected $sortOrder;

    /**
     * @var TagValueInterface[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="TagValue", mappedBy="tag", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $tagValues;

    public function __construct()
    {
        $this->tagValues = new ArrayCollection();
    }

    public function addTagValue(TagValueInterface $tagValue): TagInterface
    {
        if (!$this->hasTagValue($tagValue)) {
            $this->tagValues->add($tagValue);
            $tagValue->setTag($this);
        }

        return $this;
    }

    public function hasTagValue($tagValue): bool
    {
        if ($tagValue instanceof TagValueInterface) {
            $tagValue = $tagValue->getExternalId();
        }

        return $this->tagValues->exists(function ($key, TagValueInterface $element) use ($tagValue) {
            return $element->getExternalId() === $tagValue;
        });
    }

    public function removeTagValue(TagValueInterface $tagValue): TagInterface
    {
        $this->tagValues->removeElement($tagValue);
        $tagValue->setTag(null);

        return $this;
    }

    public function clearTagValues(): TagInterface
    {
        foreach ($this->tagValues as $tagValue) {
            $this->removeTagValue($tagValue);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     *
     * @return Tag
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
        return (int) $this->externalId;
    }

    /**
     * @param int $externalId
     *
     * @return Tag
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSelectorType(): ?string
    {
        return $this->selectorType;
    }

    /**
     * @param null|string $selectorType
     *
     * @return Tag
     */
    public function setSelectorType(?string $selectorType)
    {
        $this->selectorType = $selectorType;

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
     *
     * @return Tag
     */
    public function setSortOrder(?int $sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return ArrayCollection|TagValueInterface[]
     */
    public function getTagValues()
    {
        return $this->tagValues;
    }

    /**
     * @param ArrayCollection|TagValueInterface[] $tagValues
     *
     * @return Tag
     */
    public function setTagValues($tagValues)
    {
        $this->tagValues = $tagValues;

        return $this;
    }
}
