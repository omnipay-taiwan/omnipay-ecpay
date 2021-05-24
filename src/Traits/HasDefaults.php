<?php

namespace Omnipay\ECPay\Traits;

trait HasDefaults
{
    /**
     * 特店編號(由綠界提供).
     *
     * @param string $value
     * @return $this
     */
    public function setMerchantID($value)
    {
        return $this->setParameter('MerchantID', $value);
    }

    /**
     * @return string
     */
    public function getMerchantID()
    {
        return $this->getParameter('MerchantID');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setHashKey($value)
    {
        return $this->setParameter('HashKey', $value);
    }

    /**
     * @return string
     */
    public function getHashKey()
    {
        return $this->getParameter('HashKey');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setHashIV($value)
    {
        return $this->setParameter('HashIV', $value);
    }

    /**
     * @return string
     */
    public function getHashIV()
    {
        return $this->getParameter('HashIV');
    }

    /**
     * CheckMacValue 加密類型.
     *
     * 請固定填入 1，使用 SHA256 加密。
     *
     * @param string $value
     * @return $this
     */
    public function setEncryptType($value)
    {
        return $this->setParameter('EncryptType', $value);
    }

    /**
     * @return string
     */
    public function getEncryptType()
    {
        return $this->getParameter('EncryptType');
    }
}
