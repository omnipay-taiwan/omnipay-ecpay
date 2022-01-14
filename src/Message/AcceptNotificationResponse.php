<?php

namespace Omnipay\ECPay\Message;

class AcceptNotificationResponse extends CompletePurchaseResponse
{
    /**
     * Response Message.
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return '1|OK';
    }
}
