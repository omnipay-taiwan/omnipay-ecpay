<?php

namespace Omnipay\ECPay\Tests\Message;

use Omnipay\Common\CreditCard;
use Omnipay\ECPay\Message\PurchaseRequest;
use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    /**
     * @var PurchaseRequest
     */
    private $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            [
                'amount' => '10.00',
                'currency' => 'USD',
                'card' => $this->getValidCard(),
            ]
        );
    }

    public function testGetData()
    {
        $card = new CreditCard($this->getValidCard());
        $card->setStartMonth(1);
        $card->setStartYear(2000);

        $this->request->setCard($card);
        $this->request->setTransactionId('abc123');

        $data = $this->request->getData();

        self::assertSame('abc123', $data['transaction_id']);

        self::assertSame($card->getExpiryDate('mY'), $data['expire_date']);
        self::assertSame('012000', $data['start_date']);
    }
}
