<?php

namespace Omnipay\ECPay\Tests;

use Omnipay\ECPay\SkeletonGateway;
use Omnipay\Tests\GatewayTestCase;
use Omnipay\Common\CreditCard;

class GatewayTest extends GatewayTestCase
{
    /** @var SkeletonGateway */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new SkeletonGateway($this->getHttpClient(), $this->getHttpRequest());

        $this->options = [
            'amount' => '10.00',
            'card' => $this->getValidCard(),
        ];
    }

    public function testAuthorize()
    {
        $this->setMockHttpResponse('AuthorizeSuccess.txt');

        $response = $this->gateway->authorize($this->options)->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('1234', $response->getTransactionReference());
        self::assertNull($response->getMessage());
    }
}
