<?php

namespace Omnipay\ECPay\Message;

class CompletePurchaseResponse extends AbstractResponse
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
}
