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
            <div class="card" style="border-radius: 15px;">
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_category" action="<?= base_url('hrms/employeeManagement/post_add_empAttendance')?>" method="post" enctype="multipart/form-data">   

					<div class="row">     
						<div class="col-md-6">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Login Time 
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="datetime-local" class="form-control" name="login_Time" value="">
									<small class="info help-block">
									</small>
								</div>
							</div>
						</div>  
					</div>
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
              	</form>

				<div class="site-table" style = "overflow: auto; height: 400px">
					<table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 100%; height: 230px; text-align: center;">
						<thead style="background-color: #fff; color:#b8860b">
							<tr>
								<th>Employee Id </th>
								<th>Login  Date / Time</th>
								<th>Logout Date / Time</th>
								<th>Work Hours</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($employee_Attendance as $employee_AttendanceRow): ?>
							<tr>
								<td><?= $employee_AttendanceRow['emp_number']?></td>	
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
								<td>
									<a data-emp_id="<?= $employee_AttendanceRow['emp_id'];?>"	data-attendance_id = "<?= $employee_AttendanceRow['id'] ?>"	href="javascript:void(0);" class="btn btn-default editLogOut" title="Edit" style="color:#b8860b" ><i class="fa fa-edit" aria-hidden="true"></i></a>
									<!--<a href="<?= base_url('admin/employeeManagement/edit_employeeLeave/'.$employee_leaveRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
									<a href="<?= base_url('hrms/employeeManagement/deleteEmployeeLeave/'. $employee_leaveRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>-->
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
 
	<div id="editLogOutModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">LOG OUT TIME</h5>
                    <button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
					<form action="<?php echo base_url(); ?>hrms/employeeManagement/post_empAttendance_logout" method="post" enctype="multipart/form-data">
						<input name="attendance_id" type="hidden" class="modal_attendance_id form-control" value=""/>
						
						<div class="row">     
							<div class="col-md-6">                       
								<div class="form-group ">
									<label for="status" class="col-sm-6 control-label">Login Time 
									<i class="required">*</i>
									</label>
									<div class="col-sm-12">
										<input type="datetime-local" class="form-control" name="logout_Time" value="">
										<small class="info help-block">
										</small>
									</div>
								</div>
							</div>  
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

 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>


 
<script>
	$(document).ready(function(){
        $(".editLogOut").click(function(){
          $("#editLogOutModal").modal('show');
					var attendance_id = $(this).attr('data-attendance_id');
     			$("#editLogOutModal .modal_attendance_id").val( attendance_id );
					
        });
				$(".close_btn").click(function(){
						$("#editLogOutModal").modal("hide"); 
						
        });
    });
</script>
