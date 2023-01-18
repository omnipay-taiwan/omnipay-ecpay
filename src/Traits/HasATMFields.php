<?php

namespace Omnipay\ECPay\Traits;

trait HasATMFields
{
    /**
     * 允許繳費有效天數.
     *
     * 若需設定最長 60 天，最短 1 天。未設定此參數則預設為 3 天
     * 注意事項:
     * 以天為單位
     *
     * @param  int  $value
     * @return $this
     */
    public function setExpireDate($value)
    {
        return $this->setParameter('ExpireDate', $value);
    }

    /**
     * @return int|null
     */
    public function getExpireDate()
    {
        return $this->getParameter('ExpireDate') ?: 3;
    }
}
