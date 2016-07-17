<?php

namespace Coreproc\Dragonpay\Configurations;

use Coreproc\Dragonpay\Transaction\JsonTransaction;

define('TESTING_BASE_URI', 'http://test.dragonpay.ph');
define('PRODUCTION_BASE_URI', 'https://gw.dragonpay.ph');
define('BASE_URI', '/home/babydrag/public_html/');

class DragonpaySetup{
	
	protected $_setUp = array();
	
	public function __construct($setUp = null){
		if($setUp != null){
			$this->_setUp = $setUp;
		}else{
			$this->_setUp = array(
			'merchantId'		=> 'JPTEST',
			'merchantPassword'	=> 'vDxrPyw',
			'logging'			=> true,
			'logDirectory'		=> 'dragonpay-logs',
			'testing'			=> true
			);
		}
	}
	
	public function getSetup(){
		return $this->_setUp;
	}
	
	public function get_json_settings(){
		return array('filename'=>'database.json', 'dir'=>BASE_URI);
	}
	
	public function get_json_instance(){
		$settings = $this->get_json_settings();
		return new JsonTransaction($settings['filename'], $settings['dir']);
	}
	
}

class PaymentStatusCodes{
	
	protected $_status_codes = array(
							'S'=>'Success',
							'F'=>'Failure',
							'P'=>'Pending',
							'U'=>'Unknown',
							'R'=>'Refund',
							'L'=>'Chargeback',
							'V'=>'Void',
							'A'=>'Authorized');
	
	public function decode_status($status_code){
		if( array_key_exists($status_code, $this->_status_codes) ){
			return $this->_status_codes[$status_code];
		}else{
			return $this->unknown();
		}
	}
	
	public function unknown(){
		return $this->_status_codes['U'];
	}
	
}

class TransactionStatusCodes{
	
}

class CurrencyCodes{
	protected $_currency_codes = array(
							'PHP'=>'Philippine Peso',
							'USD'=>'US Dollar',
							'CAD'=>'Canadian Dollar');
							
	public function get_currency_name($code){
		if( array_key_exists($code, $this->_currency_codes) ){
			return $this->_currency_codes[$code];
		}else{ 
			// return default currency (PHP)
			return $this->_currency_codes['PHP'];
		}
	}
	
	public function get_supported_currencies(){
		return $this->_currency_codes;
	}
	
}
