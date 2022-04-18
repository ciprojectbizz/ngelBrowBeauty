<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Delivery Management</h1>
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
              <?php foreach($deliveryDetails as $deliveryDetailsrow){ ?>
              <!-- /.card-header -->
              <div class="card-body">
					<form action="<?= base_url('admin/OrderManagement/post_edit_DeliveryDetails')?>" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" name="order_id" value="<?= $deliveryDetailsrow['id'] ?>">
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="draftStatus" class="col-form-label">Delivery Partner</label>
							</div>
							<div class="col-sm-4">
								<p>
									<select  class="form-control chosen-select" name="courier_name" data-placeholder="Select Delivery Partner" >
										<option>Select Delivery Partner</option>
										<?php foreach($deliveryPartner as $deliveryPartner_row): ?>
										<option value="<?= $deliveryPartner_row['id']?>" <?php if($deliveryPartner_row['id'] == $deliveryDetailsrow['courier']){echo "Selected";} ?>><?= $deliveryPartner_row['first_name'].' '.$deliveryPartner_row['last_name']?></option>
										<?php endforeach; ?> 
									</select>
								</p>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="draftStatus" class="col-form-label">Courier Price</label>
							</div>
							<div class="col-sm-4">
								<p><input type="text" class="form-control" name="courier_price" value="<?= $deliveryDetailsrow['courier_price'] ?>"></p>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="draftStatus" class="col-form-label">Delivery Receiving date</label>
							</div>
							<div class="col-sm-4">
								<p><input type="date" class="form-control" name="date_booked" value="<?= $deliveryDetailsrow['date_booked'] ?>">
								</p>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="draftStatus" class="col-form-label">Tacking Number</label>
							</div>
							<div class="col-sm-4">
								<p><input type="text" class="form-control" name="tacking_number" value="<?= $deliveryDetailsrow['tacking_number'] ?>"> 
								</p>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="draftStatus" class="col-form-label">Traking Link</label>
							</div>
							<div class="col-sm-4">
								<p>
									<input type="text" class="form-control" name="traking_link" value="<?= $deliveryDetailsrow['traking_link'] ?>"> 
								</p>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label for="draftStatus" class="col-form-label">Tacking Details</label>
							</div>
							<div class="col-sm-4">
								<p>
								<input type="text" class="form-control" name="tacking_details" value="<?= $deliveryDetailsrow['tacking_details'] ?>"> 
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
									<option value="<?= $orderstatus_row['id']?>" <?php if($orderstatus_row['id'] == $deliveryDetailsrow['delivery_status']){echo "Selected";} ?>><?= $orderstatus_row['status_name']?></option>
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
			  <?php } ?>
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
<script>
	$(".chosen-select").chosen({
		no_results_text: "Oops, nothing found!"
	})
</script>
