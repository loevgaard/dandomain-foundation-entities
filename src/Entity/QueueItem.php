<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemTrait;

/**
 * This entity represent a queue item which is queued for synchronization
 *
 * @ORM\Entity()
 * @ORM\Table(name="ldf_queue", indexes={@ORM\Index(columns={"type"})})
 * @ORM\HasLifecycleCallbacks()
 */
class QueueItem implements QueueItemInterface
{
    use QueueItemTrait;
    use Timestampable;

    const TYPE_ORDER = 'order';
    const TYPE_PRODUCT = 'product';

    const STATUS_PENDING = 'pending';
    const STATUS_ERROR = 'error';
    const STATUS_SUCCESS = 'success';

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
     * @ORM\Column(type="string", length=191)
     */
    protected $identifier;

    /**
     * @var string
     *
     * @ORM\Column(name="`type`", type="string", length=191)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $status;

    public function __construct()
    {
        $this->status = self::STATUS_PENDING;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function validate()
    {
        Assert::that($this->identifier)->string()->minLength(1)->maxLength(191);
        Assert::that($this->type)->choice(self::getTypes());
        Assert::that($this->status)->choice(self::getStatuses());
    }

    public static function getTypes() : array
    {
        return [
            self::TYPE_ORDER => self::TYPE_ORDER,
            self::TYPE_PRODUCT => self::TYPE_PRODUCT,
        ];
    }

    public static function getStatuses() : array
    {
        return [
            self::STATUS_PENDING => self::STATUS_PENDING,
            self::STATUS_ERROR => self::STATUS_ERROR,
            self::STATUS_SUCCESS => self::STATUS_SUCCESS,
        ];
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
     * @return QueueItem
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return (string)$this->identifier;
    }

    /**
     * @param string $identifier
     * @return QueueItem
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return (string)$this->type;
    }

    /**
     * @param string $type
     * @return QueueItem
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return (string)$this->status;
    }

    /**
     * @param string $status
     * @return QueueItem
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
        return $this;
    }
}
