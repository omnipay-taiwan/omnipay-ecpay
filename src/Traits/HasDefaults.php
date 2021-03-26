<?php

namespace Omnipay\ECPay\Traits;

trait HasDefaults
{
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
    public function setHashKey($value)
    {
        return $this->setParameter('HashKey', $value);
    }

    /**
     * @return string
     */
    public function getHashIV()
    {
        return $this->getParameter('HashIV');
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
    public function getMerchantID()
    {
        return $this->getParameter('MerchantID');
    }

    /**
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
    public function getEncryptType()
    {
        return $this->getParameter('EncryptType');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEncryptType($value)
    {
        return $this->setParameter('EncryptType', $value);
    }
}
