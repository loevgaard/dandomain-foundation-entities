<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class PeriodTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $entity = new Period();
        $this->assertSame(0, $entity->getId());
        $this->assertSame('', $entity->getExternalId());
    }

    public function testGettersSetters()
    {
        $entity = new Period();
        $entity
            ->setId(1)
        ;

        $this->assertSame(1, $entity->getId());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-period.json'), true);
        $entity = new Period();
        $entity->hydrate($data, true);

        $startDate = DateTimeImmutable::createFromJson($data['startDate']);
        $endDate = DateTimeImmutable::createFromJson($data['endDate']);

        $this->assertSame($data['disabled'], $entity->getDisabled());
        $this->assertEquals($endDate, $entity->getEndDate());
        $this->assertSame($data['id'], $entity->getExternalId());
        $this->assertEquals($startDate, $entity->getStartDate());
        $this->assertSame($data['title'], $entity->getTitle());
    }
}
