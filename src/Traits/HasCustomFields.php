<?php

namespace Omnipay\ECPay\Traits;

trait HasCustomFields
{
    /**
     * 自訂名稱欄位 1.
     *
     * 提供合作廠商使用記錄用客製化使用欄位
     * 注意事項: 特殊符號只支援,.#()$[];%{}:/?&@<>!
     *
     * @param  string  $value
     * @return $this
     */
    public function setCustomField1($value)
    {
        return $this->setParameter('CustomField1', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomField1()
    {
        return $this->getParameter('CustomField1');
    }

    /**
     * 自訂名稱欄位 2.
     *
     * 提供合作廠商使用記錄用客製化使用欄位
     * 注意事項: 特殊符號只支援,.#()$[];%{}:/?&@<>!
     *
     * @param  string  $value
     * @return $this
     */
    public function setCustomField2($value)
    {
        return $this->setParameter('CustomField2', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomField2()
    {
        return $this->getParameter('CustomField2');
    }

    /**
     * 自訂名稱欄位 3.
     *
     * 提供合作廠商使用記錄用客製化使用欄位
     * 注意事項: 特殊符號只支援,.#()$[];%{}:/?&@<>!
     *
     * @param  string  $value
     * @return $this
     */
    public function setCustomField3($value)
    {
        return $this->setParameter('CustomField3', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomField3()
    {
        return $this->getParameter('CustomField3');
    }

    /**
     * 自訂名稱欄位 4.
     *
     * 提供合作廠商使用記錄用客製化使用欄位
     * 注意事項: 特殊符號只支援,.#()$[];%{}:/?&@<>!
     *
     * @param  string  $value
     * @return $this
     */
    public function setCustomField4($value)
    {
        return $this->setParameter('CustomField4', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomField4()
    {
        return $this->getParameter('CustomField4');
    }
}
