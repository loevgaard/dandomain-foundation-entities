<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\StateTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_states")
 */
class State extends AbstractEntity implements StateInterface
{
    use StateTrait;

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
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $exclStatistics;

    /**
     * @var bool|null
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isDefault;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string", length=191)
     */
    protected $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return StateInterface
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return $this->externalId;
    }

    /**
     * @param int $externalId
     * @return StateInterface
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getExclStatistics()
    {
        return $this->exclStatistics;
    }

    /**
     * @param bool|null $exclStatistics
     * @return StateInterface
     */
    public function setExclStatistics($exclStatistics)
    {
        $this->exclStatistics = $exclStatistics;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param bool|null $isDefault
     * @return StateInterface
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return StateInterface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
