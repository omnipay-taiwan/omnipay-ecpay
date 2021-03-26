<?php

namespace Omnipay\ECPay\Traits;

trait HasMerchantTradeNo
{
    /**
     * @return string
     */
    public function getMerchantTradeNo()
    {
        return $this->getTransactionId();
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantTradeNo($value)
    {
        return $this->setTransactionId($value);
    }
}
