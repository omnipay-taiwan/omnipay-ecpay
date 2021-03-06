<?php

namespace Omnipay\ECPay\Message;

class VoidOrRefundResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return (string) $this->getCode() === '1';
    }
}
