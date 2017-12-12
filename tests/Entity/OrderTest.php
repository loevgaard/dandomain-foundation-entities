<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use PHPUnit\Framework\TestCase;

final class OrderTest extends TestCase
{
    public function testNonInstantiatedValues()
    {
        $order = new Order();
        $this->assertSame(0, $order->getId());
        $this->assertSame(0, $order->getExternalId());
    }

    public function testGettersSetters()
    {
        $customer = new Customer();
        $delivery = new Delivery();
        $invoice = new Invoice();
        $orderLines = new ArrayCollection([new OrderLine()]);
        $paymentMethod = new PaymentMethod();
        $shippingMethod = new ShippingMethod();
        $site = new Site();
        $state = new State();

        $order = new Order();
        $order->setId(1)
            ->setCustomer($customer)
            ->setDelivery($delivery)
            ->setInvoice($invoice)
            ->setOrderLines($orderLines)
            ->setPaymentMethod($paymentMethod)
            ->setShippingMethod($shippingMethod)
            ->setSite($site)
            ->setState($state)
        ;

        $this->assertSame(1, $order->getId());
        $this->assertSame($customer, $order->getCustomer());
        $this->assertSame($delivery, $order->getDelivery());
        $this->assertSame($invoice, $order->getInvoice());
        $this->assertSame($orderLines, $order->getOrderLines());
        $this->assertSame($paymentMethod, $order->getPaymentMethod());
        $this->assertSame($shippingMethod, $order->getShippingMethod());
        $this->assertSame($site, $order->getSite());
        $this->assertSame($state, $order->getState());
    }

    public function testHydrateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-order.json'), true);
        $order = new Order();
        $order->hydrate($data, true);

        $createdDate = DateTimeImmutable::createFromJson($data['createdDate']);
        $modifiedDate = DateTimeImmutable::createFromJson($data['modifiedDate']);

        $totalPrice = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['totalPrice']);
        $giftCertificateAmount = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['giftCertificateAmount']);
        $salesDiscount = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['salesDiscount']);
        $paymentMethodFee = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['paymentInfo']['fee']);
        $shippingMethodFee = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['shippingInfo']['fee']);

        // test first level properties
        $this->assertSame($data['comment'], $order->getComment());
        $this->assertEquals($createdDate, $order->getCreatedDate());
        $this->assertSame($data['creditNoteNumber'], $order->getCreditNoteNumber());
        $this->assertSame($data['currencyCode'], $order->getCurrencyCode());
        $this->assertSame($data['customerComment'], $order->getCustomerComment());
        $this->assertEquals($giftCertificateAmount, $order->getGiftCertificateAmount());
        $this->assertSame($data['giftCertificateNumber'], $order->getGiftCertificateNumber());
        $this->assertSame($data['id'], $order->getExternalId());
        $this->assertSame($data['incomplete'], $order->getIncomplete());
        $this->assertSame($data['ip'], $order->getIp());
        $this->assertSame($data['modified'], $order->getModified());
        $this->assertEquals($modifiedDate, $order->getModifiedDate());
        $this->assertSame($data['referenceNumber'], $order->getReferenceNumber());
        $this->assertSame($data['referrer'], $order->getReferrer());
        $this->assertSame($data['reservedField1'], $order->getReservedField1());
        $this->assertSame($data['reservedField2'], $order->getReservedField2());
        $this->assertSame($data['reservedField3'], $order->getReservedField3());
        $this->assertSame($data['reservedField4'], $order->getReservedField4());
        $this->assertSame($data['reservedField5'], $order->getReservedField5());
        $this->assertEquals($salesDiscount, $order->getSalesDiscount());
        $this->assertEquals($totalPrice, $order->getTotalPrice());
        $this->assertSame($data['totalWeight'], $order->getTotalWeight());
        $this->assertSame($data['trackingNumber'], $order->getTrackingNumber());
        $this->assertSame($data['transactionNumber'], $order->getTransactionNumber());
        $this->assertSame($data['vatPct'], $order->getVatPct());
        $this->assertSame($data['vatRegNumber'], $order->getVatRegNumber());
        $this->assertSame($data['xmlParams'], $order->getXmlParams());
        $this->assertEquals($paymentMethodFee, $order->getPaymentMethodFee());
        $this->assertEquals($shippingMethodFee, $order->getShippingMethodFee());
    }

    public function testAddOrderLine()
    {
        $order = new Order();
        $orderLine = new OrderLine();
        $orderLine->setExternalId(1);
        $order->addOrderLine($orderLine);

        $this->assertCount(1, $order->getOrderLines());
        $this->assertInstanceOf(Order::class, $orderLine->getOrder());
    }

    public function testHasOrderLine1()
    {
        $order = new Order();
        $orderLine = new OrderLine();
        $orderLine->setExternalId(1);
        $order->addOrderLine($orderLine);

        $this->assertTrue($order->hasOrderLine($orderLine));
    }

    public function testHasOrderLine2()
    {
        $order = new Order();
        $orderLine = new OrderLine();
        $orderLine->setExternalId(1);
        $order->addOrderLine($orderLine);

        $this->assertTrue($order->hasOrderLine(1));
    }

    public function testRemoveOrderLine()
    {
        $order = new Order();
        $orderLine = new OrderLine();
        $orderLine->setExternalId(1);
        $order->addOrderLine($orderLine);
        $order->removeOrderLine($orderLine);

        $this->assertCount(0, $order->getOrderLines());
    }

    public function testClearOrderLines()
    {
        $order = new Order();
        $orderLine = new OrderLine();
        $orderLine->setExternalId(1);
        $order->addOrderLine($orderLine);

        $orderLine = new OrderLine();
        $orderLine->setExternalId(2);
        $order->addOrderLine($orderLine);

        $order->clearOrderLines();

        $this->assertCount(0, $order->getOrderLines());
    }
}
