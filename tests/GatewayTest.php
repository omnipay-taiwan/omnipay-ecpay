<?php

namespace Omnipay\ECPay\Tests;

use Omnipay\ECPay\Gateway;
use Omnipay\ECPay\Tests\Stubs\StubGateway;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    /** @var Gateway */
    protected $gateway;

    /**
     * @var array
     */
    private $options;

    public function setUp(): void
    {
        parent::setUp();

        $this->gateway = new StubGateway($this->getHttpClient(), $this->getHttpRequest());

        $this->options = [
            'transactionId' => uniqid('MerchantTradeNo', true),
            'amount' => 2000,
            'description' => 'description',
            'returnUrl' => 'https://foo.bar/return_url',
            'notifyUrl' => 'https://foo.bar/notify_url',
            'testMode' => true,
        ];
    }

    public function testPurchase()
    {
        $response = $this->gateway->purchase(array_merge($this->options, []))->send();

        self::assertFalse($response->isSuccessful());
        self::assertTrue($response->isRedirect());
        self::assertEquals('POST', $response->getRedirectMethod());
        self::assertEquals('https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5', $response->getRedirectUrl());
    }

    public function testCompletePurchase()
    {
        $response = $this->gateway->completePurchase(array_merge($this->options, [
            'CustomField1' => '',
            'CustomField2' => '',
            'CustomField3' => '',
            'CustomField4' => '',
            'MerchantID' => '2000132',
            'MerchantTradeNo' => '2821567410556',
            'PaymentDate' => '2019/09/02 15:49:58',
            'PaymentType' => 'Credit_CreditCard',
            'PaymentTypeChargeFee' => '1',
            'RtnCode' => '1',
            'RtnMsg' => 'Succeeded',
            'SimulatePaid' => '0',
            'StoreID' => '',
            'TradeAmt' => '4250',
            'TradeDate' => '2019/09/02 15:49:16',
            'TradeNo' => '1909021549160081',
            'CheckMacValue' => 'E7EC8DDC6C5C51B1A4D8BEA261246066858B38184C55FD3DD3D6DFF53F535A64',
        ]))->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('Succeeded', $response->getMessage());
    }

    public function testAcceptNotification()
    {
        $response = $this->gateway->acceptNotification(array_merge($this->options, [
            'CustomField1' => '',
            'CustomField2' => '',
            'CustomField3' => '',
            'CustomField4' => '',
            'MerchantID' => '2000132',
            'MerchantTradeNo' => '2821567410556',
            'PaymentDate' => '2019/09/02 15:49:58',
            'PaymentType' => 'Credit_CreditCard',
            'PaymentTypeChargeFee' => '1',
            'RtnCode' => '1',
            'RtnMsg' => 'Succeeded',
            'SimulatePaid' => '0',
            'StoreID' => '',
            'TradeAmt' => '4250',
            'TradeDate' => '2019/09/02 15:49:16',
            'TradeNo' => '1909021549160081',
            'CheckMacValue' => 'E7EC8DDC6C5C51B1A4D8BEA261246066858B38184C55FD3DD3D6DFF53F535A64',
        ]))->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('Succeeded', $response->getMessage());
        self::assertEquals('1|OK', $response->getReply());
    }

    public function testFetchTransaction()
    {
        $response = $this->gateway->fetchTransaction(array_merge($this->options, [
            'transactionId' => '2821567410556',
            'TimeStamp' => time(),
        ]))->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('1909021549160081', $response->getTransactionReference());
        self::assertEquals('2821567410556', $response->getTransactionId());
    }

    public function testRefund()
    {
        $response = $this->gateway->refund(array_merge($this->options, [
            'transactionReference' => '1909021549160081',
            'transactionId' => '2821567410556',
            'amount' => 1000,
        ]))->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('1909021549160081', $response->getTransactionReference());
        self::assertEquals('2821567410556', $response->getTransactionId());
    }

    public function testVoid()
    {
        $response = $this->gateway->void(array_merge($this->options, [
            'transactionReference' => '1909021549160081',
            'transactionId' => '2821567410556',
            'amount' => 1000,
        ]))->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('1909021549160081', $response->getTransactionReference());
        self::assertEquals('2821567410556', $response->getTransactionId());
    }
}
