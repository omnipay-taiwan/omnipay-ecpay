<?php

namespace Omnipay\ECPay\Tests\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\ECPay\Message\AcceptNotificationRequest;
use Omnipay\Tests\TestCase;

class AcceptNotificationRequestTest extends TestCase
{
    /**
     * @throws InvalidRequestException
     */
    public function testGetData()
    {
        $options = [
            'CustomField1' => '',
            'CustomField2' => '',
            'CustomField3' => '',
            'CustomField4' => '',
            'MerchantID' => '2000132',
            'MerchantTradeNo' => '2821567410556',
            'PaymentDate' => '2019/09/02 15:49:58',
            'PaymentType' => 'Credit_CreditCard',
            'PaymentTypeChargeFee' => '1',
            'RtnCode' => '1',
            'RtnMsg' => 'Succeeded',
            'SimulatePaid' => '0',
            'StoreID' => '',
            'TradeAmt' => '4250',
            'TradeDate' => '2019/09/02 15:49:16',
            'TradeNo' => '1909021549160081',
            'CheckMacValue' => 'E7EC8DDC6C5C51B1A4D8BEA261246066858B38184C55FD3DD3D6DFF53F535A64',
        ];

        $request = new AcceptNotificationRequest($this->getHttpClient(), $this->getHttpRequest());
        $request->initialize(array_merge([
            'HashKey' => '5294y06JbISpM5x9',
            'HashIV' => 'v77hoKGq4kWxNNIS',
            'EncryptType' => '1',
            'MerchantID' => '2000132',
        ], $options));
        $request->setTestMode(true);

        self::assertEquals($options, $request->getData());

        return [$request->send(), $options];
    }

    /**
     * @depends testGetData
     * @param $result
     */
    public function testSendData($result)
    {
        list($response, $options) = $result;

        self::assertTrue($response->isSuccessful());
        self::assertEquals('1|OK', $response->getMessage());
        self::assertEquals($options['RtnCode'], $response->getCode());
        self::assertEquals($options['TradeNo'], $response->getTransactionReference());
        self::assertEquals($options['MerchantTradeNo'], $response->getTransactionId());
    }
}
