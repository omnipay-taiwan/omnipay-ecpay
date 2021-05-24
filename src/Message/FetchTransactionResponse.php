<?php

namespace Omnipay\ECPay\Message;

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
}
