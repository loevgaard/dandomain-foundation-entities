<?php
namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_tag_values")
 */
class TagValue extends AbstractEntity implements TagValueInterface
{
    use TagValueTrait;

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
     * @var Tag
     * @todo create doctrine mapping
     */
    protected $tag;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return TagValueInterface
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
     * @return TagValueInterface
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
     * @return TagValueInterface
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return Tag
     */
    public function getTag(): Tag
    {
        return $this->tag;
    }

    /**
     * @param Tag $tag
     * @return TagValueInterface
     */
    public function setTag(Tag $tag)
    {
        $this->tag = $tag;
        return $this;
    }
}
