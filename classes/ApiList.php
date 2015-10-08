<?php
/**
 *  This class calls the list API and returns names of products.
 */
class ApiList{
	public static $name = 'list';		//Append $name at the end of API URL
	private $_products = array();		//Array to store product names
	private $_errors = array();			//Array to store errors

	public function __construct(){

		//Store json_decode array in api1
		$api1 = ConfigURL::getURL(ApiList::$name);
		
		//Check if products are received, if true, store them in $_products, else get the error received from ConfigURL class
		if (isset($api1['products'])) {
			$this->_products = $api1['products'];
		}
		else{
			$this->_errors = ConfigURL::errors();
		}
	}

	//Get only the product keys
	public function getProdName(){
		return array_keys($this->_products);
	}

	//Get errors
	public function getErrors(){
		return $this->_errors;
	}		
}