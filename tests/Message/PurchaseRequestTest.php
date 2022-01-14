<?php

namespace Omnipay\ECPay\Tests\Message;

use Omnipay\Common\Item;
use Omnipay\ECPay\Message\PurchaseRequest;
use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    public function testGetData()
    {
        $returnUrl = 'https://foo.bar/return_url';
        $notifyUrl = 'https://foo.bar/notify_url';
        $options = [
            'ReturnURL' => $notifyUrl,
            'ClientBackURL' => 'https://foo.bar/client_back_url',
            'OrderResultURL' => $returnUrl,
            'MerchantTradeNo' => 'Test'.time(),
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'PaymentType' => 'aio',
            'TotalAmount' => 2000,
            'TradeDesc' => 'good to drink',
            'ChoosePayment' => 'Credit',
            'Remark' => 'remark',
            'NeedExtraPaidInfo' => 'N',
            'DeviceSource' => 'Desktop',
            'Items' => [[
                'Name' => '歐付寶黑芝麻豆漿',
                'Price' => 2000,
                'Quantity' => 1,
                'Currency' => '元',
            ]],
            'CustomField1' => 'custom_field_1',
            'CustomField2' => 'custom_field_2',
            'CustomField3' => 'custom_field_3',
            'CustomField4' => 'custom_field_4',
            'HoldTradeAMT' => 1,
        ];

        $request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $request->initialize(array_merge([
            'HashKey' => '5294y06JbISpM5x9',
            'HashIV' => 'v77hoKGq4kWxNNIS',
            'MerchantID' => '2000132',
            'EncryptType' => '1',
        ], $options));
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

        self::assertArrayNotHasKey('__paymentButton', $redirectData);
        self::assertFalse($response->isSuccessful());
        self::assertTrue($response->isRedirect());
        self::assertEquals('POST', $response->getRedirectMethod());
        self::assertEquals('https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5', $response->getRedirectUrl());
        self::assertNotEmpty($redirectData['CheckMacValue']);
    }
}
