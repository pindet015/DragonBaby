<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Coreproc\Dragonpay\DragonpayApi;
use Coreproc\Dragonpay\Configurations\DragonpaySetup;

if( isset($_GET['pay']) ){ // check if merchantID is present in the form, and button is pressed

	$dp = new DragonpaySetup();

	$json = $dp->get_json_instance();

	$txnid = $_GET['txnid'];
	$amount = $_GET['amount'];
	number_format($amont,2);
	$ccy = $_GET['ccy'];
	$description = $_GET['description'];
	$email = $_GET['email'];
	
	$setUp = $dp->getSetup();
	
	$client = new DragonpayApi($setUp);
		
	$params = [
		'transactionId' => $txnid,
		'amount'        => $amount,
		'currency'      => $ccy,
		'description'   => $description,
		'email'         => $email,
	];
	
	$json->save_by_transaction($params);
	
	// if you just want the URL
	$url = $client->getUrl($params);
	header("Location: $url");
}
else{
	die('Not allowed!');
}
