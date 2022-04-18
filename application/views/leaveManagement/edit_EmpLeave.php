<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Leave</h1>
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
                <form id="add_category" action="<?= base_url('admin/employeeManagement/post_edit_empLeave')?>" method="post" enctype="multipart/form-data">  
				<?php foreach($employee_leave as $employee_leaveRow): ?> 
				<input type="hidden" class="form-control" name="leaveID" value="<?= $employee_leaveRow['id'] ?>">
					<div class="row">
						<div class="col-md-12">             
							<div class="form-group ">
								<label for="name" class="col-sm-6 control-label">Employee Name <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<select name="employeeName" class="form-control SelempName">
										<option>Select Employee Name</option>
										<?php foreach($allemployees as $allemployeesnRow): ?>
										<option value="<?= $allemployeesnRow['id']?>" <?php if($allemployeesnRow['id'] == $employee_leaveRow['emp_id']){echo 'selected';} ?>><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name']?></option>
										<?php endforeach; ?> 
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="row">     
						<div class="col-md-6">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Leave From
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="leave_from" value="<?= $employee_leaveRow['leave_from'] ?>">
									<small class="info help-block">
									</small>
								</div>
							</div>
						</div>  

						<div class="col-md-6">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Leave To 
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="leave_to" value="<?= $employee_leaveRow['leave_to'] ?>">
								</div>
							</div>
						</div>  
					</div> 
					<div class="row">
						<div class="col-md-12">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Reason For leave 
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
										<textarea id="reason_for_leave" name="reason_for_leave" rows="5" cols="80" placeholder="Reason For leave" style = "width: 100%;" ><?= $employee_leaveRow['reason_for_leave'] ?></textarea>
								</div>
							</div>
						</div>  
					</div> 

                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
					<?php endforeach; ?>
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>


 
<script>
	$(document).ready(function(){
		// Initialize select2
		$(".SelempName").select2();
	});

</script>
