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
class Netgo_Prohistory_Block_Adminhtml_Catalog_Product_Edit_Tab_Order extends Mage_Adminhtml_Block_Widget_Grid{
    /**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		NA
     */ 
	public function __construct(){
		parent::__construct();
		 
	}
	
    /**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Return the product orders
     */
	protected function _prepareCollection() {
		$this->unsetChild('reset_filter_button');
		$this->unsetChild('search_button');
		
		$collection = Mage::getModel('sales/order')->getCollection();
		$collection->getSelect()
             ->join(
            array('itemz' => Mage::getSingleton('core/resource')->getTableName('sales/order_item')),
            'main_table.entity_id = itemz.order_id', 
            array('itemz.*')
        );
		 
		$collection->addAttributeToFilter('itemz.sku', $this->getProduct()->getSku());
		$this->setCollection($collection);
		parent::_prepareCollection();
		return $this; 
	}

    /**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
     */	
	protected function _prepareMassaction(){
		return $this;
	}

	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Prepare the column in gird
     */
	protected function _prepareColumns(){
		
		$this->addColumn('order_incre', array(
			'header'=> Mage::helper('prohistory')->__('Order Id'),
			'align' => 'left',
			'index' => 'increment_id',
			'filter' => false,
		));
		$this->addColumn('contest_name', array(
			'header'=> Mage::helper('prohistory')->__('Ordered Qty'),
			'align' => 'right',
			'index' => 'qty_ordered',
			'filter' => false,
		));
		$this->addColumn('base_grand_total', array(
			'header'=> Mage::helper('prohistory')->__('Grand Total'),
			'align' => 'right', 
			'type'      => 'price',
			'index' => 'base_grand_total',
			'filter' => false,
			'currency_code' => Mage::app()->getStore()->getCurrentCurrencyCode()
		));
		$this->addColumn('createddate', array(
			'header'=> Mage::helper('prohistory')->__('Created At '),
			'align' => 'right',
			'filter' => false,
			'type' => 'datatime',
			'index' => 'created_at',
		));
		
		$this->addColumn('action', array(
			'header'=> Mage::helper('prohistory')->__('Action'), 
			'index' => 'action',
			'filter' => false,
			'width'     => '410px',
			'renderer'  => 'Netgo_Prohistory_Block_Adminhtml_Catalog_Product_Renderer_Action', 
		));  
	} 

    /**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Gird row URL 
     */
	public function getRowUrl($item){
		return 'javascript:void(0)';
	}

    /**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Gird row URL 
     */
	public function getGridUrl(){
		return $this->getUrl('*/*/ordersGrid', array(
			'id'=>$this->getProduct()->getId(),
			'class'=>'viin'
		));
	}

	/**
     * @access 		Public
     * @author 		Vipin
	 * @dev			77vips@gmail.com
	 * @output 		Return current product info
     */
	public function getProduct(){
		return Mage::registry('current_product');
	}
	 
}