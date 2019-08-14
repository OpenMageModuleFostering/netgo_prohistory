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
class Netgo_Prohistory_Model_Adminhtml_Observer{
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Add tab in product edit page
     */
	protected function _canAddTab($product){
		if ($product->getId()){
			return true;
		}
		if (!$product->getAttributeSetId()){
			return false;
		}
		$request = Mage::app()->getRequest();
		if ($request->getParam('type') == 'configurable'){
			if ($request->getParam('attribtues')){
				return true;
			}
		}
		return false;
	}

	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Add tab in product edit page
     */
	public function addOrderBlock($observer){		
		//Check module enable or not
		$configValue = Mage::getStoreConfig('prohistory_option/order_config/status');
		if($configValue){
			$block = $observer->getEvent()->getBlock();
			$product = Mage::registry('product');
			if ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs && $this->_canAddTab($product)){
				$block->addTab('orders', array(
					'label' => Mage::helper('prohistory')->__('Order History'),
					'url'   => Mage::helper('adminhtml')->getUrl('adminhtml/prohistory_order_catalog_product/orders', array('_current' => true)),
					'class' => 'ajax',
				));
			}
		}
		return $this;
	} 
}