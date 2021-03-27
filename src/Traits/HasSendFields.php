<?php

namespace Omnipay\ECPay\Traits;

use ECPay_ExtraPaymentInfo;
use ECPay_InvoiceState;
use ECPay_PaymentMethod;
use ECPay_PaymentMethodItem;

trait HasSendFields
{
    /**
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->getAmount();
    }

    /**
     * @param string $value
     * @return this
     */
    public function setTotalAmount($value)
    {
        return $this->setAmount($value);
    }

    /**
     * @return string
     */
    public function getTradeDesc()
    {
        return $this->getDescription();
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTradeDesc($value)
    {
        return $this->setDescription($value);
    }

    /**
     * @return string
     */
    public function getMerchantTradeDate()
    {
        return $this->getParameter('MerchantTradeDate') ?: date('Y/m/d H:i:s');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantTradeDate($value)
    {
        return $this->setParameter('MerchantTradeDate', $value);
    }

    /**
     * @return string
     */
    public function getClientBackURL()
    {
        return $this->getParameter('ClientBackURL');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setClientBackURL($value)
    {
        return $this->setParameter('ClientBackURL', $value);
    }

    /**
     * @return string
     */
    public function getOrderResultURL()
    {
        return $this->getParameter('OrderResultURL');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setOrderResultURL($value)
    {
        return $this->setParameter('OrderResultURL', $value);
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->getParameter('PaymentType');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPaymentType($value)
    {
        return $this->setParameter('PaymentType', $value);
    }

    /**
     * @return string
     */
    public function getChoosePayment()
    {
        return $this->getParameter('ChoosePayment') ?: ECPay_PaymentMethod::ALL;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setChoosePayment($value)
    {
        return $this->setParameter('ChoosePayment', $value);
    }

    /**
     * @return string
     */
    public function getRemark()
    {
        return $this->getParameter('Remark');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setRemark($value)
    {
        return $this->setParameter('Remark', $value);
    }

    /**
     * @return string
     */
    public function getChooseSubPayment()
    {
        return $this->getParameter('ChooseSubPayment') ?: ECPay_PaymentMethodItem::None;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setChooseSubPayment($value)
    {
        return $this->setParameter('ChooseSubPayment', $value);
    }

    /**
     * @return string
     */
    public function getNeedExtraPaidInfo()
    {
        return $this->getParameter('NeedExtraPaidInfo') ?: ECPay_ExtraPaymentInfo::No;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setNeedExtraPaidInfo($value)
    {
        return $this->setParameter('NeedExtraPaidInfo', $value);
    }

    /**
     * @return string
     */
    public function getDeviceSource()
    {
        return $this->getParameter('DeviceSource');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDeviceSource($value)
    {
        return $this->setParameter('DeviceSource', $value);
    }

    /**
     * @return string
     */
    public function getIgnorePayment()
    {
        return $this->getParameter('IgnorePayment');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setIgnorePayment($value)
    {
        return $this->setParameter('IgnorePayment', $value);
    }

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

    /**
     * @return string
     */
    public function getInvoiceMark()
    {
        return $this->getParameter('InvoiceMark') ?: ECPay_InvoiceState::No;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setInvoiceMark($value)
    {
        return $this->setParameter('InvoiceMark', $value);
    }

    /**
     * @return int
     */
    public function getHoldTradeAMT()
    {
        return $this->getParameter('HoldTradeAMT') ?: 0;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setHoldTradeAMT($value)
    {
        return $this->setParameter('HoldTradeAMT', $value);
    }
}
