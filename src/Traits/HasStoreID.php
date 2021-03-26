<?php

namespace Omnipay\ECPay\Traits;

trait HasStoreID
{
    /**
     * @return string
     */
    public function getStoreID()
    {
        return $this->getParameter('StoreID');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setStoreID($value)
    {
        return $this->setParameter('StoreID', $value);
    }
}
