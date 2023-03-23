<?php

namespace Omnipay\ECPay\Tests\Message;

use Omnipay\ECPay\Tests\Stubs\StubVoidRequest;
use Omnipay\Tests\TestCase;

class VoidRequestTest extends TestCase
{
    public function testGetData()
    {
        $options = [
            'MerchantID' => '2000132',
            'MerchantTradeNo' => '2821567410556',
            'TradeNo' => '1909021549160081',
            'TotalAmount' => 1000,
        ];
        $request = new StubVoidRequest($this->getHttpClient(), $this->getHttpRequest());
        $request->initialize($options);

        self::assertEquals([
            'MerchantTradeNo' => '2821567410556',
            'TradeNo' => '1909021549160081',
            'Action' => 'N',
            'TotalAmount' => '1000',
        ], $request->getData());
    }
}
