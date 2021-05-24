<?php

namespace Omnipay\ECPay\Traits;

trait HasPlatformId
{
    /**
     * @return string
     */
    public function getPlatformID()
    {
        return $this->getParameter('PlatformID');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPlatformID($value)
    {
        return $this->setParameter('PlatformID', $value);
    }
}
