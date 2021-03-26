<?php

    // 物流狀態通知
    require('Ecpay.Logistic.Integration.php');

    try {
        // 收到綠界科技的物流狀態，並判斷檢查碼是否相符
        $AL = new EcpayLogistics();
        $AL->HashKey = 'XBERn1YOvpM9nfZc';
        $AL->HashIV = 'h1ONHk4P4yqbl5LK';
        $AL->CheckOutFeedback($_POST);

        // 以物流狀態進行相對應的處理
        /** 
        回傳的綠界科技的物流狀態如下:
        Array
        (
            [AllPayLogisticsID] =>
            [BookingNote] =>
            [CheckMacValue] =>
            [CVSPaymentNo] =>
            [CVSValidationNo] =>
            [GoodsAmount] =>
            [LogisticsSubType] =>
            [LogisticsType] =>
            [MerchantID] =>
            [MerchantTradeNo] =>
            [ReceiverAddress] =>
            [ReceiverCellPhone] =>
            [ReceiverEmail] =>
            [ReceiverName] =>
            [ReceiverPhone] =>
            [RtnCode] =>
            [RtnMsg] =>
            [UpdateStatusDate] =>
        )
        */

        // 在網頁端回應 1|OK
        echo '1|OK';
    } catch(Exception $e) {
        echo '0|' . $e->getMessage();
    }