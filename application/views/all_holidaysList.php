<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Management</h1>
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
            	<a href="<?=base_url('admin/employeeManagement/add_holidays')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add New Holidays </button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
					<th>Year</th>
                    <th>Date</th>
                    <th>Day</th>
					<th>Holidays</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($emp_holidays as $emp_holidaysRow): ?>
                      <tr>
							<td><?= $emp_holidaysRow['year'] ?></td>
                        	<td><?= $emp_holidaysRow['date']?></td>
							<td><?= $emp_holidaysRow['day'] ?></td>
							<td><?= $emp_holidaysRow['holidays'] ?></td>
                        	<td>
								<a data-delivery_Id="<?=  $emp_holidaysRow['id'];?>"
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
