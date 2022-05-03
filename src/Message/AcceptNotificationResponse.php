<?php

namespace Omnipay\ECPay\Message;

use Omnipay\Common\Message\NotificationInterface;

class AcceptNotificationResponse extends CompletePurchaseResponse implements NotificationInterface
{
    public function getTransactionStatus()
    {
        return $this->isSuccessful() ? self::STATUS_COMPLETED : self::STATUS_FAILED;
    }

    public function getReply()
    {
        return '1|OK';
    }
}
