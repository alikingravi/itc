<?php
/**
 *  This class calls the ProductDataSource static method and sets a view to display it.
 */
class IndexController{
	
	public static function index(){
		
		//Get Products Information
		$data = ProductDataSource::getProductData();
		
		//Initalize Rain TPL templating 
		$view = new RainTPL();

		//Assign data to info variable
		$view->assign('info', $data);

		//Draw out HTML
		$view->draw('index');
	}
}