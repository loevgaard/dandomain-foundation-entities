<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueTrait;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueTranslationInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_tag_values")
 *
 * @method TagValueTranslationInterface translate(string $locale = null, bool $fallbackToDefault = true)
 */
class TagValue extends AbstractEntity implements TagValueInterface
{
    use TagValueTrait;
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
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     **/
    protected $sortOrder;

    /**
     * @var TagInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Tag", inversedBy="tagValues")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    protected $tag;

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
     * @return TagValue
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
     * @return TagValue
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;

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
     * @return TagValue
     */
    public function setSortOrder(?int $sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return TagInterface
     */
    public function getTag(): TagInterface
    {
        return $this->tag;
    }

    /**
     * @param TagInterface $tag
     *
     * @return TagValueInterface
     */
    public function setTag(?TagInterface $tag)
    {
        $this->tag = $tag;

        return $this;
    }
}
