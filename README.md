# Omnipay: ECPay

**ECPay (綠界科技) gateway for the Omnipay PHP payment processing library**

[![Latest Version on Packagist](https://img.shields.io/packagist/v/omnipay-taiwan/omnipay-ecpay.svg?style=flat-square)](https://packagist.org/packages/omnipay-taiwan/omnipay-ecpay)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/omnipay-taiwan/omnipay-ecpay/master.svg?style=flat-square)](https://travis-ci.org/omnipay-taiwan/omnipay-ecpay)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/omnipay-taiwan/omnipay-ecpay.svg?style=flat-square)](https://scrutinizer-ci.com/g/omnipay-taiwan/omnipay-ecpay/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/omnipay-taiwan/omnipay-ecpay.svg?style=flat-square)](https://scrutinizer-ci.com/g/omnipay-taiwan/omnipay-ecpay)
[![Total Downloads](https://img.shields.io/packagist/dt/omnipay-taiwan/omnipay-ecpay.svg?style=flat-square)](https://packagist.org/packages/omnipay-taiwan/omnipay-ecpay)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment processing library for
PHP 5.3+. This package implements [ECPay](https://www.ecpay.com.tw/) (綠界科技) support for Omnipay.

ECPay's own SDK ([`ecpay/sdk`](https://packagist.org/packages/ecpay/sdk)) is used under the hood for request signing,
checksum verification and URL encoding, wrapped to expose Omnipay's standard `Gateway` / `RequestInterface` /
`ResponseInterface` contracts. Supported payment methods (via `ChoosePayment`) are credit card (including
installments, recurring/period payments and card binding), ATM, convenience store code / barcode, and BNPL (無卡分期,
consumer credit installment without a card). Electronic invoice fields are also supported when invoicing is enabled.

## Install

Install the gateway using require. Require the `league/omnipay` base package and this gateway.

``` bash
$ composer require league/omnipay omnipay-taiwan/omnipay-ecpay
```

## Usage

The following gateways are provided by this package:

* ecpay

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

### Purchase

```php
$gateway = Omnipay::create('ECPay');
$gateway->initialize([
    'MerchantID' => 'your-merchant-id',
    'HashKey' => 'your-hash-key',
    'HashIV' => 'your-hash-iv',
    'testMode' => true,
]);

$response = $gateway->purchase([
    'transactionId' => 'order-number',
    'amount' => '1000',
    'currency' => 'TWD',
    'description' => 'order description',
    'returnUrl' => 'https://example.com/return',
    'notifyUrl' => 'https://example.com/notify',
    'ChoosePayment' => 'Credit', // or ATM, CVS, BARCODE, BNPL, ALL
])->send();

if ($response->isRedirect()) {
    $response->redirect();
}
```

### Complete purchase / accept notification

ECPay sends a server-to-server notification once payment completes. Its `CheckMacValue` signature is verified before
the notification is trusted, and an `InvalidRequestException` is thrown if the signature does not match:

```php
$response = $gateway->acceptNotification()->send();

if ($response->isSuccessful()) {
    // mark order as paid
}

echo $response->getReply(); // '1|OK', required by ECPay
```

### Refund and void

```php
$gateway->refund([
    'transactionId' => 'order-number',
    'transactionReference' => 'ecpay-trade-no',
    'amount' => '1000',
])->send();

$gateway->void([
    'transactionId' => 'order-number',
    'transactionReference' => 'ecpay-trade-no',
    'amount' => '1000',
])->send();
```

### Fetch transaction

```php
$gateway->fetchTransaction([
    'transactionId' => 'order-number',
])->send();
```

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project, or ask more detailed
questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which you can subscribe to.

If you believe you have found a bug, please report it using
the [GitHub issue tracker](https://github.com/omnipay-taiwan/omnipay-ecpay/issues), or better yet, fork the library and
submit a pull request.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email recca0120@gmail.com instead of using the issue tracker.

## Credits

- [recca0120](https://github.com/recca0120)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
