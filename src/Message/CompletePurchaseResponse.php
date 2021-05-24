<?php

namespace Omnipay\ECPay\Message;

use Exception;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\ECPay\Traits\HasECPay;

class CompletePurchaseResponse extends AbstractResponse implements NotificationInterface
{
    use HasECPay;

    public function isSuccessful()
    {
        return $this->valid() && $this->getCode() === '1';
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

    protected function checkoutFeedback()
    {
        $this->createECPay($this->request)->CheckOutFeedback();

        return true;
    }

    /**
     * @return bool
     */
    private function valid()
    {
        try {
            return $this->checkoutFeedback();
        } catch (Exception $e) {
            return false;
        }
    }
}
