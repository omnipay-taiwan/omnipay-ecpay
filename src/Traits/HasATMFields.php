<?php

namespace Omnipay\ECPay\Traits;

trait HasATMFields
{
    public function getExpireDate()
    {
        return $this->getParameter('ExpireDate') ?: 3;
    }

    public function setExpireDate($value)
    {
        return $this->setParameter('ExpireDate', $value);
    }
}
