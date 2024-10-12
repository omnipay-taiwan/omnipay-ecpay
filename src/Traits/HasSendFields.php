<?php

namespace Omnipay\ECPay\Traits;

trait HasSendFields
{
    use HasPlatformId;
    use HasTotalAmount;

    /**
     * 特店交易時間
     * 格式為: yyyy/MM/dd HH:mm:ss.
     *
     * @param  string  $value
     * @return $this
     */
    public function setMerchantTradeDate($value)
    {
        return $this->setParameter('MerchantTradeDate', $value);
    }

    /**
     * @return string
     */
    public function getMerchantTradeDate()
    {
        return $this->getParameter('MerchantTradeDate') ?: date('Y/m/d H:i:s');
    }

    /**
     * 交易類型.
     *
     * 請固定填入 aio
     *
     * @param  string  $value
     * @return $this
     */
    public function setPaymentType($value)
    {
        return $this->setParameter('PaymentType', $value);
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->getParameter('PaymentType');
    }

    /**
     * 交易描述.
     *
     * @param  string  $value
     * @return $this
     */
    public function setTradeDesc($value)
    {
        return $this->setDescription($value);
    }

    /**
     * @return string
     */
    public function getTradeDesc()
    {
        return $this->getDescription();
    }

    /**
     * 選擇預設 付款方式
     * 綠界提供下列付款方式，請於建立訂單 時傳送過來:
     * Credit:信用卡及銀聯卡(需申請開通)
     * WebATM:網路 ATM
     * ATM:自動櫃員機
     * CVS:超商代碼
     * BARCODE:超商條碼 ALL:不指定付款方式，由綠界顯示付款 方式選擇頁面。
     * 注意事項: 1.若為手機版時不支援下列付款方式: WebATM:網路 ATM 2.如需要不透過綠界畫面取得 ATM、 CVS、BARCODE 的繳費代碼，請參考 FAQ。
     *
     * @param  string  $value
     * @return $this
     */
    public function setChoosePayment($value)
    {
        return $this->setPaymentMethod($value);
    }

    /**
     * @return string
     */
    public function getChoosePayment()
    {
        return $this->getPaymentMethod();
    }

    /**
     * Client 端返回特店的按鈕連結.
     *
     * @param  string  $value
     * @return $this
     */
    public function setClientBackURL($value)
    {
        return $this->setParameter('ClientBackURL', $value);
    }

    /**
     * @return string
     */
    public function getClientBackURL()
    {
        return $this->getParameter('ClientBackURL');
    }

    /**
     * 備註欄位.
     *
     * @param  string  $value
     * @return $this
     */
    public function setRemark($value)
    {
        return $this->setParameter('Remark', $value);
    }

    /**
     * @return string
     */
    public function getRemark()
    {
        return $this->getParameter('Remark');
    }

    /**
     * 付款子項目.
     *
     * 若設定此參數，建立訂單將轉導至綠界訂單成立頁，
     * 依設定的付款方式及付款子項目帶入訂單，無法選擇其他付款子項目。
     * 請參考付款方式一覽表
     *
     * @param  string  $value
     * @return $this
     */
    public function setChooseSubPayment($value)
    {
        return $this->setParameter('ChooseSubPayment', $value);
    }

    /**
     * @return string
     */
    public function getChooseSubPayment()
    {
        return $this->getParameter('ChooseSubPayment');
    }

    /**
     * Client 端回傳付款結果網址
     *
     * @param  string  $value
     * @return $this
     */
    public function setOrderResultURL($value)
    {
        return $this->setParameter('OrderResultURL', $value);
    }

    /**
     * @return string
     */
    public function getOrderResultURL()
    {
        return $this->getParameter('OrderResultURL');
    }

    /**
     * 是否需要額外的付款資訊.
     *
     * 額外的付款資訊:
     * 若不回傳額外的付款資訊時，參數值請傳:N;
     * 若要回傳額外的付款資訊時，參數值請傳:Y，
     * 付款完成後綠界會以 Server POST 方式回傳額外付款資訊。
     * 注意事項: 回傳額外付款資訊參數請參考-額外回傳的參數
     *
     * @param  string  $value
     * @return $this
     */
    public function setNeedExtraPaidInfo($value)
    {
        return $this->setParameter('NeedExtraPaidInfo', $value);
    }

    /**
     * @return string
     */
    public function getNeedExtraPaidInfo()
    {
        return $this->getParameter('NeedExtraPaidInfo') ?: 'N';
    }

    /**
     * 裝置來源.
     *
     * 請帶空值，由系統自動判定。
     *
     * @param  string  $value
     * @return $this
     */
    public function setDeviceSource($value)
    {
        return $this->setParameter('DeviceSource', $value);
    }

    /**
     * @return string
     */
    public function getDeviceSource()
    {
        return $this->getParameter('DeviceSource');
    }

    /**
     * 隱藏付款方式.
     *
     * 當付款方式[ChoosePayment]為 ALL 時，可隱藏不需要的付款方式，多筆請以井號分隔(#)。
     * 可用的參數值:
     * Credit:信用卡
     * WebATM:網路 ATM
     * ATM:自動櫃員機
     * CVS:超商代碼
     * BARCODE:超商條碼
     *
     * @param  string  $value
     * @return $this
     */
    public function setIgnorePayment($value)
    {
        return $this->setParameter('IgnorePayment', $value);
    }

    /**
     * @return string
     */
    public function getIgnorePayment()
    {
        return $this->getParameter('IgnorePayment');
    }

    /**
     * 電子發票開立註記.
     *
     * 此參數為付款完成後同時開立電子發票。若要使用時，該參數須設定為「Y」，同時還要設定「電子發票介接相關參數」
     * 注意事項: 正式環境欲使用電子發票功能，須與綠界申請開通，若未開通請致電客服中心 (02) 2655-1775。
     *
     * @param  string  $value
     * @return $this
     */
    public function setInvoiceMark($value)
    {
        return $this->setParameter('InvoiceMark', $value);
    }

    /**
     * @return string
     */
    public function getInvoiceMark()
    {
        return $this->getParameter('InvoiceMark');
    }

    /**
     * @param  int  $value
     * @return $this
     */
    public function setHoldTradeAMT($value)
    {
        return $this->setParameter('HoldTradeAMT', $value);
    }

    /**
     * @return int
     */
    public function getHoldTradeAMT()
    {
        return $this->getParameter('HoldTradeAMT') ?: 0;
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setItemName($value)
    {
        return $this->setParameter('ItemName', $value);
    }

    /**
     * @return string
     */
    public function getItemName()
    {
        return $this->getParameter('ItemName');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setItemURL($value)
    {
        return $this->setParameter('ItemURL', $value);
    }

    /**
     * @return string
     */
    public function getItemURL()
    {
        return $this->getParameter('ItemURL');
    }
}
