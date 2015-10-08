<?php
/**
 *  This class calls the info API along with the list API and returns product info for each available product.
 */
class ApiInfo{
	public static $name = 'info';		//Append $name at the end of API URL
	private $_productInfo = array();	//Array to store product information
	private $_errors = array();			//Array to store errors

	public function __construct(ApiList $list){

		//Loop through each product name
		foreach ($list->getProdName() as $prodName) {

			$getInfoData = ConfigURL::getURL(ApiInfo::$name, $prodName);
			
			//Check for any errors and store them in $_errors array
			if(isset($getInfoData['error'])){
				$this->_errors[$prodName] = $getInfoData['error'];
				continue;
			}
			//Initialize $data array
			$data = array();

			//Loop through the product info and store it in the data array.
			//In the case of suppliers, call the sanitize escape function.
			foreach ($getInfoData as $prodKey) {
				
				foreach ($prodKey as $name => $value) {

					switch ($name) {
						case 'suppliers':
							$data[$name] = escape(implode(', ', $value));
							break;
						
						default:
							$data[$name] = $value;
							break;
					}
				}
			}
			//Store all the data in $_productInfo
			$this->_productInfo[$prodName] = $data;
		}
	}	

	//Get product information
	public function getProdInfo(){
		return $this->_productInfo;
	}

	//Get all errors
	public function getErrors(){
		return $this->_errors;
	}
}