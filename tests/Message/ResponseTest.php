<?php

namespace Omnipay\ECPay\Tests\Message;

use Omnipay\ECPay\Message\Response;
use Omnipay\Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testConstruct()
    {
        // response should decode URL format data
        $response = new Response($this->getMockRequest(), ['example' => 'value', 'foo' => 'bar']);
        self::assertEquals(['example' => 'value', 'foo' => 'bar'], $response->getData());
    }

    public function testProPurchaseSuccess()
    {
        $httpResponse = $this->getMockHttpResponse('AuthorizeSuccess.txt');
        $data = json_decode($httpResponse->getBody(), true);
        $response = new Response($this->getMockRequest(), $data);

        self::assertTrue($response->isSuccessful());
        self::assertEquals('1234', $response->getTransactionReference());
        self::assertNull($response->getMessage());
    }
}
