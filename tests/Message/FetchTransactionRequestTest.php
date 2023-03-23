<?php

namespace Omnipay\ECPay\Tests\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\ECPay\Tests\Stubs\StubFetchTransactionRequest;
use Omnipay\Tests\TestCase;

class FetchTransactionRequestTest extends TestCase
{
    /**
     * @throws InvalidRequestException
     */
    public function testGetData()
    {
        $options = [
            'MerchantID' => '2000132',
            'MerchantTradeNo' => '2821567410556',
            'TimeStamp' => time(),
        ];

        $request = new StubFetchTransactionRequest($this->getHttpClient(), $this->getHttpRequest());
        $request->initialize(array_merge([
            'HashKey' => '5294y06JbISpM5x9',
            'HashIV' => 'v77hoKGq4kWxNNIS',
            'EncryptType' => '1',
            'MerchantID' => '2000132',
        ], $options));
        $request->setTestMode(true);

        self::assertEquals($options, $request->getData());

        return [$request->send(), $options];
    }

    /**
     * @depends testGetData
     */
    public function testSendData($result)
    {
        [$response, $options] = $result;
        self::assertTrue($response->isSuccessful());
        self::assertEquals('1', $response->getCode());
        self::assertEquals('1909021549160081', $response->getTransactionReference());
        self::assertEquals($options['MerchantTradeNo'], $response->getTransactionId());
    }
}
