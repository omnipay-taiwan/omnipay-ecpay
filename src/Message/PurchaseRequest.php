<?php

namespace Omnipay\ECPay\Message;

use ECPay_ExtraPaymentInfo;
use ECPay_InvoiceState;
use ECPay_PaymentMethod;
use ECPay_PaymentMethodItem;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ECPay\Traits\HasCustomFields;
use Omnipay\ECPay\Traits\HasDefaults;
use Omnipay\ECPay\Traits\HasMerchantTradeNo;
use Omnipay\ECPay\Traits\HasStoreID;

/**
 * Purchase Request.
 */
class PurchaseRequest extends AbstractRequest
{
    use HasDefaults;
    use HasMerchantTradeNo;
    use HasStoreID;
    use HasCustomFields;

    protected $liveEndpoint = 'https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5';
    protected $testEndpoint = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

    /**
     * @return string
     * @throws InvalidRequestException
     */
    public function getTotalAmount()
    {
        return $this->getAmount();
    }

    /**
     * @param string $value
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
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
     * @return PurchaseRequest
     */
    public function setHoldTradeAMT($value)
    {
        return $this->setParameter('HoldTradeAMT', $value);
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    /**
     * @return array
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate(
            'HashKey',
            'HashIV',
            'MerchantID',
            'EncryptType',
            'transactionId',
            'description',
            'amount',
            'notifyUrl'
        );

        $items = $this->getECPayItems();
        $amount = array_reduce($items, static function ($sum, $item) {
            return $sum + ($item['Price'] * $item['Quantity']);
        }, 0);

        return [
            'ReturnURL' => $this->getNotifyUrl(),
            'ClientBackURL' => $this->getClientBackURL(),
            'OrderResultURL' => $this->getReturnUrl(),
            'MerchantTradeNo' => $this->getTransactionId(),
            'MerchantTradeDate' => $this->getMerchantTradeDate(),
            'PaymentType' => $this->getPaymentType(),
            'TotalAmount' => $amount,
            'TradeDesc' => $this->getDescription(),
            'ChoosePayment' => $this->getChoosePayment(),
            'Remark' => $this->getRemark(),
            'ChooseSubPayment' => $this->getChooseSubPayment(),
            'NeedExtraPaidInfo' => $this->getNeedExtraPaidInfo(),
            'DeviceSource' => $this->getDeviceSource(),
            'IgnorePayment' => $this->getIgnorePayment(),
            'PlatformID' => $this->getPlatformID(),
            'InvoiceMark' => $this->getInvoiceMark(),
            'Items' => $items,
            'StoreID' => $this->getStoreID(),
            'CustomField1' => $this->getCustomField1(),
            'CustomField2' => $this->getCustomField2(),
            'CustomField3' => $this->getCustomField3(),
            'CustomField4' => $this->getCustomField4(),
            'HoldTradeAMT' => $this->getHoldTradeAMT(),
        ];
    }

    /**
     * @param array $data
     * @return PurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    /**
     * @return array
     * @throws InvalidRequestException
     */
    private function getECPayItems()
    {
        $items = $this->getItems();
        $currency = $this->getCurrency() ?: '元';

        if (! $items) {
            return [[
                'Name' => $this->getDescription(),
                'Price' => $this->getAmount(),
                'Currency' => $currency,
                'Quantity' => 1,
            ]];
        }

        return array_map(static function ($item) use ($currency) {
            return [
                'Name' => $item->getName(),
                'Price' => (int) $item->getPrice(),
                'Currency' => $currency,
                'Quantity' => (int) $item->getQuantity(),
            ];
        }, $items->all());
    }
}
