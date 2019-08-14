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

 function quickView(url, order_id){
	 
	if($$('.order_info').size()){
		$$('.order_info').first().remove(); 
	}
	if(!$('order_id_'+order_id)){
		new Ajax.Request(url+'admin/prohistory_order_catalog_product/quickorder/id/'+order_id, {
			onSuccess: function(response) { 
				$('id_'+order_id).up(2).insert("<tr class='order_info' id='order_id_"+order_id+"'><td colspan='5'>"+response.responseText+"</td></tr>");
				$('order_id_'+order_id).scrollTo();
			}
		}); 
	}
 }
