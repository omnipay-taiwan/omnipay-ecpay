<?php

namespace Omnipay\ECPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\ECPay\Message\AcceptNotificationRequest;
use Omnipay\ECPay\Message\CompletePurchaseRequest;
use Omnipay\ECPay\Message\FetchTransactionRequest;
use Omnipay\ECPay\Message\PurchaseRequest;
use Omnipay\ECPay\Message\RefundRequest;
use Omnipay\ECPay\Message\VoidRequest;
use Omnipay\ECPay\Traits\HasDefaults;

/**
 * Skeleton Gateway.
 *
 * @method RequestInterface authorize(array $options = [])
 * @method RequestInterface completeAuthorize(array $options = [])
 * @method RequestInterface capture(array $options = [])
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
            'HashKey' => '5294y06JbISpM5x9', //測試用Hashkey，請自行帶入ECPay提供的HashKey
            'HashIV' => 'v77hoKGq4kWxNNIS', //測試用HashIV，請自行帶入ECPay提供的HashIV
            'MerchantID' => '2000132', //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            'EncryptType' => '1', //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            'testMode' => false,
        ];
    }

    /**
     * @return RequestInterface
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function completePurchase(array $options = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

    /**
     * @return RequestInterface|NotificationInterface
     */
    public function acceptNotification(array $options = [])
    {
        return $this->createRequest(AcceptNotificationRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function fetchTransaction(array $options = [])
    {
        return $this->createRequest(FetchTransactionRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function refund(array $options = [])
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    public function void(array $options = [])
    {
        return $this->createRequest(VoidRequest::class, $options);
    }
}
