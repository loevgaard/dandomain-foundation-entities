<?php

namespace Loevgaard\DandomainFoundation\Entity;

use PHPUnit\Framework\TestCase;
use function Loevgaard\DandomainFoundation\createMoney;
use function Loevgaard\DandomainFoundation\createMoneyFromFloat;

final class FunctionsTest extends TestCase
{
    public function testCreateMoney()
    {
        $money = createMoney('DKK', 100);

        $this->assertSame('100', $money->getAmount());
        $this->assertSame('DKK', $money->getCurrency()->getCode());
    }

    public function testCreateMoneyFromFloat1()
    {
        $money = createMoneyFromFloat('DKK', 1);
        $this->assertSame('DKK', $money->getCurrency()->getCode());
        $this->assertSame('100', $money->getAmount());
    }

    public function testCreateMoneyFromFloat2()
    {
        $money = createMoneyFromFloat('DKK', 1.95);
        $this->assertSame('DKK', $money->getCurrency()->getCode());
        $this->assertSame('195', $money->getAmount());
    }

    public function testCreateMoneyFromFloat3()
    {
        $money = createMoneyFromFloat('DKK', 129.95);
        $this->assertSame('DKK', $money->getCurrency()->getCode());
        $this->assertSame('12995', $money->getAmount());
    }

    public function testCreateMoneyFromFloat4()
    {
        $money = createMoneyFromFloat('DKK', 100);
        $this->assertSame('DKK', $money->getCurrency()->getCode());
        $this->assertSame('10000', $money->getAmount());
    }

    public function testCreateMoneyFromFloat5()
    {
        $money = createMoneyFromFloat('DKK', '129.95');
        $this->assertSame('DKK', $money->getCurrency()->getCode());
        $this->assertSame('12995', $money->getAmount());
    }
}
