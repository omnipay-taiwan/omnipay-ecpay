<?php

namespace Omnipay\ECPay\Traits;

trait HasStoreID
{
    /**
     * 特店旗下店舖代號
     *
     * @param  string  $value
     * @return $this
     */
    public function setStoreID($value)
    {
        return $this->setParameter('StoreID', $value);
    }

    /**
     * @return string
     */
    public function getStoreID()
    {
        return $this->getParameter('StoreID');
    }
}
