<?php
namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\TagTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_tags")
 */
class Tag extends AbstractEntity implements TagInterface
{
    use TagTrait;

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
     * @var TagValue[]|ArrayCollection
     * @todo create doctrine mapping
     */
    protected $tagValues;

    public function __construct()
    {
        $this->tagValues = new ArrayCollection();
    }

    /**
     * @inheritdoc
     */
    public function addTagValue(TagValue $tagValue)
    {
        if (!$this->tagValues->contains($tagValue)) {
            $this->tagValues->add($tagValue);
            $tagValue->setTag($this);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function clearTagValues()
    {
        foreach ($this->tagValues as $tagValue) {
            $this->tagValues->removeElement($tagValue);
        }

        return $this;
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
     * @return TagInterface
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
     * @return TagInterface
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSelectorType()
    {
        return $this->selectorType;
    }

    /**
     * @param null|string $selectorType
     * @return TagInterface
     */
    public function setSelectorType($selectorType)
    {
        $this->selectorType = $selectorType;
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
     * @return TagInterface
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return ArrayCollection|TagValue[]
     */
    public function getTagValues()
    {
        return $this->tagValues;
    }

    /**
     * @param ArrayCollection|TagValue[] $tagValues
     * @return TagInterface
     */
    public function setTagValues($tagValues)
    {
        $this->tagValues = $tagValues;
        return $this;
    }
}
