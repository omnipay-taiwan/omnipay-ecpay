<?php

namespace Omnipay\ECPay\Traits;

use ECPay_AllInOne;

trait HasECPay
{
    private $globalBackup = [];

    /**
     * @param $request
     * @return ECPay_AllInOne
     */
    protected function createECPay($request)
    {
        $ecPay = new ECPay_AllInOne();
        $ecPay->HashKey = $request->getHashKey();
        $ecPay->HashIV = $request->getHashIV();
        $ecPay->MerchantID = $request->getMerchantID();
        $ecPay->EncryptType = $request->getEncryptType();

        return $ecPay;
    }

    /**
     * @param $data
     * @return mixed
     */
    private function updateCheckMacValueFromGlobals($data)
    {
        if (array_key_exists('CheckMacValue', $data)) {
            $_POST = array_merge($_POST, $data);
        }

        return $data;
    }
}
