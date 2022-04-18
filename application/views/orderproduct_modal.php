<?php 	
							
	foreach($allOrder_productdetails as $allOrder_productdetailsRow) { 
		$order_product_id = $allOrder_productdetailsRow['id'];
		$product_name = $allOrder_productdetailsRow['product_name'];
		$total_quantity = $allOrder_productdetailsRow['total_quantity'];
		$total_price = $allOrder_productdetailsRow['total_price'];
		$product_id = $allOrder_productdetailsRow['product_id'];
		$product_weight = $allOrder_productdetailsRow['product_weight'];
	
?>
	<tr>
		<td><?= $product_name; ?></td>
		<td><?= $total_quantity; ?></td>
		<td><?= $total_price; ?></td>
		<td><?= $product_weight; ?></td>
		<td><a href="<?= base_url('admin/OrderManagement/viewOrderDetails/'.$order_product_id)?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b" target="_blank"><i class="fa fa-eye"></i></a>
		<a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$order_product_id)?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Assign To Delivery" style="color:#b8860b"><i class="fas fa-shipping-fast"></i></a>
		</td>
	</tr>
<?php } ?>
