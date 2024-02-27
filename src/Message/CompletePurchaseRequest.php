<?php

namespace Omnipay\ECPay\Message;

use Ecpay\Sdk\Response\VerifiedArrayResponse;
use Exception;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ECPay\Traits\HasDefaults;
use Omnipay\ECPay\Traits\HasECPay;

class CompletePurchaseRequest extends AbstractRequest
{
    use HasDefaults;
    use HasECPay;

    /**
     * @return array
     *
     * @throws InvalidResponseException
     */
    public function getData()
    {
        return $this->checkMacValue($this->httpRequest->request->all());
    }

    /**
     * @param  array  $data
     * @return CompletePurchaseResponse
     *
     * @throws InvalidResponseException
     */
    public function sendData($data)
    {
        try {
            $this->factory($this, VerifiedArrayResponse::class)->get($data);
        } catch (Exception $e) {
            throw new InvalidResponseException($e->getMessage(), $e->getCode(), $e);
        }

        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * @param  array  $data
     * @return array
     *
     * @throws InvalidResponseException
     */
    private function checkMacValue($data)
    {
        try {
            $this->factory($this, VerifiedArrayResponse::class)->get($data);
        } catch (Exception $e) {
            throw new InvalidResponseException($e->getMessage(), $e->getCode(), $e);
        }

        return $data;
    }
}
