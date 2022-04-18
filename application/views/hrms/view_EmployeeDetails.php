
<div class="content-wrapper" style="margin-left: 270px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Management</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

	<div class="tab-content" id="nav-tabContent" style="margin: auto 3rem;">
			<div class="main-body">
				<div class="row gutters-sm">
					<div class="col-md-4 mb-3">
					<div class="card">
						<div class="card-header">
							<a href="<?=base_url('hrms/employeeManagement/add_employeeDetails')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Update Employee Details </button></a>
						</div>
						<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">
							<img src="<?= base_url('uploads/emplyee_img/'.$emp_Details['employee_photo'])?>" class="rounded-circle" width="150">
							<div class="mt-3">
							<h4><?= $emp_Details['first_name'].' '.$emp_Details['last_name'] ?></h4>
							<p class="text-secondary mb-1"><?= $emp_Details['designation_name'] ?></p>
							<p class="text-muted font-size-sm"><?= $emp_Details['emp_number'] ?></p>
							<p class="text-muted font-size-sm"><?= $emp_Details['pan_number'] ?></p>
							</div>
						</div>
						</div>
					</div>
					<div class="card mt-3">
						<div class="card-header">
							<div class="d-inline h5">Address Details</div>
						</div>
						<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h6 class="mb-0">Full Address</h6>
							<span class="text-secondary"><?= $emp_Details['full_address'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h6 class="mb-0">City</h6>
							<span class="text-secondary"><?= $emp_Details['city'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h6 class="mb-0">State</h6>
							<span class="text-secondary"><?= $emp_Details['state'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h6 class="mb-0">Land Mark</h6>
							<span class="text-secondary"><?= $emp_Details['land_mark'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h6 class="mb-0">Pincode</h6>
							<span class="text-secondary"><?= $emp_Details['pincode'] ?></span>
						</li>
						</ul>
					</div>
					</div>
					<div class="col-md-8">
					<div class="card mb-3">
						<div class="card-header">
							<div class="d-inline h5">Personal Deatils</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
								<h6 class="mb-0">Aadhaar Number</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?= $emp_Details['aadhaar_number'] ?>
								</div>
							</div>
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Email ID</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?= $emp_Details['email'] ?>
								</div>
							</div>
							
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?= $emp_Details['mob_no'] ?>
								</div>
							</div>
							
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Father's Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?= $emp_Details['father_name'] ?>
								</div>
							</div>
							
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Mother's Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?= $emp_Details['mother_name'] ?>
								</div>
							</div>
							
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Husband Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?= $emp_Details['husband_name'] ?>
								</div>
							</div>
							
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Gender</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?= $emp_Details['gender'] ?>
								</div>
							</div>
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Date Of Birth</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?php if($emp_Details['date_of_birth'] == 0000-00-00){
										echo '';
									}else{ ?>
										<?= date("d-m-Y", strtotime($emp_Details['date_of_birth'])) ?>
								<?php } ?>
								
								</div>
							</div>
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Job Type</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<?php if($emp_Details['jobtype'] == 'part_time'){ ?>
									Part Time
								<?php	}elseif($emp_Details['jobtype'] == 'full_time'){ ?>
									Full Time
								<?php }else{ ?>
									Contrect
								<?php } ?>
								</div>
							</div>
							<div class="row pt-2">
								<div class="col-sm-3">
								<h6 class="mb-0">Date Of Joining</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php if($emp_Details['date_of_joining'] == 0000-00-00){
										echo '';
									}else{ ?>
										<?= date("d-m-Y", strtotime($emp_Details['date_of_joining'])) ?>
								<?php } ?>
								
								</div>
							</div>
						</div>
					</div>

					<div class="row gutters-sm">
						<div class="col-sm-12 mb-3">
						<div class="card h-100">
							<div class="card-header">
								<div class="d-inline h5">Educational Qualification</div>
							</div> 
								<div class="card-body">
									<div class="row" >
										<div class="col-md-3">   
										<h6 class="col-sm-12">Qualification</h6>
										</div>
										<div class="col-md-3">
											<h6 class="col-sm-12">Institute/University</h6>
										</div>
										<div class="col-md-3">
											<h6 class="col-sm-12">Year of Passing</h6>
										</div>
										<div class="col-md-3">
											<h6 class="col-sm-12">Marks</h6>
										</div>
									</div>
									<?php $emp_education_query = $this->db->query("SELECT * FROM nbb_emp_education_qualification WHERE nbb_emp_education_qualification.emp_id = '".$emp_Details['id']."'");
									foreach($emp_education_query->result_array() as $emp_education_row){
									?>
									<div class="row">
										<div class="col-md-3">   	
											<h5 class="col-sm-12"><?= $emp_education_row['qualification'] ?></h5>	
										</div>
										<div class="col-md-3">
											<h5 class="col-sm-12"><?= $emp_education_row['institute_university'] ?></h5>	
										</div>
										<div class="col-md-3">   	
											<h5 class="col-sm-12"><?= $emp_education_row['year_of_passing'] ?></h5>	
										</div>
										<div class="col-md-3">
											<h5 class="col-sm-12"><?= $emp_education_row['marks'] ?></h5>	
										</div>
									</div>
									<?php } ?>
								</div>

								<div class="card-header">
									<div class="d-inline h5">Work Experience</div>
								</div> 
								<div class="card-body">
									<div class="row" >
										<div class="col-md-3">   
										<h6 class="col-sm-12">Company Name</h6>
										</div>
										<div class="col-md-3">
											<h6 class="col-sm-12">Work / Role</h6>
										</div>
										<div class="col-md-3">
											<h6 class="col-sm-12">Duration (form - to)</h6>
										</div>
									</div>
									<?php 
									$work_experience_query = $this->db->query("SELECT * FROM nbb_work_experience WHERE nbb_work_experience.emp_id = '".$emp_Details['id']."'");
									foreach($work_experience_query->result_array() as $work_experience_row){
									?>
									<div class="row">
										<div class="col-md-3">   	
											<h5 class="col-sm-12"><?= $work_experience_row['company_name'] ?></h5>	
										</div>
										<div class="col-md-3">
											<h5 class="col-sm-12"><?= $work_experience_row['work_role'] ?></h5>	
										</div>
										<div class="col-md-6">   	
											<h5 class="col-sm-12"><?= date("d/m/Y", strtotime($work_experience_row['form_date'])) ?>&nbsp;--&nbsp;<?= date("d/m/Y", strtotime($work_experience_row['to_date']))  ?></h5>	
										</div>
									</div>
									<?php } ?>
								</div>


							</div>
						</div>
					</div>

					</div>
				</div>
			
			</div>
		</div>
</div>


<style>

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
	</style>
