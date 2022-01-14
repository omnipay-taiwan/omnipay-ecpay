<?php

namespace Omnipay\ECPay\Traits;

use Ecpay\Sdk\Exceptions\RtnException;
use Ecpay\Sdk\Factories\Factory;

trait HasECPay
{
    private $globalBackup = [];

    /**
     * @throws RtnException
     */
    protected function factory($request, $class)
    {
        $factory = new Factory([
            'hashKey' => $request->getHashKey(),
            'hashIv' => $request->getHashIV(),
        ]);

        return $factory->create($class);
    }
}
