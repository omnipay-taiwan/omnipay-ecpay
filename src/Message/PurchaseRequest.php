<?php

namespace Omnipay\ECPay\Message;

use ECPay_InvoiceState;
use ECPay_PaymentMethod;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ECPay\Traits\HasATMFields;
use Omnipay\ECPay\Traits\HasATMOrCVSOrBARCODEFields;
use Omnipay\ECPay\Traits\HasCreditFields;
use Omnipay\ECPay\Traits\HasCustomFields;
use Omnipay\ECPay\Traits\HasCVSOrBARCODEFields;
use Omnipay\ECPay\Traits\HasDefaults;
use Omnipay\ECPay\Traits\HasInvoiceFields;
use Omnipay\ECPay\Traits\HasMerchantTradeNo;
use Omnipay\ECPay\Traits\HasSendFields;
use Omnipay\ECPay\Traits\HasStoreID;

/**
 * Purchase Request.
 */
class PurchaseRequest extends AbstractRequest
{
    use HasDefaults;
    use HasMerchantTradeNo;
    use HasStoreID;
    use HasSendFields;
    use HasCustomFields;
    use HasInvoiceFields;
    use HasCreditFields;
    use HasATMFields;
    use HasCVSOrBARCODEFields;
    use HasATMOrCVSOrBARCODEFields;

    protected $liveEndpoint = 'https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5';
    protected $testEndpoint = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

    /**
     * @return string
     */
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

        $items = $this->prepareItems();
        $amount = array_reduce($items, static function ($sum, $item) {
            return $sum + ($item['Price'] * $item['Quantity']);
        }, 0);

        $sendFields = [
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

        return array_merge($sendFields, $this->getSendExtend($sendFields));
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
    private function prepareItems()
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

    /**
     * @param array $sendFields
     * @return array
     */
    private function getSendExtend($sendFields)
    {
        return static::filterValues([
            'SendExtend' => array_merge(
                $this->getCreditFields($sendFields['ChoosePayment']),
                $this->getATMFields($sendFields['ChoosePayment']),
                $this->getCvsFields($sendFields['ChoosePayment']),
                $this->getInvoiceFields($sendFields['InvoiceMark'])
            ),
        ]);
    }

    /**
     * @param string $choosePayment
     * @return array
     */
    private function getCreditFields($choosePayment)
    {
        return in_array($choosePayment, [
            ECPay_PaymentMethod::ALL,
            ECPay_PaymentMethod::Credit,
        ], true) ? static::filterValues([
            'CreditInstallment' => $this->getCreditInstallment(),
            'InstallmentAmount' => $this->getInstallmentAmount(),
            'Redeem' => $this->getRedeem(),
            'UnionPay' => $this->getUnionPay(),
            'Language' => $this->getLanguage(),
            'BindingCard' => $this->getBindingCard(),
            'MerchantMemberID' => $this->getMerchantMemberID(),
            'PeriodAmount' => $this->getPeriodAmount(),
            'PeriodType' => $this->getPeriodType(),
            'Frequency' => $this->getFrequency(),
            'ExecTimes' => $this->getExecTimes(),
            'PeriodReturnURL' => $this->getPeriodReturnURL(),
        ]) : [];
    }

    /**
     * @param string $choosePayment
     * @return array
     */
    private function getATMFields($choosePayment)
    {
        return in_array($choosePayment, [
            ECPay_PaymentMethod::ALL,
            ECPay_PaymentMethod::ATM,
        ], true) ? static::filterValues([
            'ExpireDate' => $this->getExpireDate(),
            'PaymentInfoURL' => $this->getPaymentInfoURL(),
            'ClientRedirectURL' => $this->getClientRedirectURL(),
        ]) : [];
    }

    /**
     * @param string $choosePayment
     * @return array
     */
    private function getCvsFields($choosePayment)
    {
        return in_array($choosePayment, [
            ECPay_PaymentMethod::ALL,
            ECPay_PaymentMethod::CVS,
            ECPay_PaymentMethod::BARCODE,
        ], true) ? static::filterValues([
            'Desc_1' => $this->getDesc_1(),
            'Desc_2' => $this->getDesc_2(),
            'Desc_3' => $this->getDesc_3(),
            'Desc_4' => $this->getDesc_4(),
            'PaymentInfoURL' => $this->getPaymentInfoURL(),
            'ClientRedirectURL' => $this->getClientRedirectURL(),
            'StoreExpireDate' => $this->getStoreExpireDate(),
        ]) : [];
    }

    /**
     * @param string $invoiceMark
     * @return array
     */
    private function getInvoiceFields($invoiceMark)
    {
        return $invoiceMark === ECPay_InvoiceState::Yes ? static::filterValues([
            'RelateNumber' => $this->getRelateNumber(),
            'CustomerIdentifier' => $this->getCustomerIdentifier(),
            'CarruerType' => $this->getCarruerType(),
            'CustomerID' => $this->getCustomerID(),
            'Donation' => $this->getDonation(),
            'Print' => $this->getPrint(),
            'TaxType' => $this->getTaxType(),
            'CustomerName' => $this->getCustomerName(),
            'CustomerAddr' => $this->getCustomerAddr(),
            'CustomerPhone' => $this->getCustomerPhone(),
            'CustomerEmail' => $this->getCustomerEmail(),
            'ClearanceMark' => $this->getClearanceMark(),
            'CarruerNum' => $this->getCarruerNum(),
            'LoveCode' => $this->getLoveCode(),
            'InvoiceRemark' => $this->getInvoiceRemark(),
            'DelayDay' => $this->getDelayDay(),
            'InvoiceItemName' => $this->getInvoiceItemName(),
            'InvoiceItemCount' => $this->getInvoiceItemCount(),
            'InvoiceItemWord' => $this->getInvoiceItemWord(),
            'InvoiceItemPrice' => $this->getInvoiceItemPrice(),
            'InvoiceItemTaxType' => $this->getInvoiceItemTaxType(),
            'InvType' => $this->getInvType(),
        ]) : [];
    }

    private static function filterValues($values)
    {
        return array_filter($values, static function ($value) {
            return ! empty($value);
        });
    }
}
