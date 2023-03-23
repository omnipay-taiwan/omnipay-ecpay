<?php

namespace Omnipay\ECPay\Traits;

trait HasAmount
{
    public function getAmount()
    {
        return $this->getParameter('amount');
    }
}
