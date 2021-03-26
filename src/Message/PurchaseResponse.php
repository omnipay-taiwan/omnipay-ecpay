<?php

namespace Omnipay\ECPay\Message;

class PurchaseResponse extends AbstractResponse
{
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
     */
    public function getRedirectData()
    {
        $ecPay = $this->createECPay();
        $ecPay->ServiceURL = $this->getRedirectUrl();

        return static::htmlToArray($ecPay->CheckoutString());
    }

    /**
     * @param string $html
     * @return array
     */
    private static function htmlToArray($html)
    {
        preg_match_all('/<input[^>]*>/i', $html, $matches);

        if (! $matches) {
            return [];
        }

        $data = [];
        foreach ($matches[0] as $input) {
            preg_match_all('/\s*([^=]+)=\"([^\"]*)\"*/', $input, $m);
            list($type, $name, $value) = $m[2];
            if ($type !== 'submit') {
                $data[$name] = $value;
            }
        }

        return $data;
    }
}
