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
							
                <a href="<?=base_url('admin/employeeManagement/add_employeeSalary')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Employee Salary </button></a>
								<h2>Employee's Salary List</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                 <div class="site-table" style = "overflow: auto; height: 400px">
                <table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
                    <th>Employee number </th>
                    <th>Employee Name</th>
										<th>Designation</th>
										<th>Basic Pay</th>
										<th>Dearness Allowance(DA)</th>
										<th>Provident Fund</th>
										<th>Employees State Insurance</th>
										<!--<th>House Rent Allowance</th>-->
										<th>Medical Allowance</th>
										<th>Total Earning</th>
										<th>Net Pay</th>
										<th>Total Deduction</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($employeeSalary as $employeeSalaryRow): ?>
                      <tr>
                        <td><?= $employeeSalaryRow['emp_number']?></td>
												<td><?= $employeeSalaryRow['first_name'].' '.$employeeSalaryRow['last_name']?></td>	
                        <td><?= $employeeSalaryRow['designation_name']?></td>
                        <td><?= $employeeSalaryRow['basic_pay']?></td>
                        <td><?= $employeeSalaryRow['dearness_allowance']?></td>
												<td><?= $employeeSalaryRow['Provident_fund']?></td>
                        <td><?= $employeeSalaryRow['employees_state_insurance']?></td>
                        <?php /* <td><?= $employeeSalaryRow['house_rent_allowance'] ?></td>*/ ?>
												<td><?= $employeeSalaryRow['medical_allowance'] ?></td>
												<td><?= $employeeSalaryRow['total_earning'] ?></td>
												<td><?= $employeeSalaryRow['net_pay'] ?></td>
												<td><?= $employeeSalaryRow['total_deduction'] ?></td>
                        <td>
												<a href="<?= base_url('admin/employeeManagement/edit_employeeSalary/'.$employeeSalaryRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('admin/employeeManagement/deleteEmployeeSalary/'. $employeeSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
												<!--<a href="<?= base_url('admin/EmployeeManagement/empArchive/'.$employeeSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to Archive this data?')" class="btn btn-default" data-oggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-user-times" aria-hidden="true"></i></a>-->
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
