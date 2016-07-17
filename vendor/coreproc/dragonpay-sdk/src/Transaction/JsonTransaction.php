<?php

namespace Coreproc\Dragonpay\Transaction;

class JsonException extends \Exception{
	
}

class JsonTransaction extends Json{
	
	private $_json = null;
	
	public function __construct($filename, $directory){
		parent::__construct($filename, $directory);
	}
	
	public function get_by_transactionID($transactionID){
		$arr = $this->get_object();
		foreach($arr->transactions as $txn){
			if($txn->transactionId == $transactionID){
				return $txn;
			}
		}
		return null;
	}
	
	public function save_by_transaction($params){
		$arr = $this->get_object();
		$old_array = $arr->transactions;
		$new_array = [];
		$exists = false;
		foreach($old_array as $txn){
			if($txn->transactionId == $params->transactionId){
				$new_array[] = $params;
				$exists = true;
			}else{
				$new_array[] = $txn;
			}
		}
		if( ! $exists){
			$new_array[] = $params;
		}
		$arr->transactions = $new_array;
		$this->save_object($arr);
	}
	
	public function get(){
		if($this->_json === null){
			$this->_json = file_get_contents($this->_fullPath);
		}
		return $this->_json;
	}
	
	public function get_object(){
		$json = $this->get();
		return json_decode($json);
	}
	
	public function save($json){
		file_put_contents($this->_fullPath, $json);
	}
	
	public function save_object($arr){
		$json = json_encode($arr);
		$this->save($json);
	}
}

class Json{
	protected $_filename = 'database.json';
	protected $_directory = __DIR__;
	protected $_fullPath = null;
	
	public function __construct($filename, $directory){
		$this->create_directory($directory);
		if($filename === null){
			$this->create_file($this->_filename);
		}else{
			$this->create_file($filename);
		}
	}
	
	public function create_directory($dir){
		$success = true;
		if( ! file_exists($dir) ){
			$success = mkdir($dir);
		}elseif( ! is_writable($dir) ){
			throw new JsonException('Json Directory is not writable!');
		}
		if($success){
			$this->_directory = $dir;
		}
	}
	
	public function create_file($filename){
		$fullPath = join(DIRECTORY_SEPARATOR, array($this->_directory, $filename));
		if( ! file_exists($fullPath) ){
			touch($fullPath);
		}elseif( ! is_writable($fullPath) ){
			throw new JsonException('Json File is not writable!');
		}
		$this->_fullPath = $fullPath;
	}
	
}
