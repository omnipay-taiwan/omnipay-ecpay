<?php

namespace Omnipay\ECPay;

use Omnipay\Common\AbstractGateway;

/**
 * Skeleton Gateway
 */
class SkeletonGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Skeleton';
    }

    public function getDefaultParameters()
    {
        return [
            'key' => '',
            'testMode' => false,
        ];
    }

    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    /**
     * @return Message\AuthorizeRequest
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\ECPay\Message\AuthorizeRequest', $parameters);
    }
}
