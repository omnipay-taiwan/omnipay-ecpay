<?php

namespace Omnipay\ECPay\Tests;

use Omnipay\ECPay\Gateway;
use Omnipay\Tests\GatewayTestCase;
use Omnipay\Common\CreditCard;

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
            'amount' => '10.00',
            'card' => $this->getValidCard(),
        ];
    }

    public function testPurchase()
    {
        $this->setMockHttpResponse('AuthorizeSuccess.txt');

        $response = $this->gateway->purchase($this->options)->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('1234', $response->getTransactionReference());
        self::assertNull($response->getMessage());
    }
}
