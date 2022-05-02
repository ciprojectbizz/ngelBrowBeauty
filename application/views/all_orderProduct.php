<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-3">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px;height: 40rem;">
				<div class="card-header">
                	<a href="<?=base_url('admin/OrderManagement/add_orderproduct')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Order </button></a>
				</div>
			<div class="container">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs pt-3" role="tablist">
					<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home" style="color:#b8860b">All Order</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1" style="color:#b8860b">Current Order</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu2" style="color:#b8860b">Completed Order</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu3" style="color:#b8860b">Canceled</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">

				<div id="home" class="tab-pane active">
					<div class="card-body">
						<!-- All Orders Content-->
						<div class="site-table" style = "overflow: auto;height: 400px;">
						<h4>All Orders</h4>
							<table class="table table-bordered" id = "order_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
								<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
								<tr>
									<th>Order Number </th>
									<th>Customer Name</th>
									<th>Order Date</th>
									<th>Order Status</th>
									<th>Assign To Delivery</th>
									<!--<th>Payment Method</th>-->
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach($orderProduct as $orderProductRow): 
										$order_id =   $orderProductRow['id'];
									?>
									<tr>
										<td><?= $orderProductRow['order_number']?></td>
										<td><?php if($orderProductRow['customer_firstname'] == ''){ ?>	
											<?= $orderProductRow['first_name'].' '.$orderProductRow['last_name'] ?>
											<?php }else{ ?>
												<?= $orderProductRow['customer_firstname'].' '.$orderProductRow['customer_lastname']?>
											<?php } ?>
										</td>
											<td><?= $orderProductRow['create_date']?></td>
											<td><?php if($orderProductRow['order_status'] == 1)
											{ ?>
											<span class = "btn btn-success" style="box-shadow:none !important; text-transform:uppercase;">Current Order</span>
											<?php }elseif($orderProductRow['order_status'] == 2){ ?>
											<span class="btn btn-info" style="box-shadow:none !important; text-transform:uppercase;">Complated</span>
											<?php }elseif($orderProductRow['order_status'] == 3){ ?>
											<span class="btn btn-danger" style="box-shadow:none !important; text-transform:uppercase;">Canceled</span>
											<?php }else{ ?>
											<span></span>
											<?php } ?></td>
											<th><a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$orderProductRow['id'])?>" target="_blank" title="Assign To Delivery"><span class = "btn btn-warning" style="box-shadow:none !important; text-transform:uppercase;">Assign To Delivery</span></a></th>
											<td>
											<!--<a href="<?= base_url('admin/OrderManagement/viewOrderDetails/'.$orderProductRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-eye"></i></a>-->
											<a data-order_id="<?=  $order_id; ?>"
												 href="javascript:void(0);" data-toggle="modal" data-target="#showOrderProduct" class="btn btn-default" title="Edit" style="color:#b8860b" ><i class="fa fa-eye"></i></a>

												<!--<a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$orderProductRow['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Assign To Delivery" style="color:#b8860b"><i class="fas fa-shipping-fast"></i></a>-->
											</td>					
									</tr>
									<?php endforeach; ?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="menu1" class="container tab-pane fade">
						<div class="card-body">
							<!-- Current Orders Content-->
							<div class="site-table" style="overflow: auto; height: 400px;">
								<h4>Current Orders</h4>
								<table class="table table-bordered" id = "order_table1" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
									<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
									<tr>
										<th>Order Number </th>
										<th>Customer Name</th>
										<th>Order Date</th>
										<th>Order Status</th>
										<!--<th>Payment Method</th>-->
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
											<?php foreach($AllCurrentOrder as $AllCurrentOrdertRow):
												$order_id =   $AllCurrentOrdertRow['id'];
											?>
											<tr>
												<td><?= $AllCurrentOrdertRow['order_number']?></td>
												<td><?php if($AllCurrentOrdertRow['customer_firstname'] == ''){ ?>	
												<?= $AllCurrentOrdertRow['first_name'].' '.$AllCurrentOrdertRow['last_name'] ?>
												<?php }else{ ?>
													<?= $AllCurrentOrdertRow['customer_firstname'].' '.$AllCurrentOrdertRow['customer_lastname']?>
												<?php } ?>
												</td>
												<td><?= $AllCurrentOrdertRow['create_date']?></td>
												<td><?php if($AllCurrentOrdertRow['order_status'] == 1)
												{ ?>
													<span class = "btn btn-success" style="box-shadow:none !important; text-transform:uppercase;">Current Order</span>
												<?php }else{
													echo '';
												} ?></td>
												<td>
												<!--<a href="<?= base_url('admin/OrderManagement/viewOrderDetails/'.$AllCurrentOrdertRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-eye"></i></a>-->
												<a data-order_id="<?=  $order_id; ?>"
													href="javascript:void(0);" data-toggle="modal" data-target="#showOrderProduct" class="btn btn-default" title="Edit" style="color:#b8860b" ><i class="fa fa-eye"></i></a>

													<a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$AllCurrentOrdertRow['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Assign To Delivery" style="color:#b8860b"><i class="fas fa-shipping-fast"></i></a>
												</td>			
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="menu2" class="container tab-pane fade">
						<div class="card-body">
							<!-- Complated Orders Content-->
							<div class="site-table" style="overflow: auto; height: 400px;">
								<h4>Complated Orders</h4>
								<table class="table table-bordered" id = "order_table2" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
									<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
									<tr>
										<th>Order Number </th>
										<th>Customer Name</th>
										<th>Order Date</th>
										<th>Order Status</th>
										<!--<th>Payment Method</th>-->
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($AllComplatedOrder as $AllComplatedOrderRow): 
											$order_id =   $AllComplatedOrderRow['id'];
										?>
										<tr>
											<td><?= $AllComplatedOrderRow['order_number']?></td>
											<td><?php if($AllComplatedOrderRow['customer_firstname'] == ''){ ?>	
											<?= $AllComplatedOrderRow['first_name'].' '.$AllComplatedOrderRow['last_name'] ?>
											<?php }else{ ?>
												<?= $AllComplatedOrderRow['customer_firstname'].' '.$AllComplatedOrderRow['customer_lastname']?>
											<?php } ?>
											</td>
											<td><?= $AllComplatedOrderRow['create_date']?></td>
											<td><?php if($AllComplatedOrderRow['order_status'] == 2)
												{ ?>
													<span class="btn btn-info" style="box-shadow:none !important; text-transform:uppercase;">Complated Order</span>
												<?php }else{
													echo '';
												} ?></td>
											<td>
											<!--<a href="<?= base_url('admin/OrderManagement/viewOrderDetails/'.$AllComplatedOrderRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-eye"></i></a>-->
											<a data-order_id="<?=  $order_id; ?>"
												 href="javascript:void(0);" data-toggle="modal" data-target="#showOrderProduct" class="btn btn-default" title="Edit" style="color:#b8860b" ><i class="fa fa-eye"></i></a>

												<a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$AllComplatedOrderRow['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Assign To Delivery" style="color:#b8860b"><i class="fas fa-shipping-fast"></i></a>
											</td>	
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div id="menu3" class="container tab-pane fade">
						<div class="card-body">
							<!-- Canceled Orders Content-->
							<div class="site-table" style="overflow: auto; height: 400px;">
							<h4>Canceled</h4>
							<table class="table table-bordered" id = "order_table3" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
								<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
								<tr>
									<th>Order Number </th>
									<th>Customer Name</th>
									<th>Order Date</th>
									<th>Order Status</th>
									<!--<th>Payment Method</th>-->
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach($AllCanceledOrder as $AllCanceledOrderRow):
										$order_id =   $AllCanceledOrderRow['id'];
									?>
										<tr>
											<td><?php if($AllCanceledOrderRow['customer_firstname'] == ''){ ?>	
											<?= $AllCanceledOrderRow['first_name'].' '.$AllCanceledOrderRow['last_name'] ?>
											<?php }else{ ?>
												<?= $AllCanceledOrderRow['customer_firstname'].' '.$AllCanceledOrderRow['customer_lastname']?>
											<?php } ?>
											</td>
											<td><?= $AllCanceledOrderRow['create_date']?></td>
											<td><?php if($AllCanceledOrderRow['order_status'] == 2)
												{ ?>
													<span class="btn btn-info" style="box-shadow:none !important; text-transform:uppercase;">Complated Order</span>
												<?php }else{
													echo '';
												} ?></td>
											<td>
											<!--<a href="<?= base_url('admin/OrderManagement/viewOrderDetails/'.$AllCanceledOrderRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-eye"></i></a>-->
											<a data-order_id="<?=  $order_id; ?>"
												 href="javascript:void(0);" data-toggle="modal" data-target="#showOrderProduct" class="btn btn-default" title="Edit" style="color:#b8860b" ><i class="fa fa-eye"></i></a>

												<a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$AllCanceledOrderRow['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Assign To Delivery" style="color:#b8860b"><i class="fas fa-shipping-fast"></i></a>
											</td>	
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div> 


			</div>
			
			</div>

		</div>
	<!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
</div> 

<div id="showOrderProduct" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Order Product</h5>
				<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered" style="overflow: auto; width: 100%; height: 150px; text-align: center;">
					<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
					<tr>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Weight</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody class = "allOrder_productdata">
						
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
				
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		$('#showOrderProduct').on('show.bs.modal', function (e) {
			var order_id = $(e.relatedTarget).data('order_id');
			
			$.ajax({
				type : 'GET',
				url : '<?= base_url("admin/OrderManagement/fetchOrderproductData")?>', 
				data :  {order_id:order_id}, 
				success : function(data){
				$('.allOrder_productdata').html(data);
				}
			});
		});
	});

	$(function () {
		$('#order_table').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": true,
		"responsive": true,
		});
		$('#order_table1').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": true,
		"responsive": true,
		});
		$('#order_table2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": true,
		"responsive": true,
		});
		$('#order_table3').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": true,
		"responsive": true,
		});
	});

	/*$(function() {
	$("#order_table1").dataTable();
	});*/

</script> 
