<?php
/***************************************
 *** Product Order History Extension ***
 ***************************************
 *
 * @copyright   Copyright (c) 2015
 * @company     NetAttingo Technologies
 * @package     Netgo_Prohistory
 * @author 		Vipin
 * @dev			77vips@gmail.com
 *
 */
require_once ("Mage/Adminhtml/controllers/Catalog/ProductController.php");
class Netgo_Prohistory_Adminhtml_Prohistory_Order_Catalog_ProductController extends Mage_Adminhtml_Catalog_ProductController{
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		NA
     */
	protected function _construct(){ 
		$this->setUsedModuleName('Netgo_Prohistory');
	}

	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Set tab data
     */
	public function ordersAction(){
		$this->_initProduct();
		$this->loadLayout();
		$this->getLayout()->getBlock('product.edit.tab.order')
			->setProductOrders($this->getRequest()->getPost('product_orders', null));
		$this->renderLayout();
	}
	 
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		NA
     */
	public function quickorderAction(){ 
		$this->loadLayout(); 
		$this->renderLayout(); 
	}
}