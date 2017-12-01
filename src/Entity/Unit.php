<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\UnitInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\UnitTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_units")
 */
class Unit extends AbstractEntity implements UnitInterface
{
    use UnitTrait;

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
     * @ORM\Column(nullable=true, type="text")
     */
    protected $text;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return Unit
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
     * @return Unit
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
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
     * @return Unit
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
}
