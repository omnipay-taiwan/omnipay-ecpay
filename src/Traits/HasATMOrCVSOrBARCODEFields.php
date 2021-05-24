<?php

namespace Omnipay\ECPay\Traits;

trait HasATMOrCVSOrBARCODEFields
{
    /**
     * Server 端回傳付款相關資訊.
     *
     * 若有設定此參數，訂單建立完成後(非 付款完成)，綠界會 Server 端背景回傳消費者付款方式相關資訊(例:繳費代碼與繳費超商)。
     * 請參考[ATM、CVS 或 BARCODE 的取號 結果通知.]
     * 注意事項: 頁面將會停留在綠界，顯示繳費的相關 資訊。回傳只有三段號碼，並不會回傳條碼圖，需自行轉換成 code39 的三段條碼。
     *
     * @param string $value
     * @return $this
     */
    public function setPaymentInfoURL($value)
    {
        return $this->setParameter('PaymentInfoURL', $value);
    }

    /**
     * @return string|null
     */
    public function getPaymentInfoURL()
    {
        return $this->getParameter('PaymentInfoURL');
    }

    /**
     * Client 端回傳付款方式.
     *
     * 若有設定此參數，訂單建立完成後(非付款完成)，綠界會從 Client 端回傳消費者付款方式相關資訊(例:繳費代碼 與繳費超商)且將頁面轉到特店指定的 頁面。
     * 請參考[ATM、CVS 或 BARCODE 的取號 結果通知.]
     * 注意事項: 若設定此參數，將會使設定的返回特店 的按鈕連結[ClientBackURL]失效。
     *
     * 若導回網址未使用 https 時，部份瀏覽 器可能會出現警告訊息。回傳只有三段號碼，並不會回傳條碼圖，需自行轉換成 code39 的三段條碼。
     *
     * @param string $value
     * @return $this
     */
    public function setClientRedirectURL($value)
    {
        return $this->setParameter('ClientRedirectURL', $value);
    }

    /**
     * @return string|null
     */
    public function getClientRedirectURL()
    {
        return $this->getParameter('ClientRedirectURL');
    }
}
