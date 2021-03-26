<?php

namespace Omnipay\ECPay\Message;
/**
 * Authorize Request
 *
 * @method Response send()
 */
class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount', 'card');
        $this->getCard()->validate();
        $data = $this->getBaseData();

        return $data;
    }
}
