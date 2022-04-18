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
              <div class="card-header">
                <!--<a href="<?=base_url('admin/ProductManagement/add_product')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add New Product </button></a>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 250px ">
                <table class="table table-bordered" style="overflow: auto; width: 900px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b">
                  <tr>
										<th>Customer Name</th>
                    <th>Order Number</th>
                    <th>Delivery Partner</th>
										<th>Delivery Address</th>
										<th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($delivery_details as $delivery_detailsRow): ?>
                      <tr>
												<td><?= $delivery_detailsRow['first_name'].' '.$delivery_detailsRow['last_name'] ?></td>
                        <td><?= $delivery_detailsRow['order_id']?></td>
												<td><?= $delivery_detailsRow['deliveryBoyfirst_name'].' '.$delivery_detailsRow['deliveryBoylast_name'] ?></td>
												<td><?= 'Land mark: '.$delivery_detailsRow['shipping_address'].',City: '.$delivery_detailsRow['shipping_city'].',State: '.$delivery_detailsRow['state_name'].',PIN Code: '.$delivery_detailsRow['shipping_postalcode'] ?></td>
                        <td><?= $delivery_detailsRow['status_name']?>
												<a data-delivery_Id="<?=  $delivery_detailsRow['id'];?>"
												data-order_id = "<?= $delivery_detailsRow['order_id'] ?>"
												 href="javascript:void(0);" class="btn btn-default editdelivery_status" title="Edit" style="color:#b8860b" ><i class="fa fa-edit" aria-hidden="true"></i></a>
												</td>
												
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
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

 <div id="deliveryStatusModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5>
                    <button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
					<form action="<?php echo base_url(); ?>admin/OrderManagement/updatedelivery_status" method="post" enctype="multipart/form-data">
						<input name="delivery_detailsId" type="hidden" class="modal_delivery_detailsId form-control" value=""/>
						
						<div class = "form-group">
							<label>Line Item</label>
								<select  class="form-control chosen chosen-select-deselect" name="status_name" data-placeholder="Select Status Name" >
									<option>Select Status</option>
										<?php $delivery_status_sql = $this->db->query("SELECT * FROM nbb_delivery_status");
										foreach($delivery_status_sql->result_array() as $delivery_status_row): ?>
										<option value="<?= $delivery_status_row['id']?>"><?= $delivery_status_row['status_name']?></option>
									<?php endforeach; ?> 
								</select>
						</div>
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
					</form>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".editdelivery_status").click(function(){
          $("#deliveryStatusModal").modal('show');
					var delivery_detailsId = $(this).attr('data-delivery_Id');
     			$("#deliveryStatusModal .modal_delivery_detailsId").val( delivery_detailsId );
					
        });
				$(".close_btn").click(function(){
						$("#deliveryStatusModal").modal("hide"); 
						
        });
    });
</script>
