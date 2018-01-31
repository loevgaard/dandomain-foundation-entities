<?php

namespace Loevgaard\DandomainFoundation\Entity;

use PHPUnit\Framework\TestCase;

final class VariantGroupTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new VariantGroup();
        $this->assertSame(0, $entity->getId());
        $this->assertSame(0, $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $entity = new VariantGroup();
        $entity
            ->setId(1)
        ;

        $this->assertSame(1, $entity->getId());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-variant-group.json'), true);
        $entity = new VariantGroup();
        $entity->hydrate($data, true);

        $this->assertSame($data['id'], $entity->getExternalId());
        $this->assertSame($data['selectText'], $entity->getSelectText());
        $this->assertSame($data['siteId'], $entity->getSiteId());
        $this->assertSame($data['sortOrder'], $entity->getSortOrder());
        $this->assertSame($data['text'], $entity->getText());
    }
}
