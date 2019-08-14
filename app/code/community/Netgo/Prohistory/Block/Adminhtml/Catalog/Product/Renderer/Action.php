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
class Netgo_Prohistory_Block_Adminhtml_Catalog_Product_Renderer_Action extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	
	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		return the button for grid
     */ 
public function render(Varien_Object $row)
	{
		$this->getColumn()->setColumnCssClass('new-order');
		$orderData = $row->getData(); 
		 $adminUrl = Mage::getBaseUrl();
		
		$invoice_link = Mage::helper('adminhtml')->getUrl('adminhtml/sales_order_invoice/start/order_id/'.$orderData['entity_id'].'/');
		$shipment_link = Mage::helper('adminhtml')->getUrl('adminhtml/sales_order_shipment/start/order_id/'.$orderData['entity_id'].'/');
		$reorder_link = Mage::helper('adminhtml')->getUrl('adminhtml/sales_order_create/reorder/order_id/'.$orderData['entity_id'].'/');
		$order_link = Mage::helper('adminhtml')->getUrl('adminhtml/sales_order/view/order_id/'.$orderData['entity_id'].'/');
		 
		$button1 = '<button id="id_'.$orderData['entity_id'].'" title="Reset" type="button" class="scalable " onclick="quickView(\''.$adminUrl.'\',\''.$orderData['entity_id'].'\')" style=""><span><span><span>Quick View</span></span></span></button>';
		
		$button2 = '<span><span><span><a id="id_in_'.$orderData['entity_id'].'"  class="form-button scalable go" style="color:#fff;text-decoration:none;" href="'.$invoice_link.'">Invoice</a></span></span></span>';
		$button3 = '<span><span><span><a id="id_ship_'.$orderData['entity_id'].'" style="color:#fff;text-decoration:none;" href="'.$shipment_link.'" class="form-button scalable go" >Ship</a></span></span></span>';
		$button4 ='<span><span><span><a  class="form-button scalable go" id="id_reorder_'.$orderData['entity_id'].'" style="color:#fff;text-decoration:none;" href="'.$reorder_link.'">Reorder</a></span></span></span></button>';
		$button5 = '<span><span><span><a id="id_go_to_'.$orderData['entity_id'].'" title="Go To Order"  style="color:#fff;text-decoration:none;" href="'.$order_link.'"  class="form-button scalable go">Go to order</a></span></span></span>';
		
		return $button1.' '.$button2.' '.$button3.' '.$button4.' '.$button5;
	     
	}
	 
}