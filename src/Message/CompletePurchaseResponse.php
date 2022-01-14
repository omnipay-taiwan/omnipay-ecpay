<?php

namespace Omnipay\ECPay\Message;

use Omnipay\Common\Message\NotificationInterface;

class CompletePurchaseResponse extends AbstractResponse implements NotificationInterface
{
    public function isSuccessful()
    {
        return $this->getCode() === '1';
    }

    /**
     * Response Message.
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->data['RtnMsg'];
    }

    public function getTransactionStatus()
    {
        return $this->isSuccessful() ? self::STATUS_COMPLETED : self::STATUS_FAILED;
    }
}
