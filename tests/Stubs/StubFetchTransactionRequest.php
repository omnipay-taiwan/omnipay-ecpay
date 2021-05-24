<?php

namespace Omnipay\ECPay\Tests\Stubs;

use Omnipay\ECPay\Message\FetchTransactionRequest;

class StubFetchTransactionRequest extends FetchTransactionRequest
{
    protected function getTradeInfo($data)
    {
        return [
            'CustomField1' => '',
            'CustomField2' => '',
            'CustomField3' => '',
            'CustomField4' => '',
            'HandlingCharge' => '1',
            'ItemName' => ' 0 元 x 0',
            'MerchantID' => $this->getMerchantID(),
            'MerchantTradeNo' => $data['MerchantTradeNo'],
            'PaymentDate' => '2019/09/02 15:49:58',
            'PaymentType' => 'Credit_CreditCard',
            'PaymentTypeChargeFee' => '1',
            'StoreID' => '',
            'TradeAmt' => '4250',
            'TradeDate' => '2019/09/02 15:49:16',
            'TradeNo' => '1909021549160081',
            'TradeStatus' => '1',
        ];
    }
}
