<?php

namespace Omnipay\ECPay\Tests\Message;

use Omnipay\ECPay\Tests\Stubs\StubRefundRequest;
use Omnipay\Tests\TestCase;

class RefundRequestTest extends TestCase
{
    public function testGetData()
    {
        $options = [
            'MerchantID' => '2000132',
            'MerchantTradeNo' => '2821567410556',
            'TradeNo' => '1909021549160081',
            'TotalAmount' => 1000,
        ];
        $request = new StubRefundRequest($this->getHttpClient(), $this->getHttpRequest());
        $request->initialize($options);

        self::assertEquals([
            'MerchantTradeNo' => '2821567410556',
            'TradeNo' => '1909021549160081',
            'Action' => 'R',
            'TotalAmount' => '1000',
        ], $request->getData());
    }
}
