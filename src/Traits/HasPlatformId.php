<?php

namespace Omnipay\ECPay\Traits;

trait HasPlatformId
{
    /**
     * 特約合作平台商代號(由綠界提供).
     *
     * @param  string  $value
     * @return $this
     */
    public function setPlatformID($value)
    {
        return $this->setParameter('PlatformID', $value);
    }

    /**
     * @return string
     */
    public function getPlatformID()
    {
        return $this->getParameter('PlatformID');
    }
}
