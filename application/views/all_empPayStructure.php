<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payroll Management</h1>
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
							
                <a href="<?=base_url('admin/pay_Structure/add_PayStructure')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Pay Structure </button></a>
								<h3>Pay Structure</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                 <div class="site-table" style = "overflow: auto; height: 400px">
                <table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
										<th>Year</th>
										<th>Dearness Allowance(DA)</th>
										<th>Provident Fund</th>
										<th>Employees State Insurance</th>
										<!--<th>House Rent Allowance</th>-->
										<th>Medical Allowance</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allpay_structure as $allpay_structureRow): ?>
                      <tr>
												<td><?= $allpay_structureRow['year']?></td>
                        <td><?= $allpay_structureRow['dearness_Allowance']?></td>
												<td><?= $allpay_structureRow['provident_Fund']?></td>
                        <td><?= $allpay_structureRow['ESI']?></td>
                        <?php /* <td><?= $allpay_structureRow['house_rent_allowance'] ?></td>*/ ?>
												<td><?= $allpay_structureRow['medical_Allowance'] ?></td>
                        <td>
												<!--<a href="<?= base_url('admin/pay_Structure/edit_empPay_Structure/'.$allpay_structureRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>-->
												<a href="<?= base_url('admin/pay_Structure/deleteEmpPay_Structurey/'. $allpay_structureRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
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
 <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>
<script>


	$(function() {
	$("#salary_table").dataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": false,
		"responsive": false,
	});
	
	});
	
	
</script>
