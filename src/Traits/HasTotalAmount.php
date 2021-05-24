<?php

namespace Omnipay\ECPay\Traits;

trait HasTotalAmount
{
    /**
     * 交易金額.
     *
     * @param string $value
     * @return $this
     */
    public function setTotalAmount($value)
    {
        return $this->setAmount($value);
    }

    /**
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->getAmount();
    }
}
