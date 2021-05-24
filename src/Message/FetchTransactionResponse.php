<?php

namespace Omnipay\ECPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class FetchTransactionResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return (string) $this->getCode() === '1';
    }

    public function getCode()
    {
        return $this->data['TradeStatus'];
    }

    public function getTransactionId()
    {
        return $this->data['MerchantTradeNo'];
    }

    public function getTransactionReference()
    {
        return $this->data['TradeNo'];
    }
}
