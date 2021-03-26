<?php

    // 更新門市通知(統一超商C2C)
    require('Ecpay.Logistic.Integration.php');

    try {
        // 收到綠界科技的更新門市通知，並判斷檢查碼是否相符
        $AL = new EcpayLogistics();
        $AL->HashKey = 'XBERn1YOvpM9nfZc';
        $AL->HashIV = 'h1ONHk4P4yqbl5LK';
        $AL->CheckOutFeedback($_POST);

        // 以更新門市通知進行相對應的處理
        /** 
        回傳的綠界科技的更新門市通知如下:
        Array
        (
            [AllPayLogisticsID] =>
            [CheckMacValue] =>
            [GoodsAmount] =>
            [GoodsName] =>
            [MerchantID] =>
            [Status] =>
            [StoreID] =>
            [StoreType] =>
        )
        */

        // 在網頁端回應 1|OK
        echo '1|OK';
    } catch(Exception $e) {
        echo '0|' . $e->getMessage();
    }