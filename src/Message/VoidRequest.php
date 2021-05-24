<?php

namespace Omnipay\ECPay\Message;

use ECPay_ActionType;

class VoidRequest extends RefundRequest
{
    public function setAction($value)
    {
        return $this->setParameter('action', $value);
    }

    public function getAction()
    {
        return $this->getParameter('action') ?: ECPay_ActionType::N;
    }

    public function getData()
    {
        $this->validate('transactionId', 'transactionReference', 'amount');

        return [
            'MerchantTradeNo' => $this->getTransactionId(),
            'TradeNo' => $this->getTransactionReference(),
            'Action' => $this->getAction(),
            'TotalAmount' => $this->getAmount(),
        ];
    }
}
