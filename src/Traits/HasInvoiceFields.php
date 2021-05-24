<?php

namespace Omnipay\ECPay\Traits;

/**
 * 當InvoiceMark參數為Y付款完成後開立電子發票時帶入下列參數:.
 */
trait HasInvoiceFields
{
    /**
     * 特店自訂編號
     *
     * @param string $value
     * @return $this
     */
    public function setRelateNumber($value)
    {
        return $this->setParameter('RelateNumber', $value);
    }

    /**
     * @return string|null
     */
    public function getRelateNumber()
    {
        return $this->getParameter('RelateNumber');
    }

    /**
     * 客戶編號
     *
     * @param string $value
     * @return $this
     */
    public function setCustomerID($value)
    {
        return $this->setParameter('CustomerID', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomerID()
    {
        return $this->getParameter('CustomerID');
    }

    /**
     * 統一編號
     *
     * @param string $value
     * @return $this
     */
    public function setCustomerIdentifier($value)
    {
        return $this->setParameter('CustomerIdentifier', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomerIdentifier()
    {
        return $this->getParameter('CustomerIdentifier');
    }

    /**
     * 客戶名稱.
     *
     * @param string $value
     * @return $this
     */
    public function setCustomerName($value)
    {
        return $this->setParameter('CustomerName', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomerName()
    {
        return $this->getParameter('CustomerName');
    }

    /**
     * 客戶地址
     *
     * @param string $value
     * @return $this
     */
    public function setCustomerAddr($value)
    {
        return $this->setParameter('CustomerAddr', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomerAddr()
    {
        return $this->getParameter('CustomerAddr');
    }

    /**
     * 通關方式.
     *
     * 當課稅類別[TaxType]為2(零稅率)時，則該參數請帶1(非經海關出口)或2(經海關出口)。
     *
     * @param string $value
     * @return $this
     */
    public function setCustomerPhone($value)
    {
        return $this->setParameter('CustomerPhone', $value);
    }

    /**
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->getParameter('CustomerPhone');
    }

    /**
     * 客戶電子信箱.
     *
     * @param string $value
     * @return $this
     */
    public function setCustomerEmail($value)
    {
        return $this->setParameter('CustomerEmail', $value);
    }

    /**
     * @return string|null
     */
    public function getCustomerEmail()
    {
        return $this->getParameter('CustomerEmail');
    }

    /**
     * 通關方式.
     *
     * 當課稅類別[TaxType]為2(零稅率)時，則該參數請帶1(非經海關出口)或2(經海關出口)。
     *
     * @param string $value
     * @return $this
     */
    public function setClearanceMark($value)
    {
        return $this->setParameter('ClearanceMark', $value);
    }

    /**
     * @return string
     */
    public function getClearanceMark()
    {
        return $this->getParameter('ClearanceMark');
    }

    /**
     * 課稅類別.
     *
     * 若為應稅，請帶 1。
     * 若為零稅率，請帶 2。
     * 若為免稅，請帶 3。
     * 若為混合應稅與免稅或零稅率時(限收銀機發票無法分辨時使用，且需通過申請核可)，則請帶 9。
     *
     * @param string $value
     * @return $this
     */
    public function setTaxType($value)
    {
        return $this->setParameter('TaxType', $value);
    }

    /**
     * @return string|null
     */
    public function getTaxType()
    {
        return $this->getParameter('TaxType');
    }

    /**
     * 載具類別.
     *
     * 若為無載具時，則請帶空字串。
     * 若為特店載具時，則請帶 1。
     * 若為買受人之自然人憑證號碼時，則請帶 2。
     * 若為買受人之手機條碼資料時，則請帶 3。
     * 若統一編號[CustomerIdentifier]有值時，則載具類別不可為特店載具或自然人憑證載具。
     * 注意事項:當[Print]有值時，載具類別不得有值。
     *
     * @param string $value
     * @return $this
     */
    public function setCarruerType($value)
    {
        return $this->setParameter('CarruerType', $value);
    }

    /**
     * @return string|null
     */
    public function getCarruerType()
    {
        return $this->getParameter('CarruerType');
    }

    /**
     * 載具編號
     *
     *  1. 當載具類別[CarruerType]=""(無載具)，請帶空字串。
     * 2. 當載具類別[CarruerType]="1"(綠界 科技電子發票載具)時，請帶空字串，系統會自動帶入值，為合作特店載具統一編號+自訂編號(RelateNumber)。
     * 3. 當載具類別[CarruerType]="2"(買受 人之自然人憑證)時，則請帶固定長度為 16 且格式為 2 碼大寫英文字母加上 14 碼數字。
     * 4. 當載具類別[CarruerType]="3"(買受 人之手機條碼)時，則請帶固定長度為 8 且格式為 1 碼斜線「/」加上由 7 碼數字及大寫英文字母及+-.符號組成。
     * 注意事項:
     * 1. 若手機條碼中有加號，可能在介接驗證時發生錯誤，請將加號改為空白字元，產生驗證碼。
     * 2. 英文、數字、符號僅接受半形字
     * 3. 若載具編號為手機條碼載具時，請 先呼叫 B2C 電子發票介接技術文件手機條碼載驗證 API 進行檢核
     *
     * @param string $value
     * @return $this
     */
    public function setCarruerNum($value)
    {
        return $this->setParameter('CarruerNum', $value);
    }

    /**
     * @return string
     */
    public function getCarruerNum()
    {
        return $this->getParameter('CarruerNum');
    }

    /**
     * 捐贈註記.
     *
     * 若為捐贈時，參數請帶:1。若為不捐贈或統一編號[CustomerIdentifier]有值時，參數請帶:0。
     *
     * @param string $value
     * @return $this
     */
    public function setDonation($value)
    {
        return $this->setParameter('Donation', $value);
    }

    /**
     * @return string|null
     */
    public function getDonation()
    {
        return $this->getParameter('Donation');
    }

    /**
     * 捐贈碼
     *
     * 消費者選擇捐贈發票則於此欄位須填入受贈單位之捐贈碼。
     * 1. 若捐贈註記[Donation]= '1' (捐贈)時，此欄位須有值。
     * 2. 捐贈碼以阿拉伯數字為限，最少三碼，最多七碼。內容定位採「文字格式」，首位可以為零。
     *
     * @param string $value
     * @return $this
     */
    public function setLoveCode($value)
    {
        return $this->setParameter('LoveCode', $value);
    }

    /**
     * @return string|null
     */
    public function getLoveCode()
    {
        return $this->getParameter('LoveCode');
    }

    /**
     * 列印註記.
     *
     * 若為不列印或捐贈註記[Donation]為1(捐贈)時，請帶:0。
     * 若為列印或統一編號[CustomerIdentifier]有值時，請帶:1。
     *
     * @param string $value
     * @return $this
     */
    public function setPrint($value)
    {
        return $this->setParameter('Print', $value);
    }

    /**
     * @return string|null
     */
    public function getPrint()
    {
        return $this->getParameter('Print');
    }

    /**
     * 商品名稱.
     *
     * 預設不可為空字串且格式為名稱 1 | 名稱 2 | 名稱 3 | ... | 名稱 n，當含有 二筆或以上的商品名稱時，則以「|」符號區隔。
     * 將參數值以 UrlEncode 方式編碼。
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceItemName($value)
    {
        return $this->setParameter('InvoiceItemName', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceItemName()
    {
        return $this->getParameter('InvoiceItemName');
    }

    /**
     * 商品數量.
     *
     * 預設不可為空字串且格式為數量 1 | 數量 2 | 數量 3 | ... | 數量 n，當含有 二筆或以上的商品名稱時，則以「|」符號區隔。
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceItemCount($value)
    {
        return $this->setParameter('InvoiceItemCount', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceItemCount()
    {
        return $this->getParameter('InvoiceItemCount');
    }

    /**
     * 商品單位.
     *
     * 商品單位若超過二筆以上請以「|」符號區隔單位最大長度為 6 碼。
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceItemWord($value)
    {
        return $this->setParameter('InvoiceItemWord', $value);
    }

    /**
     * @return string
     */
    public function getInvoiceItemWord()
    {
        return $this->getParameter('InvoiceItemWord');
    }

    /**
     * 商品價格
     *
     * 預設不可為空字串且格式為價格 1 | 價格 2 | 價格 3 | ... | 價格 n，當含有 二筆或以上的商品價格時，則以「|」符號區隔。
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceItemPrice($value)
    {
        return $this->setParameter('InvoiceItemPrice', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceItemPrice()
    {
        return $this->getParameter('InvoiceItemPrice');
    }

    /**
     * 商品課稅別.
     *
     * 1:應稅
     * 2:零稅率
     * 3:免稅
     * 注意事項:
     * 1. 預設為空字串，當課稅類別 [TaxType] = 9 時，此欄位不可為空。
     * 2. 格式為課稅類別 1 | 課稅類別 2 | 課稅類別3|...| 課稅類別n。當含 有二筆或以上的商品課稅類別時，則以「|」符號區隔。
     * 3. 課稅類別為混合稅率時，需含二筆 或以上的商品課稅別 [InvoiceItemTaxType]，且至少需有一筆商品課稅別為應稅及至少需有一筆商品課稅別為免稅或零稅率，
     * 即混稅發票只能 1.應稅+免稅 2.應稅+零稅率，免稅和零稅率發票不能同時開立。
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceItemTaxType($value)
    {
        return $this->setParameter('InvoiceItemTaxType', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceItemTaxType()
    {
        return $this->getParameter('InvoiceItemTaxType');
    }

    /**
     * 備註.
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceRemark($value)
    {
        return $this->setParameter('InvoiceRemark', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceRemark()
    {
        return $this->getParameter('InvoiceRemark');
    }

    /**
     * 延遲天數.
     *
     * 本參數值請帶 0~15(天)，
     * 當天數為 0 時，則付款完成後立即開立發票。
     *
     * @param int $value
     * @return $this
     */
    public function setDelayDay($value)
    {
        return $this->setParameter('DelayDay', $value);
    }

    /**
     * @return int|null
     */
    public function getDelayDay()
    {
        return $this->getParameter('DelayDay');
    }

    /**
     * 字軌類別.
     *
     * 若為一般稅額時，請帶07。 預設值:07
     *
     * @param string $value
     * @return $this
     */
    public function setInvType($value)
    {
        return $this->setParameter('InvType', $value);
    }

    /**
     * @return string
     */
    public function getInvType()
    {
        return $this->getParameter('InvType');
    }
}
