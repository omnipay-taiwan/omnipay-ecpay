<?php

namespace Omnipay\ECPay\Traits;

/**
 * 當 ChoosePayment 參數為使用 ALL 或 CVS 或 BARCODE 付款方式時:.
 */
trait HasCVSOrBARCODEFields
{
    /**
     * 超商繳費截止時間.
     *
     * 注意事項: CVS:以分鐘為單位
     * BARCODE:以天為單位 若未設定此參數，
     * CVS 預設為 10080 分 鐘(7 天);BARCODE 預設為 7 天。
     * 若需設定此參數，請於建立訂單時將此參數送給綠界。
     * 提醒您，CVS 帶入數值不可超過 86400 分鐘，超過時一律以 86400 分鐘計(60 天)
     * 例:08/01 的 20:15 分購買商品，繳費期限為 7 天，表示 8/08 的 20:15 分前您必須前往超商繳費。
     *
     * @param int $value
     * @return $this
     */
    public function setStoreExpireDate($value)
    {
        return $this->setParameter('StoreExpireDate', $value);
    }

    /**
     * @return int
     */
    public function getStoreExpireDate()
    {
        return $this->getParameter('StoreExpireDate');
    }

    /**
     * 交易描述 1.
     *
     * 若繳費超商為family(全家)或ibon(7-11) 時，會顯示在超商繳費平台螢幕上
     *
     * @param string $value
     * @return $this
     */
    public function setDesc_1($value)
    {
        return $this->setParameter('Desc_1', $value);
    }

    /**
     * @return string|null
     */
    public function getDesc_1()
    {
        return $this->getParameter('Desc_1');
    }

    /**
     * 交易描述 2.
     *
     * 若繳費超商為family(全家)或ibon(7-11) 時，會顯示在超商繳費平台螢幕上
     *
     * @param string $value
     * @return $this
     */
    public function setDesc_2($value)
    {
        return $this->setParameter('Desc_2', $value);
    }

    /**
     * @return string|null
     */
    public function getDesc_2()
    {
        return $this->getParameter('Desc_2');
    }

    /**
     * 交易描述 3.
     *
     * 若繳費超商為family(全家)或ibon(7-11) 時，會顯示在超商繳費平台螢幕上
     *
     * @param string $value
     * @return $this
     */
    public function setDesc_3($value)
    {
        return $this->setParameter('Desc_3', $value);
    }

    /**
     * @return string|null
     */
    public function getDesc_3()
    {
        return $this->getParameter('Desc_3');
    }

    /**
     * 交易描述 4.
     *
     * 若繳費超商為family(全家)或ibon(7-11) 時，會顯示在超商繳費平台螢幕上
     *
     * @param string $value
     * @return $this
     */
    public function setDesc_4($value)
    {
        return $this->setParameter('Desc_4', $value);
    }

    /**
     * @return string|null
     */
    public function getDesc_4()
    {
        return $this->getParameter('Desc_4');
    }
}
