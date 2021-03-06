<?php

namespace Omnipay\ECPay\Traits;

use ECPay_AllInOne;

trait HasECPay
{
    /**
     * @param $request
     * @return ECPay_AllInOne
     */
    protected function createECPay($request)
    {
        $data = $this->updateCheckMacValueFromGlobals($this->getData());

        $ecPay = new ECPay_AllInOne();
        $ecPay->HashKey = $request->getHashKey();
        $ecPay->HashIV = $request->getHashIV();
        $ecPay->MerchantID = $request->getMerchantID();
        $ecPay->EncryptType = $request->getEncryptType();

        foreach (array_keys($ecPay->Send) as $key) {
            if (array_key_exists($key, $data) && ! empty($data[$key])) {
                $ecPay->Send[$key] = $data[$key];
            }
        }

        return $ecPay;
    }

    /**
     * @param $data
     * @return mixed
     */
    private function updateCheckMacValueFromGlobals($data)
    {
        if (! empty($data['CheckMacValue']) && empty($_POST['CheckMacValue'])) {
            $_POST = $data;
        }

        return $data;
    }
}
