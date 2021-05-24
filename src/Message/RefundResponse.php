<?php

namespace Omnipay\ECPay\Message;

class RefundResponse extends AbstractResponse
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
