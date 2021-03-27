<?php

namespace Omnipay\ECPay\Traits;

trait HasCreditFields
{
    public function getCreditInstallment()
    {
        return $this->getParameter('CreditInstallment');
    }

    public function setCreditInstallment($value)
    {
        return $this->setParameter('CreditInstallment', $value);
    }

    public function getInstallmentAmount()
    {
        return $this->getParameter('InstallmentAmount') ?: 0;
    }

    public function setInstallmentAmount($value)
    {
        return $this->setParameter('InstallmentAmount', $value);
    }

    public function getRedeem()
    {
        return $this->getParameter('Redeem') ?: false;
    }

    public function setRedeem($value)
    {
        return $this->setParameter('Redeem', $value);
    }

    public function getUnionPay()
    {
        return $this->getParameter('UnionPay') ?: false;
    }

    public function setUnionPay($value)
    {
        return $this->setParameter('UnionPay', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('Language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('Language', $value);
    }

    public function getBindingCard()
    {
        return $this->getParameter('BindingCard');
    }

    public function setBindingCard($value)
    {
        return $this->setParameter('BindingCard', $value);
    }

    public function getMerchantMemberID()
    {
        return $this->getParameter('MerchantMemberID');
    }

    public function setMerchantMemberID($value)
    {
        return $this->setParameter('MerchantMemberID', $value);
    }

    public function getPeriodAmount()
    {
        return $this->getParameter('PeriodAmount');
    }

    public function setPeriodAmount($value)
    {
        return $this->setParameter('PeriodAmount', $value);
    }

    public function getPeriodType()
    {
        return $this->getParameter('PeriodType');
    }

    public function setPeriodType($value)
    {
        return $this->setParameter('PeriodType', $value);
    }

    public function getFrequency()
    {
        return $this->getParameter('Frequency');
    }

    public function setFrequency($value)
    {
        return $this->setParameter('Frequency', $value);
    }

    public function getExecTimes()
    {
        return $this->getParameter('ExecTimes');
    }

    public function setExecTimes($value)
    {
        return $this->setParameter('ExecTimes', $value);
    }

    public function getPeriodReturnURL()
    {
        return $this->getParameter('PeriodReturnURL');
    }

    public function setPeriodReturnURL($value)
    {
        return $this->setParameter('PeriodReturnURL', $value);
    }
}
