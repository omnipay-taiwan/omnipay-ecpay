<?php

namespace Omnipay\ECPay\Tests\Stubs;

use Omnipay\ECPay\Message\RefundRequest;

class StubRefundRequest extends RefundRequest
{
    /**
     * @param array $data
     * @return array
     */
    protected function doAction($data)
    {
        return [
            'MerchantID' => $this->getMerchantID(),
            'MerchantTradeNo' => $data['MerchantTradeNo'],
            'TradeNo' => $data['TradeNo'],
            'RtnCode' => '1',
            'RtnMsg' => '',
        ];
    }
}
