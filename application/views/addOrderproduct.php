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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px">
              
				<!-- /.card-header -->
				<div class="card-body">
				<form id="add_customer" action="<?= base_url('admin/orderManagement/post_add_orderproduct')?>" method="post" enctype="multipart/form-data">
					<div class = "row">
						<div class="col-md-6">
							<label for="services" class="col-sm-6 control-label">Customer name<i class="required">*</i></label>
							<select data-placeholder="Customer Name..." class="chosen-select form-control ml-2" name="customer_id" id="customer_id" style="width: 98%;">
								<option>Select Customer</option>
								<?php foreach ($customer as $customerRow) : ?>
									<option value="<?= $customerRow['id'] ?>"><?= $customerRow['first_name'].' '.$customerRow['last_name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">   
							<div class="form-group">
								<label for="dob" class="col-sm-6 control-label">Delivery Date 
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="delivery_date" id="delivery_date" placeholder="Input Delivery Date" value="">
								</div>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col-md-12">
							<h4 class="col-md-12 control-label">Products</h4>
							<?php foreach ($product_data as $product_dataRow) : ?>
								<div class="row">
									<div class="col-md-3"> 
										<input type="checkbox" id="productID" name="productID[]" value="<?= $product_dataRow['id'] ?>">  
										<label for="product" class="col-md-6 control-label mt-0"><h5><?= $product_dataRow['name'] ?></h5></label>
										<label for="product" class="col-md-6 control-label mt-0">Available stock : <?= $product_dataRow['available_stock'] ?></label>

										<input type="hidden" class="form-control" name="available_stock[]" id="available_stock_<?= $product_dataRow['id'] ?>" value="<?= $product_dataRow['available_stock'] ?>">
										<input type="hidden" class="form-control" name="stock_now[]" id="stock_now_<?= $product_dataRow['id'] ?>" value="">
									</div>
									<div class="col-md-3">   
										<div class="form-group">
											<label for="Quantity" class="col-sm-6 control-label">Quantity </label>
											<div class="col-md-4">
												<input type="number" class="form-control" name="quantity[]" id="quantity_<?= $product_dataRow['id'] ?>" value="" onkeyup="calculate_total_quantity('<?= $product_dataRow['id'] ?>');">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="col-md-6">
											<label for="age" class="control-label">Product Price</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" name="product_price[]" id="price_<?= $product_dataRow['id'] ?>" value="<?= $product_dataRow['price'] ?>">
										</div>
									</div>
									<div class="col-md-2">
										<div class="col-md-6">
											<label for="age" class="control-label">Total Price</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" name="totalPrice[]" id="totalPrice_<?= $product_dataRow['id'] ?>" value="" readonly>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
					</div>
				</form>
				</div>
              <!-- /.card-body -->
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

  <!-- this link for multiple selection-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<style>
	h4{
			background-color: #b8860b;
			color: white;
			padding: 5px;
			text-align: left;
			border-radius: 5px;
			padding-left: 5px;
		}
</style>
<script>
	$(".chosen-select").chosen({
		no_results_text: "Oops, nothing found!"
	})
	function calculate_total_quantity(product_id) {
		var quantity = parseInt(document.getElementById('quantity_'+product_id).value);
		
		var price = parseInt(document.getElementById('price_'+product_id).value);
		var available_stock = parseInt(document.getElementById('available_stock_'+product_id).value);

		var result = quantity * price;
		var result2 = available_stock - quantity;

		if(!isNaN(result)) {
			document.getElementById('totalPrice_'+product_id).value = result;
			document.getElementById('stock_now_'+product_id).value = result2;
		}
	}
 </script> 
