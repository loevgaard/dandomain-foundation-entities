<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Fixture\Entity;
use PHPUnit\Framework\TestCase;

final class AbstractEntityTest extends TestCase
{
    public function testDate1()
    {
        $entity = new Entity();
        $entity->setDate(null);

        $this->assertSame(null, $entity->getDate());
    }

    public function testDate2()
    {
        $d = new DateTimeImmutable();
        $entity = new Entity();
        $entity->setDate($d);

        $this->assertSame($d, $entity->getDate());
    }

    public function testExtract1()
    {
        $d = new DateTimeImmutable();
        $entity = new Entity();
        $entity->setDate($d);

        $expected = [
            'date' => $d,
            'name' => null,
        ];

        $this->assertEquals($expected, $entity->extract());
    }

    public function testExtract2()
    {
        $entity = new Entity();
        $entity->setName('name');

        $expected = [
            'nameConverted' => 'name',
            'date' => null
        ];

        $this->assertEquals($expected, $entity->extract(true));
    }

    public function testHydrateWithWrongConversions()
    {
        $this->expectException(\InvalidArgumentException::class);

        $entity = new Entity();
        $entity->hydrate([
            'id' => 1,
            'externalId' => 2
        ], true);
    }
}
