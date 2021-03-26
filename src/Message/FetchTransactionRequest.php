<?php

namespace Omnipay\ECPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ECPay\Traits\HasDefaults;
use Omnipay\ECPay\Traits\HasECPay;
use Omnipay\ECPay\Traits\HasMerchantTradeNo;

class FetchTransactionRequest extends AbstractRequest
{
    use HasDefaults;
    use HasECPay;
    use HasMerchantTradeNo;

    protected $liveEndpoint = 'https://payment.ecpay.com.tw/Cashier/QueryTradeInfo/V5';
    protected $testEndpoint = 'https://payment-stage.ecpay.com.tw/Cashier/QueryTradeInfo/V5';

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->getParameter('TimeStamp') ?: time();
    }

    /**
     * @param int $value
     * @return FetchTransactionRequest
     */
    public function setTimestamp($value)
    {
        return $this->setParameter('TimeStamp', $value);
    }

    /**
     * @return array
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('transactionId');

        return [
            'MerchantID' => $this->getMerchantID(),
            'MerchantTradeNo' => $this->getTransactionId(),
            'TimeStamp' => $this->getTimestamp(),
        ];
    }

    public function sendData($data)
    {
        return $this->response = new FetchTransactionResponse($this, $this->getTradeInfo($data));
    }

    /**
     * @param $data
     * @return array
     */
    protected function getTradeInfo($data)
    {
        $obj = $this->createECPay($this);
        $obj->ServiceURL = $this->getEndpoint();
        $obj->Query['MerchantTradeNo'] = $data['MerchantTradeNo'];
        $obj->Query['TimeStamp'] = $data['TimeStamp'];

        return $obj->QueryTradeInfo();
    }

    private function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
