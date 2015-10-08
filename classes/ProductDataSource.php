<?php
/**
 *  This class creates objects of ApiList and ApiInfo class, loops through the items and stores the resutls/errors in the $data array.
 *  This in turn feeds data to the IndexController class, which passes it on to the Rain TPL class which creates a view for all the data.
 */
class ProductDataSource{
	public static function getProductData(){
		$data = array();

		//Create objects of both classes
		$newlist = new ApiList();
		$newinfo = new ApiInfo($newlist);

		foreach ($newinfo->getProdInfo() as $name => $info) {
			$data[$name] = $info;
		}
		if (!empty($newinfo->getErrors())) {
			$data['error'] = $newinfo->getErrors();
		}
		return $data;
	}
}