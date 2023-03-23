<?php

namespace Omnipay\ECPay\Message;

use Ecpay\Sdk\Exceptions\RtnException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ECPay\Traits\HasAmount;
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
    use HasAmount;

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
        $this->validate('transactionId', 'transactionReference', 'amount');

        return [
            'MerchantTradeNo' => $this->getTransactionId(),
            'TradeNo' => $this->getTransactionReference(),
            'Action' => 'R',
            'TotalAmount' => $this->getAmount(),
        ];
    }

    public function sendData($data)
    {
        return $this->response = new VoidOrRefundResponse($this, $this->doAction($data));
    }

    /**
     * @param  array  $data
     * @return array
     *
     * @throws RtnException
     */
    protected function doAction($data)
    {
        return $this->factory($this, 'PostWithCmvEncodedStrResponseService')
            ->post($data, 'https://payment.ecpay.com.tw/CreditDetail/DoAction');
    }
}
