<?php

namespace Omnipay\ECPay\Message;

use Exception;

class AcceptNotificationResponse extends CompletePurchaseResponse
{
    /**
     * Response Message.
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        try {
            $this->checkoutFeedback();

            return '1|OK';
        } catch (Exception $e) {
            return '0|'.$e->getMessage();
        }
    }
}
