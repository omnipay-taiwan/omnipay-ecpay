<?php

namespace Omnipay\ECPay\Message;

use Omnipay\Common\Message\NotificationInterface;

class AcceptNotificationRequest extends CompletePurchaseRequest implements NotificationInterface
{
    /**
     * @param array $data
     * @return AcceptNotificationResponse
     */
    public function sendData($data)
    {
        return $this->response = new AcceptNotificationResponse($this, $data);
    }

    public function getTransactionStatus()
    {
        return $this->getNotificationResponse()->getTransactionStatus();
    }

    public function getMessage()
    {
        return $this->getNotificationResponse()->getMessage();
    }

    public function getReply()
    {
        return $this->getNotificationResponse()->getReply();
    }

    /**
     * @return AcceptNotificationResponse
     */
    private function getNotificationResponse()
    {
        return ! $this->response ? $this->send() : $this->response;
    }
}
