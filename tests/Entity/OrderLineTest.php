<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Loevgaard\DandomainFoundation;
use PHPUnit\Framework\TestCase;

final class OrderLineTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $orderLine = new OrderLine();
        $this->assertSame(0, $orderLine->getId());
        $this->assertSame(0, $orderLine->getExternalId());
    }

    public function testGettersSetters()
    {
        $product = new Product();

        $orderLine = new OrderLine();
        $orderLine
            ->setId(1)
            ->setProduct($product)
        ;

        $this->assertSame(1, $orderLine->getId());
        $this->assertSame($product, $orderLine->getProduct());
    }

    public function testHydrateFromApiResponse()
    {
        $currency = new Currency();
        $currency->setCode('DKK')
            ->setIsoCodeAlpha('DKK')
        ;

        $order = new Order();
        $order->setCurrency($currency);

        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-order-line.json'), true);
        $orderLine = new OrderLine();
        $orderLine->setOrder($order);
        $orderLine->hydrate($data, true);

        $totalPrice = DandomainFoundation\createMoneyFromFloat($currency->getIsoCodeAlpha(), $data['totalPrice']);
        $unitPrice = DandomainFoundation\createMoneyFromFloat($currency->getIsoCodeAlpha(), $data['unitPrice']);

        $this->assertSame($data['id'], $orderLine->getExternalId());
        $this->assertSame($data['fileUrl'], $orderLine->getFileUrl());
        $this->assertSame($data['productId'], $orderLine->getProductNumber());
        $this->assertSame($data['productName'], $orderLine->getProductName());
        $this->assertSame($data['quantity'], $orderLine->getQuantity());
        $this->assertSame($data['variant'], $orderLine->getVariant());
        $this->assertSame($data['vatPct'], $orderLine->getVatPct());
        $this->assertSame($data['xmlParams'], $orderLine->getXmlParams());
        $this->assertEquals($unitPrice, $orderLine->getUnitPrice());
        $this->assertEquals($totalPrice, $orderLine->getTotalPrice());
    }

    public function testException()
    {
        $this->expectException(\RuntimeException::class);
        $orderLine = new OrderLine();
        $orderLine->hydrate([]);
    }

    public function testGetUnitPriceInclVat()
    {
        $order = $this->getOrder('DKK');
        $orderLine = new OrderLine();
        $orderLine
            ->setVatPct(25.0)
            ->setOrder($order)
            ->setUnitPrice(DandomainFoundation\createMoney('DKK', 10396))
        ;

        $this->assertSame('DKK', $orderLine->getUnitPriceInclVat()->getCurrency()->getCode());
        $this->assertSame('12995', $orderLine->getUnitPriceInclVat()->getAmount());
    }

    public function testGetTotalPriceInclVat()
    {
        $order = $this->getOrder('DKK');
        $orderLine = new OrderLine();
        $orderLine
            ->setVatPct(25.0)
            ->setOrder($order)
            ->setTotalPrice(DandomainFoundation\createMoney('DKK', 10396))
        ;

        $this->assertSame('DKK', $orderLine->getTotalPriceInclVat()->getCurrency()->getCode());
        $this->assertSame('12995', $orderLine->getTotalPriceInclVat()->getAmount());
    }

    protected function getOrder(string $currency): Order
    {
        $c = new Currency();
        $c->setIsoCodeAlpha($currency);
        $order = new Order();
        $order->setCurrency($c);

        return $order;
    }
}
