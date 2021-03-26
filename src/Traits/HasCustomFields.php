<?php

namespace Omnipay\ECPay\Traits;

trait HasCustomFields
{
    /**
     * @return string
     */
    public function getCustomField1()
    {
        return $this->getParameter('CustomField1');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCustomField1($value)
    {
        return $this->setParameter('CustomField1', $value);
    }

    /**
     * @return string
     */
    public function getCustomField2()
    {
        return $this->getParameter('CustomField2');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCustomField2($value)
    {
        return $this->setParameter('CustomField2', $value);
    }

    /**
     * @return string
     */
    public function getCustomField3()
    {
        return $this->getParameter('CustomField3');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCustomField3($value)
    {
        return $this->setParameter('CustomField3', $value);
    }

    /**
     * @return string
     */
    public function getCustomField4()
    {
        return $this->getParameter('CustomField4');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCustomField4($value)
    {
        return $this->setParameter('CustomField4', $value);
    }
}
