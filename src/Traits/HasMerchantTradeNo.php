<?php

namespace Omnipay\ECPay\Traits;

trait HasMerchantTradeNo
{
    /**
     * 特店交易編號(由特店提供).
     *
     * 特店交易編號均為唯一值，不可重複使用。英數字大小寫混合如何避免訂單編號重複請參考 FAQ
     *
     * @param  string  $value
     * @return $this
     */
    public function setMerchantTradeNo($value)
    {
        return $this->setTransactionId($value);
    }

    /**
     * @return string
     */
    public function getMerchantTradeNo()
    {
        return $this->getTransactionId();
    }
}
