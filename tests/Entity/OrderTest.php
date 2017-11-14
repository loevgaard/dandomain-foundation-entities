<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use PHPUnit\Framework\TestCase;

final class OrderTest extends TestCase
{
    public function testPopulateFromApiResponse()
    {
        $data = json_decode(file_get_contents(__DIR__.'/../data/api-response-order.json'), true);
        $order = new Order();
        $order->populateFromApiResponse($data, true);

        $createdDate = DateTimeImmutable::createFromJson($data['createdDate']);
        $modifiedDate = DateTimeImmutable::createFromJson($data['modifiedDate']);

        $totalPrice = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['totalPrice']);
        $giftCertificateAmount = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['giftCertificateAmount']);
        $salesDiscount = DandomainFoundation\createMoneyFromFloat($data['currencyCode'], $data['salesDiscount']);

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
    }
}
