<?php

namespace Omnipay\ECPay;

use Omnipay\Common\Item as BaseItem;

class Item extends BaseItem
{
    public function getCurrency()
    {
        return $this->getParameter('currency') ?: 'TWD';
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getUrl()
    {
        return $this->getParameter('url');
    }

    public function setUrl($value)
    {
        return $this->setParameter('url', $value);
    }

    public function __toString()
    {
        return sprintf(
            '#%s %d %s x %u',
            $this->getName(),
            $this->getPrice(),
            $this->getCurrency(),
            $this->getQuantity()
        );
    }
}
