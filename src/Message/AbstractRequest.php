<?php

namespace Omnipay\ECPay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\ECPay\Traits\HasDefaults;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    use HasDefaults;

    protected $liveEndpoint = 'https://api.example.com';
    protected $testEndpoint = 'https://api-test.example.com';


    public function sendData($data)
    {
        $url = $this->getEndpoint().'?'.http_build_query($data, '', '&');
        $response = $this->httpClient->request('GET', $url);

        $data = json_decode($response->getBody(), true);

        return $this->createResponse($data);
    }

    protected function getBaseData()
    {
        return [
            'transaction_id' => $this->getTransactionId(),
            'expire_date' => $this->getCard()->getExpiryDate('mY'),
            'start_date' => $this->getCard()->getStartDate('mY'),
        ];
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }
}
