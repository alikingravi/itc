<?php
/**
 *  This class calls the API link to return the list and info of available products.
 */
class ConfigURL{
	private static $_URL = 'http://www.itccompliance.co.uk/recruitment-webservice/api/';
	private static $_errors = array();

	// Method to call the API link and decode it's data
	public static function getURL($urlParam, $id = null){
		if ($id) {
			$contents = file_get_contents(self::$_URL.$urlParam."?id=".$id);
			$data_array = json_decode($contents, true);
		}
		else{
			$contents = file_get_contents(self::$_URL.$urlParam);
			$data_array = json_decode($contents, true);
		}
		if (isset($data_array['error'])) {
			self::addError($data_array['error']);
		}
		return $data_array;
	}

	// Method to store errors in $_errors array
	private static function addError($error){
		self::$_errors[] = $error;
	}

	// Method to return errors from $_errors array
	public static function errors(){
		return self::$_errors;
	}
}