<?php

namespace Omnipay\ECPay\Traits;

/**
 * 分期付款:此收款方式消費者只需刷一次卡做信用卡授權，後續分期金額由銀行端執行確認。下列為分期付款參數，若您需使用此功能，以下參數必須傳送給綠界:.
 */
trait HasCreditFields
{
    /**
     * 語系設定.
     *
     * 預設語系為中文，若要變更語系參數值請帶:
     * ENG:英語
     * KOR:韓語
     * JPN:日語
     * CHI:簡體中文
     *
     * @param  string  $value
     * @return $this
     */
    public function setLanguage($value)
    {
        return $this->setParameter('Language', $value);
    }

    /**
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->getParameter('Language');
    }

    /**
     * 刷卡分期期數。
     *
     * 提供刷卡分期期數信用卡分期可用參數為:3,6,12,18,24
     * 注意事項: 使用的期數必須先透過申請開通後方能使用，並以申請開通的期數為主。
     *
     * @param  string  $value
     * @return $this
     */
    public function setCreditInstallment($value)
    {
        return $this->setParameter('CreditInstallment', $value);
    }

    /**
     * @return string|null
     */
    public function getCreditInstallment()
    {
        return $this->getParameter('CreditInstallment');
    }

    /**
     * 每次授權金額.
     *
     * 每次要授權(扣款)的金額。
     * 注意事項: 綠界會依此次授權金額[PeriodAmount]所設定的金額做為之後固定授權的金額。
     * 交易金額[TotalAmount]設定金額必須和 授權金額[PeriodAmount]相同。
     * 請帶整數，不可有小數點。僅限新台幣。
     *
     * @param  int  $value
     * @return $this
     */
    public function setPeriodAmount($value)
    {
        return $this->setParameter('PeriodAmount', $value);
    }

    /**
     * @return int|null
     */
    public function getPeriodAmount()
    {
        return $this->getParameter('PeriodAmount');
    }

    /**
     * 週期種類.
     *
     * 可設定以下參數:
     * D:以天為週期
     * M:以月為週期
     * Y:以年為週期
     *
     * @param  stirng  $value
     * @return $this
     */
    public function setPeriodType($value)
    {
        return $this->setParameter('PeriodType', $value);
    }

    /**
     * @return string|null
     */
    public function getPeriodType()
    {
        return $this->getParameter('PeriodType');
    }

    /**
     * 執行頻率.
     *
     * 此參數用來定義多久要執行一次 注意事項:
     * 至少要大於等於 1 次以上。
     * 當 PeriodType 設為 D 時，最多可設 365 次。
     * 當 PeriodType 設為 M 時，最多可設 12 次。
     * 當 PeriodType 設為 Y 時，最多可設 1 次
     *
     * @param  int  $value
     * @return $this
     */
    public function setFrequency($value)
    {
        return $this->setParameter('Frequency', $value);
    }

    /**
     * @return int|null
     */
    public function getFrequency()
    {
        return $this->getParameter('Frequency');
    }

    /**
     * 執行次數.
     *
     * 總共要執行幾次。
     * 注意事項:
     * 至少要大於 1 次以上。
     * 當 PeriodType 設為 D 時，最多可設 999 次。
     * 當 PeriodType 設為 M 時，最多可設 99 次。
     * 當 PeriodType 設為 Y 時，最多可設 9 次。
     *
     * @param  int  $value
     * @return $this
     */
    public function setExecTimes($value)
    {
        return $this->setParameter('ExecTimes', $value);
    }

    /**
     * @return int|null
     */
    public function getExecTimes()
    {
        return $this->getParameter('ExecTimes');
    }

    /**
     * 定期定額的執行結果回應 URL.
     *
     * @param  string  $value
     * @return $this
     */
    public function setPeriodReturnURL($value)
    {
        return $this->setParameter('PeriodReturnURL', $value);
    }

    /**
     * @return string|null
     */
    public function getPeriodReturnURL()
    {
        return $this->getParameter('PeriodReturnURL');
    }

    /**
     * 記憶卡號
     *
     * 使用記憶信用卡
     * 使用: 請傳 1
     * 不使用:請傳 0
     *
     * @param  int  $value
     * @return $this
     */
    public function setBindingCard($value)
    {
        return $this->setParameter('BindingCard', $value);
    }

    /**
     * @return int|null
     */
    public function getBindingCard()
    {
        return $this->getParameter('BindingCard');
    }

    /**
     * 記憶卡號識別碼
     *
     * @param  string  $value
     * @return $this
     */
    public function setMerchantMemberID($value)
    {
        return $this->setParameter('MerchantMemberID', $value);
    }

    /**
     * @return string|null
     */
    public function getMerchantMemberID()
    {
        return $this->getParameter('MerchantMemberID');
    }

    /**
     * 信用卡是否使用紅利折抵。
     *
     * 設為 Y 時，當綠界特店選擇信用卡付款時，會進入紅利折抵的交易流程。
     * 注意事項: 紅利折抵請參考信用卡紅利折抵辦法
     *
     * @param  string  $value
     * @return $this
     */
    public function setRedeem($value)
    {
        return $this->setParameter('Redeem', $value);
    }

    /**
     * @return string|false
     */
    public function getRedeem()
    {
        return $this->getParameter('Redeem') ?: false;
    }

    /**
     * 銀聯卡交易選項.
     *
     * 可帶入以下選項:
     * 0: 消費者於交易頁面可選擇是否使用 銀聯交易。
     * 1: 只使用銀聯卡交易，且綠界會將交 易頁面直接導到銀聯網站。
     * 2: 不可使用銀聯卡，綠界會將交易頁 面隱藏銀聯選項。
     * 注意事項:
     * 1.若需使用銀聯卡服務，請與綠界提出申請方可使用，測試環境未提供銀聯卡服務。
     * 2.不支援信用卡分期付款及定期定額。
     * 3.不支援信用卡紅利折抵
     * 4.不支援信用卡記憶卡號功能
     *
     * @param  int  $value
     * @return $this
     */
    public function setUnionPay($value)
    {
        return $this->setParameter('UnionPay', $value);
    }

    /**
     * @return int|null
     */
    public function getUnionPay()
    {
        return $this->getParameter('UnionPay') ?: false;
    }

    public function setInstallmentAmount($value)
    {
        return $this->setParameter('InstallmentAmount', $value);
    }

    public function getInstallmentAmount()
    {
        return $this->getParameter('InstallmentAmount') ?: 0;
    }
}
