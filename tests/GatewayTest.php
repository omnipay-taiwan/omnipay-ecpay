<?php

namespace Omnipay\ECPay\Tests;

use Omnipay\ECPay\Gateway;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    /** @var Gateway */
    protected $gateway;
    /**
     * @var array
     */
    private $options;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->options = [
            'transactionId' => uniqid('MerchantTradeNo', true),
            'amount' => 2000,
            'description' => 'description',
            'returnUrl' => 'https://foo.bar/return_url',
            'notifyUrl' => 'https://foo.bar/notify_url',
        ];
    }

    public function testPurchase()
    {
        $response = $this->gateway->purchase($this->options)->send();

        self::assertFalse($response->isSuccessful());
        self::assertFalse($response->isSuccessful());
        self::assertTrue($response->isRedirect());
        self::assertEquals('POST', $response->getRedirectMethod());
        self::assertEquals('https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5', $response->getRedirectUrl());
    }
}
