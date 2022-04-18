<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cart List</h1>
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
								<div class="card-header">
                	<a href="<?=base_url('admin/OrderManagement/create_OrderProduct')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Create Order</button></a>
              	</div>
              <div class="card-body">
    
								<div class="site-table" style="overflow: auto; height: 250px ">            
                  <table class="table table-bordered" id = "example2">
                    <thead style="background-color: #fff; color:#b8860b">
                      <tr>
												<th>Order Number </th>
												<th>Customer Name</th>
												<th>Cart Add Date</th>
												<th>Action</th>
                      </tr>
                    </thead>
                  <tbody>
                    <?php foreach($cartProduct as $cartProductRow): ?>
                    <tr>
					  	        <td><?= $cartProductRow['order_number']?></td>
						          <td>
												<?php if($orderProductRow['customer_firstname'] == ''){ ?>	
												<?= $orderProductRow['first_name'].' '.$orderProductRow['last_name'] ?>
												<?php }else{ ?>
													<?= $orderProductRow['customer_firstname'].' '.$orderProductRow['customer_lastname']?>
												<?php } ?>
											</td>
                        <td><?= $cartProductRow['create_date']?></td>
                        <td>
                          <a href="<?= base_url('admin/OrderManagement/viewOrderDetails/'.$cartProductRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-eye"></i></a>
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

