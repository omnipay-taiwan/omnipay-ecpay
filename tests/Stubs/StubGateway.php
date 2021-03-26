<?php

namespace Omnipay\ECPay\Tests\Stubs;

use Omnipay\Common\Message\RequestInterface;
use Omnipay\ECPay\Gateway;

class StubGateway extends Gateway
{
    /**
     * @param array $options
     * @return RequestInterface
     */
    public function fetchTransaction(array $options = [])
    {
        return $this->createRequest(StubFetchTransactionRequest::class, $options);
    }
}
