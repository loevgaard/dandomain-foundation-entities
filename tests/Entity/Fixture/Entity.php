<?php

namespace Loevgaard\DandomainFoundation\Entity\Fixture;

use Loevgaard\DandomainFoundation\Entity\AbstractEntity;

final class Entity extends AbstractEntity
{
    protected $hydrateConversions = [
        'id' => 'externalId',
    ];

    protected $extractConversions = [
        'name' => 'nameConverted',
    ];

    protected $date;
    protected $name;

    public function setDate($date)
    {
        $this->date = $this->getDateTimeFromJson($date);
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
