<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Coreproc\Dragonpay\DragonpayApi;
use Coreproc\Dragonpay\Transaction\RestTransaction;
use Coreproc\Dragonpay\Configurations\DragonpaySetup;
use Coreproc\Dragonpay\Configurations\PaymentStatusCodes;

$dp = new DragonpaySetup();

$json = $dp->get_json_instance();

if( isset($_POST['check']) ){
	
	$setUp = $dp->getSetup();
	$params = array('transactionId'=>$_POST['transactionId'], 'merchantId'=>$setUp['merchantId'], 'merchantPassword' => $setUp['merchantPassword']);
	$client = new DragonpayApi($setUp);
	$transaction = new RestTransaction(null, true);
	$status = $transaction->inquire($params);
	
	$txn = $json->get_by_transactionID($_POST['transactionId']);
	
	$code = (new PaymentStatusCodes())->decode_status($status);
	
	if($txn !== null){
		$txn->status = $code;
		$json->save_by_transaction($txn);
	}
	
	echo "<p>Transaction ID: {$params['transactionId']}</p>";
	echo "<p>Transaction Status: $code</p>";
	
}elseif( isset($_POST['cancel']) ){
	
	$setUp = $dp->getSetup();
	$params = array('transactionId'=>$_POST['transactionId'], 'merchantId'=>$setUp['merchantId'], 'merchantPassword' => $setUp['merchantPassword']);
	$client = new DragonpayApi($setUp);
	$transaction = new RestTransaction(null, true);
	$status = $transaction->cancel($params);
	
}
