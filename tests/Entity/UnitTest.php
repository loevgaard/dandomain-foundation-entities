<?php

namespace Loevgaard\DandomainFoundation\Entity;

use PHPUnit\Framework\TestCase;

final class UnitTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new Unit();
        $this->assertSame(0, $entity->getId());
        $this->assertSame(0, $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $entity = new Unit();
        $entity
            ->setId(1)
        ;

        $this->assertSame(1, $entity->getId());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-unit.json'), true);
        $entity = new Unit();
        $entity->hydrate($data, true);

        $this->assertSame($data['text'], $entity->getText());
    }
}
