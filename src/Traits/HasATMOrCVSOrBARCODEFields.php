<?php

namespace Omnipay\ECPay\Traits;

trait HasATMOrCVSOrBARCODEFields
{
    public function getPaymentInfoURL()
    {
        return $this->getParameter('PaymentInfoURL');
    }

    public function setPaymentInfoURL($value)
    {
        return $this->setParameter('PaymentInfoURL', $value);
    }

    public function getClientRedirectURL()
    {
        return $this->getParameter('ClientRedirectURL');
    }

    public function setClientRedirectURL($value)
    {
        return $this->setParameter('ClientRedirectURL', $value);
    }
}
