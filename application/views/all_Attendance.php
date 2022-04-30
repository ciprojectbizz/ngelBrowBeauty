<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Attendance</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px;height: 35rem;">
              <div class="card-header">
                <!--<a href="<?=base_url('admin/ServiceCategoryCtl/add_category')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add New Service </button></a>-->
				
				<form id="add_category" action="<?= base_url('admin/employeeManagement/exportEmpAttendance')?>" method="post" enctype="multipart/form-data">   

					<div class="row">  
						<div class="col-md-3">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Select Employee 
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<select name="employeeName" class="form-control">
										<option>Select Employee Name</option>
										<?php foreach($allemployees as $allemployeesnRow): ?>
										<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name']?></option>
										<?php endforeach; ?> 
									</select>
								</div>
							</div>
						</div> 					
						<div class="col-md-3">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Reporting Month 
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="month" class="form-control" name="login_Time" value="">
									<small class="info help-block">
									</small>
								</div>
							</div>
						</div>  
						  
					</div>
                    <input type="submit" class="btn btn-primary btn-custom" value="Download" style="width:150px;">
              	</form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 400px">
                <table class="table table-bordered" id = "Attendance_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
						<tr>
							<th>Employee Id </th>
							<th>Employee Name </th>
							<th>Login  Date / Time</th>
							<th>Logout Date / Time</th>
							<th>Work Hours</th>
							<!--<th>Action</th>-->
						</tr>
                  </thead>
                  <tbody>
						<?php foreach($employee_Attendance as $employee_AttendanceRow): ?>
						<tr>
							<td><?= $employee_AttendanceRow['emp_number']?></td>
							<td><?= $employee_AttendanceRow['first_name'].' '.$employee_AttendanceRow['last_name']?></td>		
							<td><?= date("d-m-Y h:i a", strtotime($employee_AttendanceRow['login']));?></td>
							<td>
								<?php if($employee_AttendanceRow['logout'] == ''){
									echo " ";
								?>
								<?php }else{?>
								<?= date("d-m-Y h:i a", strtotime($employee_AttendanceRow['logout']))?>
								<?php } ?>
							</td>
							<td><?= $employee_AttendanceRow['work_hours']?></td>
						<!--	<td>
								<a data-emp_id="<?= $employee_AttendanceRow['emp_id'];?>"	data-attendance_id = "<?= $employee_AttendanceRow['id'] ?>"	href="javascript:void(0);" class="btn btn-default editLogOut" title="Edit" style="color:#b8860b" ><i class="fa fa-edit" aria-hidden="true"></i></a>
								<a href="<?= base_url('admin/employeeManagement/edit_employeeLeave/'.$employee_leaveRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
								<a href="<?= base_url('hrms/employeeManagement/deleteEmployeeLeave/'. $employee_leaveRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
							</td>-->
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

<style>
.ui-datepicker-calendar {
    display: none;
}
</style>

<script>
	$(function () {
		$('#Attendance_table').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": true,
		"responsive": true,
		});
	});

</script>
