<?php

namespace Omnipay\ECPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\ECPay\Message\PurchaseRequest;
use Omnipay\ECPay\Traits\HasDefaults;

/**
 * Skeleton Gateway.
 * @method NotificationInterface acceptNotification(array $options = [])
 * @method RequestInterface authorize(array $options = [])
 * @method RequestInterface completeAuthorize(array $options = [])
 * @method RequestInterface capture(array $options = [])
 * @method RequestInterface completePurchase(array $options = [])
 * @method RequestInterface refund(array $options = [])
 * @method RequestInterface fetchTransaction(array $options = [])
 * @method RequestInterface void(array $options = [])
 * @method RequestInterface createCard(array $options = [])
 * @method RequestInterface updateCard(array $options = [])
 * @method RequestInterface deleteCard(array $options = [])
 */
class Gateway extends AbstractGateway
{
    use HasDefaults;

    public function getName()
    {
        return 'ECPay';
    }

    public function getDefaultParameters()
    {
        return [
            'ServiceURL' => 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5',  //服務位置
            'HashKey' => '5294y06JbISpM5x9', //測試用Hashkey，請自行帶入ECPay提供的HashKey
            'HashIV' => 'v77hoKGq4kWxNNIS', //測試用HashIV，請自行帶入ECPay提供的HashIV
            'MerchantID' => '2000132', //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            'EncryptType' => '1', //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            'testMode' => false,
        ];
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }
}
