
<div class="content-wrapper" style="margin-left: 270px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

	<nav class="nav nav-tabs" id="myTab" role="tablist">
		<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#order" role="tab" aria-controls="nav-home" aria-selected="true" style="color:#b8860b">Product Info</a>
		<a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#product" role="tab" aria-controls="nav-home" aria-selected="true" style="color:#b8860b">Delivary Address</a>
		<?php /* <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#factory" role="tab" aria-controls="nav-profile" aria-selected="false" style="color:#b8860b">Factory Order</a>*/ ?>
		<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="nav-profile" aria-selected="false" style="color:#b8860b">Delivery Status</a>
		<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#customer" role="tab" aria-controls="nav-profile" aria-selected="false" style="color:#b8860b">Customer Info</a>
	</nav>
	<br>
	<div class="tab-content" id="nav-tabContent" style="margin: auto 3rem;">
		<!-- Order Details -->	
		<div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="nav-home-tab">
			<div role="tablist">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								
								<div class="d-inline h4">Order Details</div>
								<!--<div class="d-inline float-right"><small><a href="">Edit</a></small></div>-->
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 font-weight-bold">Product</div>
									<div class="col-sm-6">
										<?php 
										$product_id = $this->uri->segment(4);
										$CurrentOrder_image_sql = $this->db->query("SELECT nbb_product_image.image AS product_image
											FROM nbb_product_image 
											WHERE nbb_product_image.product_id = '".$product_id."' ORDER BY id DESC LIMIT 1");
											foreach($CurrentOrder_image_sql->result_array() as $product_image_row){ 
										?>
										<img src="<?= base_url('uploads/product_img/'.$product_image_row['product_image'])?>" width="110" height="80">
										<?php } ?>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6 font-weight-bold">Product Name</div>
									<div class="col-sm-6"><?= $OrderDetails['product_name'] ?></div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6 font-weight-bold">Order Numder</div>
									<div class="col-sm-6"><?= $OrderDetails['order_code'] ?></div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6 font-weight-bold">Order Date</div>
									<div class="col-sm-6"><?= date("d-m-Y", strtotime($OrderDetails['create_date'])) ?></div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6 font-weight-bold">Order Quantity</div>
									<div class="col-sm-6"><?= $OrderDetails['total_quantity'] ?></div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6 font-weight-bold">Total Price</div>
									<div class="col-sm-6">$<?= $OrderDetails['total_price'] ?></div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6 font-weight-bold">Invoice</div>
									<div class="col-sm-6"> 
									<a href="<?= base_url('admin/OrderManagement/showInvoice')?>?order_Id=<?php echo $OrderDetails['order_id']; ?>" title="pdf" target="_blank"><button class="btn btn-success" style="box-shadow:none !important; text-transform:uppercase;">View Bill</button></a>
									</div>
								</div>
								<hr>
								<div class="row">
									<dt class="col-sm-12 font-weight-bold">Product Description</dt>
									<dd class="col-sm-12"><?php
									if(isset($short_description['short_description']) && $short_description['short_description'] != ''){
										echo $short_description['short_description'];
									 }
									 else{
										echo "...";
									 }
									  ?>.</dd>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				<!-- End of Order Details -->
				<!--Product Info  -->
				<div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="nav-profile-tab">
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h5 class="mb-0">
									Shipping Address
									</h5>
								</div>

								<div class="collapse show">
									<div class="card-body">
										<form>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Name :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['shipping_firstname'].' '.$OrderDetails['shipping_lastname']?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Contact Number :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['shipping_contactno'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Address :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['shipping_address'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">City :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['shipping_city'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">State :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['shipping_state'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Postal Code :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['shipping_postalcode'] ?></p>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header collapsed">
									<h5 class="mb-0">
									Billing Address
									</h5>
								</div>
								<div class="collapse show">
									<div class="card-body">
										<form>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Name :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['billing_firstname'].' '.$OrderDetails['billing_lastname']?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Contact Number :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['billing_contactno'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Address :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['billing_address'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">City :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['billing_city'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">State :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['billing_state'] ?></p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-4">
													<label for="draftStatus" class="col-form-label">Postal Code :</label>
												</div>
												<div class="col-sm-4">
													<p><?= $OrderDetails['billing_postal_code'] ?></p>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--delivery Order  -->
				
				<div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="nav-profile-tab">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header collapsed">
								<h5 class="mb-0">
									Delivery Status
								</h5>
							</div>
							<div id="collapseThree" class="collapse show">
								<div class="card-body">
									<form action="<?= base_url('admin/OrderManagement/post_add_delivery')?>" method="post" enctype="multipart/form-data">
										<input type="hidden" class="form-control" name="order_id" value="<?= $OrderDetails['id'] ?>">
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Courier Partner</label>
											</div>
											<div class="col-sm-4">
												<select class="form-control chosen chosen-select-deselect" name="courier_name" data-placeholder="Select Delivery Partner">
													<option>Select Delivery Partner</option>
													<?php foreach($deliveryPartner as $deliveryPartner_row): ?>
													<option value="<?= $deliveryPartner_row['id']?>" <?php if($deliveryPartner_row['id'] == $OrderDetails['courier']){echo "Selected";} ?>><?= $deliveryPartner_row['first_name'].' '.$deliveryPartner_row['last_name']?></option>
													<?php endforeach; ?> 
												</select>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Courier Price</label>
											</div>
											<div class="col-sm-4">
												<p><input type="text" class="form-control" name="courier_price" value="<?= $OrderDetails['courier_price'] ?>"></p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Delivery Receiving date</label>
											</div>
											<div class="col-sm-4">
												<p><input type="date" class="form-control" name="date_booked" value="<?= $OrderDetails['date_booked'] ?>">
												</p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Tacking Number</label>
											</div>
											<div class="col-sm-4">
												<p><input type="text" class="form-control" name="tacking_number" value="<?= $OrderDetails['tacking_number'] ?>"> 
												</p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Traking Link</label>
											</div>
											<div class="col-sm-4">
												<p>
													<input type="text" class="form-control" name="traking_link" value="<?= $OrderDetails['traking_link'] ?>"> 
												</p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Tacking Details</label>
											</div>
											<div class="col-sm-4">
												<p>
												<input type="text" class="form-control" name="tacking_details" value="<?= $OrderDetails['tacking_details'] ?>"> 
												</p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Delivery Status</label>
											</div>
											<div class="col-sm-4">
												<p>
												<select  class="form-control chosen chosen-select-deselect" name="delivery_status" id="category" data-placeholder="Select Order Status" >
													<option>Select Order Status</option>
													<?php foreach($customer_order_status as $orderstatus_row): ?>
													<option value="<?= $orderstatus_row['id']?>" <?php if($orderstatus_row['id'] == $OrderDetails['delivery_status']){echo "Selected";} ?>><?= $orderstatus_row['status_name']?></option>
													<?php endforeach; ?> 
												</select>
												</p>
											</div>
										</div>
										<div class="text-center">
											<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Customer Info  -->
				<div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="nav-contact-tab">
				<div class="col-md-12">
						<div class="card">
							<div class="card-header collapsed" role="tab" id="headingThree" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								<h5 class="mb-0">
								Customer Info
								</h5>
							</div>
							<div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<form>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Profile Image</label>
											</div>
											<div class="col-sm-4">
												<p><img class="rounded-circle" src="<?= base_url('uploads/profile_img/'.$OrderDetails['profile_picture'])?>" width="150"></p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Name</label>
											</div>
											<div class="col-sm-4">
												<p><?= $OrderDetails['first_name'].' '.$OrderDetails['last_name']?></p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Contact no.</label>
											</div>
											<div class="col-sm-4">
												<p><?= $OrderDetails['user_contact'] ?></p>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-4">
												<label for="draftStatus" class="col-form-label">Customer Email</label>
											</div>
											<div class="col-sm-4">
												<p><?= $OrderDetails['user_email'] ?></p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<style>
	.card-header{
	  cursor: pointer;
	}
	</style>

<!-- this link for multiple selection-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
	$(".chosen-select").chosen({
		no_results_text: "Oops, nothing found!"
	})
</script>
