<?php

namespace Omnipay\ECPay;

class Autoload
{
    public static function register()
    {
        spl_autoload_register(__CLASS__.'::find', false);
    }

    public static function find($name)
    {
        if (stripos($name, 'ECPay') === 0) {
            include __DIR__.'/../lib/ECPayAIO_PHP/AioSDK/sdk/ECPay.Payment.Integration.php';
            include __DIR__.'/../lib/ECPayAIO_PHP/ApplePaySDK/sdk/ECPay.Payment.Applepay.php';
            // include __DIR__.'/../lib/ECPayAIO_PHP/EInvoiceSDK/sdk/Ecpay_Invoice.php';
            // include __DIR__.'/../lib/ECPayAIO_PHP/PayLogisticSDK/sdk/ECPay.Logistics.Integration.php';
            spl_autoload_unregister(__CLASS__.'::find');
        }
    }
}

Autoload::register();
