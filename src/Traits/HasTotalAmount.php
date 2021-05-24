<?php

namespace Omnipay\ECPay\Traits;

trait HasTotalAmount
{
    /**
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->getAmount();
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTotalAmount($value)
    {
        return $this->setAmount($value);
    }
}
