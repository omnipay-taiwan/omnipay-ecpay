<?php

namespace Omnipay\ECPay\Traits;

use Omnipay\ECPay\Gateway;

trait HasDefaults
{
    /**
     * @return string
     */
    public function getServiceURL()
    {
        return $this->getParameter('ServiceURL');
    }

    /**
     * @param string $value
     * @return Gateway
     */
    public function setServiceURL($value)
    {
        return $this->setParameter('ServiceURL', $value);
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
     * @return Gateway
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
     * @return Gateway
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
     * @return Gateway
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
     * @return Gateway
     */
    public function setEncryptType($value)
    {
        return $this->setParameter('EncryptType', $value);
    }
}
