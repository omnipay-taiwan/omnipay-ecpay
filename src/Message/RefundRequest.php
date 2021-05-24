<?php

namespace Omnipay\ECPay\Message;

use ECPay_ActionType;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ECPay\Traits\HasDefaults;
use Omnipay\ECPay\Traits\HasECPay;
use Omnipay\ECPay\Traits\HasMerchantTradeNo;
use Omnipay\ECPay\Traits\HasTotalAmount;

class RefundRequest extends AbstractRequest
{
    use HasECPay;
    use HasDefaults;
    use HasMerchantTradeNo;
    use HasTotalAmount;

    public function setTradeNo($value)
    {
        return $this->setTransactionReference($value);
    }

    public function getTradeNo()
    {
        return $this->getTransactionReference();
    }

    public function getData()
    {
        $this->validate('transactionId', 'transactionReference');

        return [
            'MerchantTradeNo' => $this->getTransactionId(),
            'TradeNo' => $this->getTransactionReference(),
            'Action' => ECPay_ActionType::R,
            'TotalAmount' => $this->getAmount(),
        ];
    }

    public function sendData($data)
    {
        return $this->response = new RefundResponse($this, $this->doAction($data));
    }

    /**
     * @param array $data
     * @return array
     */
    protected function doAction($data)
    {
        $obj = $this->createECPay($this);
        $obj->ServiceURL = 'https://payment.ecpay.com.tw/CreditDetail/DoAction';
        $obj->Action = $data;

        return $obj->DoAction();
    }
}
