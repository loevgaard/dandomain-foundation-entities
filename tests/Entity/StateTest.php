<?php

namespace Loevgaard\DandomainFoundation\Entity;

use PHPUnit\Framework\TestCase;

final class StateTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new State();
        $this->assertSame(0, $entity->getId());
        $this->assertSame(0, $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $entity = new State();
        $entity
            ->setId(1)
        ;

        $this->assertSame(1, $entity->getId());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-state.json'), true);
        $entity = new State();
        $entity->hydrate($data, true);

        $this->assertSame($data['exclStatistics'], $entity->getExclStatistics());
        $this->assertSame($data['id'], $entity->getExternalId());
        $this->assertSame($data['isDefault'], $entity->getIsDefault());
        $this->assertSame($data['name'], $entity->getName());
    }
}
