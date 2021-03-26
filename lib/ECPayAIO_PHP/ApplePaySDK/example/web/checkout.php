<html>
<head>
<?php

/*
* step0 產生apple pay 按鈕
*/
include_once('config.php') ;
include_once('ECPay.Payment.Applepay.php') ;
$ecpay_applepay = new Ecpay_ApplePay ;

$ecpay_applepay->Applepay_Button['merchantIdentifier'] 	= APPLEPAY_MERCHANT_IDENTIFIER;
$ecpay_applepay->Applepay_Button['lable'] 		= APPLEPAY_LABLE;
$ecpay_applepay->Applepay_Button['step1_url'] 		= STEP1_URL;
$ecpay_applepay->Applepay_Button['step2_url'] 		= STEP2_URL;
$ecpay_applepay->Applepay_Button['debug_mode'] 		= DEBUG_MODE;


$ecpay_applepay->Applepay_Button['order_id'] 		= date('YmdHis');		// 廠商訂單編號
$ecpay_applepay->Applepay_Button['amount'] 		= '5'; 				// 訂單總金額

$ecpay_applepay->applepay_button();

?>

</head>
<body>

<div id="divPay">
<button id="btnApplePay" class="apple-pay-button apple-pay-button-white" lang="tw" style="-webkit-appearance: -apple-pay-button; -apple-pay-button-type: buy; width: 400px; height: 64px;"></button>
</div>


</body>

</html>
