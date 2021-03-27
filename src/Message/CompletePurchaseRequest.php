<?php

namespace Omnipay\ECPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\ECPay\Traits\HasCustomFields;
use Omnipay\ECPay\Traits\HasDefaults;
use Omnipay\ECPay\Traits\HasMerchantTradeNo;
use Omnipay\ECPay\Traits\HasStoreID;

class CompletePurchaseRequest extends AbstractRequest implements NotificationInterface
{
    use HasDefaults;
    use HasMerchantTradeNo;
    use HasStoreID;
    use HasCustomFields;

    /**
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->getParameter('PaymentDate');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPaymentDate($value)
    {
        return $this->setParameter('PaymentDate', $value);
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
    public function getPaymentTypeChargeFee()
    {
        return $this->getParameter('PaymentTypeChargeFee');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPaymentTypeChargeFee($value)
    {
        return $this->setParameter('PaymentTypeChargeFee', $value);
    }

    /**
     * @return string
     */
    public function getRtnCode()
    {
        return $this->getParameter('RtnCode');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setRtnCode($value)
    {
        return $this->setParameter('RtnCode', $value);
    }

    /**
     * @return string
     */
    public function getRtnMsg()
    {
        return $this->getParameter('RtnMsg');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setRtnMsg($value)
    {
        return $this->setParameter('RtnMsg', $value);
    }

    /**
     * @return string
     */
    public function getSimulatePaid()
    {
        return $this->getParameter('SimulatePaid');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setSimulatePaid($value)
    {
        return $this->setParameter('SimulatePaid', $value);
    }

    /**
     * @return string
     */
    public function getTradeAmt()
    {
        return $this->getParameter('TradeAmt');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTradeAmt($value)
    {
        return $this->setParameter('TradeAmt', $value);
    }

    /**
     * @return string
     */
    public function getTradeDate()
    {
        return $this->getParameter('TradeDate');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTradeDate($value)
    {
        return $this->setParameter('TradeDate', $value);
    }

    /**
     * @return string
     */
    public function getTradeNo()
    {
        return $this->getTransactionReference();
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTradeNo($value)
    {
        return $this->setTransactionReference($value);
    }

    /**
     * @return string
     */
    public function getCheckMacValue()
    {
        return $this->getParameter('CheckMacValue');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCheckMacValue($value)
    {
        return $this->setParameter('CheckMacValue', $value);
    }

    /**
     * @return array
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('MerchantID', 'CheckMacValue');

        return [
            'CustomField1' => $this->getCustomField1(),
            'CustomField2' => $this->getCustomField2(),
            'CustomField3' => $this->getCustomField3(),
            'CustomField4' => $this->getCustomField4(),
            'MerchantID' => $this->getMerchantID(),
            'MerchantTradeNo' => $this->getMerchantTradeNo(),
            'PaymentDate' => $this->getPaymentDate(),
            'PaymentType' => $this->getPaymentType(),
            'PaymentTypeChargeFee' => $this->getPaymentTypeChargeFee(),
            'RtnCode' => $this->getRtnCode(),
            'RtnMsg' => $this->getRtnMsg(),
            'SimulatePaid' => $this->getSimulatePaid(),
            'StoreID' => $this->getStoreID(),
            'TradeAmt' => $this->getTradeAmt(),
            'TradeDate' => $this->getTradeDate(),
            'TradeNo' => $this->getTransactionReference(),
            'CheckMacValue' => $this->getCheckMacValue(),
        ];
    }

    /**
     * @param array $data
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    public function getTransactionStatus()
    {
        return $this->getNotification()->getTransactionStatus();
    }

    public function getMessage()
    {
        return $this->getNotification()->getMessage();
    }

    /**
     * @return NotificationInterface
     */
    private function getNotification()
    {
        return ! $this->response ? $this->send() : $this->response;
    }
}
