<?php

namespace Omnipay\ECPay\Tests\Message;

use ECPay_ExtraPaymentInfo;
use ECPay_InvoiceState;
use ECPay_PaymentMethod;
use ECPay_PaymentMethodItem;
use Omnipay\Common\Item;
use Omnipay\ECPay\Message\PurchaseRequest;
use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    public function testGetData()
    {
        $returnUrl = 'https://foo.bar/return_url';
        $notifyUrl = 'https://foo.bar/notify_url';
        $request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $options = [
            'HashKey' => '5294y06JbISpM5x9', //測試用Hashkey，請自行帶入ECPay提供的HashKey
            'HashIV' => 'v77hoKGq4kWxNNIS', //測試用HashIV，請自行帶入ECPay提供的HashIV
            'MerchantID' => '2000132', //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            'EncryptType' => '1', //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            'ReturnURL' => $notifyUrl,
            'ClientBackURL' => 'https://foo.bar/client_back_url',
            'OrderResultURL' => $returnUrl,
            'MerchantTradeNo' => 'Test'.time(),
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'PaymentType' => 'aio',
            'TotalAmount' => 2000,
            'TradeDesc' => 'good to drink',
            'ChoosePayment' => ECPay_PaymentMethod::Credit,
            'Remark' => 'remark',
            'ChooseSubPayment' => ECPay_PaymentMethodItem::None,
            'NeedExtraPaidInfo' => ECPay_ExtraPaymentInfo::No,
            'DeviceSource' => 'Desktop',
            'IgnorePayment' => 'ignore_payment',
            'PlatformID' => uniqid('platform_id', true),
            'InvoiceMark' => ECPay_InvoiceState::No,
            'Items' => [[
                'Name' => '歐付寶黑芝麻豆漿',
                'Price' => 2000,
                'Quantity' => 1,
                'Currency' => '元',
            ]],
            'StoreID' => uniqid('store_id', true),
            'CustomField1' => 'custom_field_1',
            'CustomField2' => 'custom_field_2',
            'CustomField3' => 'custom_field_3',
            'CustomField4' => 'custom_field_4',
            'HoldTradeAMT' => 1,
        ];

        $request->initialize($options);
        $request->setTestMode(true);
        $request->setReturnUrl($returnUrl);
        $request->setNotifyUrl($notifyUrl);
        $request->setItems(array_map(static function ($item) {
            return new Item($item);
        }, $options['Items']));

        self::assertEquals($options, $request->getData());

        return [$request->send(), $options];
    }

    /**
     * @depends testGetData
     * @param array $results
     */
    public function testSendData($results)
    {
        list($response) = $results;

        $redirectData = $response->getRedirectData();

        self::assertFalse($response->isSuccessful());
        self::assertTrue($response->isRedirect());
        self::assertEquals('POST', $response->getRedirectMethod());
        self::assertEquals('https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5', $response->getRedirectUrl());
        self::assertNotEmpty('EB947B8C27DBF00C0129C83E9E5C6', $redirectData['CheckMacValue']);
    }
}
