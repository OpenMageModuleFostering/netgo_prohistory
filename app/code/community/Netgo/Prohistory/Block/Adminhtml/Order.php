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
class Netgo_Prohistory_Block_Adminhtml_Order extends Mage_Sales_Block_Order_Item_Renderer_Default{
	 
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Return order obj by ID
     */
	public function getOrder() {  
		$order_id = $this->getRequest()->getParam('id');
		$orderObj = Mage::getModel('sales/order')->load($order_id);  
		return $orderObj; 
	}
	
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Return order items
     */	
	public function getItemsCollection()
    {
        return $this->getOrder()->getItemsCollection();
    }
	
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Return order items
     */	
	public function getOrderItem()
    {
        if ($this->getItem() instanceof Mage_Sales_Model_Order_Item) {
            return $this->getItem();
        } else {
            return $this->getItem()->getOrderItem();
        }
    }

	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Return order items options
     */	
    public function getItemOptions()
    {
        $result = array();
        if ($options = $this->getOrderItem()->getProductOptions()) {
            if (isset($options['options'])) {
                $result = array_merge($result, $options['options']);
            }
            if (isset($options['additional_options'])) {
                $result = array_merge($result, $options['additional_options']);
            }
            if (isset($options['attributes_info'])) {
                $result = array_merge($result, $options['attributes_info']);
            }
        }
        return $result;
    }
	 
}