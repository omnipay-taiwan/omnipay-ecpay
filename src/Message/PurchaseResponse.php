<?php

namespace Omnipay\ECPay\Message;

use Exception;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\ECPay\Traits\HasECPay;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    use HasECPay;

    /**
     * Is the response successful?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * Does the response require a redirect?
     *
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->request->getEndpoint();
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array
     *
     * @throws InvalidRequestException
     */
    public function getRedirectData()
    {
        try {
            return static::htmlToArray(
                $this->factory($this->request, 'AutoSubmitFormWithCmvService')
                    ->generate($this->request->getData(), $this->getRedirectUrl())
            );
        } catch (Exception $e) {
            throw new InvalidRequestException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param  string  $html
     * @return array
     */
    private static function htmlToArray($html)
    {
        preg_match_all('/<input(?!type="submit")[^>]*>/i', $html, $matches);

        return ! $matches ? [] : array_reduce($matches[0], static function ($data, $input) {
            preg_match_all('/\s*([^=]+)=\"([^\"]*)\"*/', $input, $m);
            if ($m[2][0] !== 'submit') {
                $data[$m[2][1]] = $m[2][2];
            }

            return $data;
        }, []);
    }
}
