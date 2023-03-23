<?php

namespace Omnipay\ECPay\Tests\Stubs;

use Omnipay\Common\Message\RequestInterface;
use Omnipay\ECPay\Gateway;

class StubGateway extends Gateway
{
    /**
     * @return RequestInterface
     */
    public function fetchTransaction(array $options = [])
    {
        return $this->createRequest(StubFetchTransactionRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function refund(array $options = [])
    {
        return $this->createRequest(StubRefundRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function void(array $options = [])
    {
        return $this->createRequest(StubVoidRequest::class, $options);
    }
}
