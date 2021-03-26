<?php

namespace Omnipay\ECPay\Message;

use ECPay_AllInOne as ECPay;
use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;

abstract class AbstractResponse extends BaseAbstractResponse
{
    /**
     * @return ECPay
     */
    protected function createECPay()
    {
        $data = $this->getData();

        if (! empty($data['CheckMacValue']) && empty($_POST['CheckMacValue'])) {
            $_POST = $this->getData();
        }

        $ecPay = new ECPay();
        $ecPay->HashKey = $this->request->getHashKey();
        $ecPay->HashIV = $this->request->getHashIV();
        $ecPay->MerchantID = $this->request->getMerchantID();
        $ecPay->EncryptType = $this->request->getEncryptType();

        foreach (array_keys($ecPay->Send) as $key) {
            if (array_key_exists($key, $data) && ! empty($data[$key])) {
                $ecPay->Send[$key] = $data[$key];
            }
        }

        return $ecPay;
    }
}
