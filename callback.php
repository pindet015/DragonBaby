<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Coreproc\Dragonpay\Transaction\RestTransaction;
use Coreproc\Dragonpay\Configurations\DragonpaySetup;
use Coreproc\Dragonpay\Configurations\PaymentStatusCodes;

$dp = new DragonpaySetup();
$setUp = $dp->getSetup();
$txn = new RestTransaction(null, true);
$baseUri = $txn->baseUri;
$json = $dp->get_json_instance();

if( isset($_SERVER['HTTP_REFERER']) && strpos($baseUri, $_SERVER['HTTP_REFERER']) > 0){
	$params = array_merge($_GET, $setUp);
	
	if($txn->isValid($params)){
		$code = $txn->inquire($params);
		$code = (new PaymentStatusCodes())->decode_status($code);
		$obj = $json->get_by_transactionID($params['transactionId']);
		if($obj !== null){
			$obj['status'] = $code;
			$obj['referenceNumber'] = $params['referenceNumber'];
			$obj['ps_status'] = $params['status'];
			$obj['message'] = $params['message'];
		}
		echo "<p>Transaction ID: {$params['transactionId']}</p>";
		echo "<p>Transaction Status: $code</p>";
	}else{
		http_response_code(400);
	}
}else{
	http_response_code(404);
}