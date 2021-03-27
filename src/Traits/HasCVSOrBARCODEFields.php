<?php

namespace Omnipay\ECPay\Traits;

trait HasCVSOrBARCODEFields
{
    public function getDesc_1()
    {
        return $this->getParameter('Desc_1');
    }

    public function setDesc_1($value)
    {
        return $this->setParameter('Desc_1', $value);
    }

    public function getDesc_2()
    {
        return $this->getParameter('Desc_2');
    }

    public function setDesc_2($value)
    {
        return $this->setParameter('Desc_2', $value);
    }

    public function getDesc_3()
    {
        return $this->getParameter('Desc_3');
    }

    public function setDesc_3($value)
    {
        return $this->setParameter('Desc_3', $value);
    }

    public function getDesc_4()
    {
        return $this->getParameter('Desc_4');
    }

    public function setDesc_4($value)
    {
        return $this->setParameter('Desc_4', $value);
    }

    public function getStoreExpireDate()
    {
        return $this->getParameter('StoreExpireDate');
    }

    public function setStoreExpireDate($value)
    {
        return $this->setParameter('StoreExpireDate', $value);
    }
}
