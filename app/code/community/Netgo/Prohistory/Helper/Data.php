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
class Netgo_Prohistory_Helper_Data extends Mage_Core_Helper_Abstract{
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Order url
     */
	public function getOrdersUrl(){
		return Mage::getUrl('prohistory/order/index');
	}
}