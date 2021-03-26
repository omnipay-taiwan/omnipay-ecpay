<?php


$sLog_Path 	= __DIR__.'/response.log' ; // LOG路徑
$sLog = '+++++++++++++++++++++++++++++++++++++++++++++++++++ start' . date('Y-m-d H:i:s') . ' ++++++++++++++++++++++++++++++++++++++++++++++++++++++++' . "\n";

$fp=fopen($sLog_Path, "a+");
fputs($fp, $sLog);
fclose($fp);

try
{
	include_once('Ecpay_Invoice.php') ;
	$ecpayInvoice = new EcpayInvoice ;

	$merchantInfo = [
		'hashKey' => 'ejCk326UnaZWKisg',
		'hashIv' => 'q9jcZX8Ib9LM8wYk',
	];

	$response = $ecpayInvoice->allowanceByCollegiateResponse($merchantInfo, $_POST);

	// log
	$sLog = print_r($response, true) .  "\n";
	$fp=fopen($sLog_Path, "a+");
	fputs($fp, $sLog);
	fclose($fp);

	echo '1|OK' ;

}
catch (Exception $e)
{
	// 例外錯誤處理。
	$sMsg = $e->getMessage();

	// log
	$sLog = print_r($sMsg, true) .  "\n";
	$fp=fopen($sLog_Path, "a+");
	fputs($fp, $sLog);
	fclose($fp);
}