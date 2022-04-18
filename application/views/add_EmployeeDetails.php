<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <h1>Employee Management</h1>
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
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/employeeManagement/post_add_emp_details')?>" method="post" enctype="multipart/form-data">
				<h1 align="center">Employee Registration Form</h1>
					<div id="personal-details">
					<h3 align="center">Personal Deatils</h3>

						<table width="100%">
							<tr>
								<td>Photo</td>
								<td>
								<div class="col-md-6">
									<div class="circle">
										<img class="profile-pic img_profile" src="/uploads/profile/" style="width:150px">
										<i class="fa fa-camera profile-pic-upload-button"></i>
									</div>
									<div class="p-image">
										<input class="file-upload" type="file" accept="image/*" name = "emp_picture" style="display:none">
									</div>
								</div>
								</td>
								<td>First Name</td>
								<td>
									<input type="text" name="first_name" placeholder="First Name" value ="" class="form-control">
								</td>
								<td>Last Name</td>
								<td>
									<input type="text" name="last_name" placeholder="Last Name" value ="" class="form-control">
								</td>
							</tr>
							<tr>
								<td>Mobile Number</td>
								<td>
									<input type="text" name="mobile_number" placeholder="Mobile Number" value="" class="form-control">
								</td>
								<td>Email Id</td>
								<td>
									<input type="text" name="email" placeholder="your id@gmail.com" value="" class="form-control"  autocomplete="off">
								</td>
								<td>Password</td>
								<td>
									<input type="Password" name="password" placeholder="Password" value="" class="form-control"  autocomplete="off">
								</td>
							</tr>
							<tr>
								<td>Father's Name</td>
								<td>
									<input type="text" name="father_name" placeholder="Father's Name" value ="" class="form-control">
								</td>
								<td>Mother's Name</td>
								<td>
									<input type="text" name="mother_name" placeholder="Mother's Name" value ="" class="form-control">
								</td>
							</tr>
							<tr>
								<td>Date of Birth</td>
								<td>
									<input type="date" name="dob" value =""class="form-control">
								</td>
								<td>Husband Name</td>
								<td>
									<input type="text" name="husband_name" placeholder="Husband Name" value =""class="form-control">
								</td>
							</tr>
							<tr>
								<td colspan="1">Select Gender</td>
								<td>
									<input type="radio" name="gender" value="Male" ><label for="Male">Male </label>
								</td>
								<td>
									<input type="radio" name="gender" value="Female" ><label for="Female">Female </label>
								</td>
								<td>
									<input type="radio" name="gender" value="Others" ><label for="Others">Others </label>
								</td>
							</tr>
							<tr>
								<td>Contact Details</td>
							</tr>
							<tr>
								<td>Aadhar Number</td>
								<td>
									<input type="text" name="aadhar_number" placeholder="Aadhar Number" value="" class="form-control" >
								</td>
								<td>Pan Card Number</td>
								<td>
									<input type="text" name="pan_number" placeholder="Pan Card Number" value="" class="form-control" >
								</td>
							</tr>
						</table>
					</div>
					
					<!-- Address Details -->
					<div id="address-details">
					<h3>Address Details</h3>
						<table width="100%">
							<tr>
								<td>State</td>
								<td>
									<input type="text" name="state" value ="" class="form-control">
								</td>
								<td>City</td>
								<td>
									<input type="text" name="city" value="" class="form-control">
								</td>
								<td>Land mark</td>
								<td>
									<input type="text" name="land_mark" value="" class="form-control">
								</td>
								<td>Pin Code</td>
								<td>
									<input type="text" name="pin_code" value="" class="form-control" class="form-control" >
								</td>
							</tr>
							
							<tr>
								<td>Full Address</td>
								<td>
									<textarea name="full_address" rows="2" cols="80" style = "width: 100%;" class="form-control" class="form-control" ></textarea>
								</td>
							</tr>
							
						</table>
						<br><br>
					</div>
					
					
					<!-- Educational Qualification -->
					<div id="educational-qualification">
						<h3> Educational Qualification</h3>

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
								<h6 class="col-sm-12">Marks (%)</h6>
							</div>
						</div>
						<div class="showAddMoreQualification">
							<div class="row">
								<div class="col-md-3">   	
									<input type="text" name="qualification[]"  value="" class="form-control" >	
								</div>
								<div class="col-md-3">
									<input type="text" name="institute_university[]" value="" class="form-control" >
								</div>
								<div class="col-md-3">   	
									<input type="text" name="year_of_passing[]" value="" class="form-control" >	
								</div>
								<div class="col-md-3">
									<input type="text" name="marks[]" value="" class="form-control" >
								</div>
							</div>
						</div>
						<br>
						<div class="text-center">
							<button type="button" value="Add More Qualification" class="btn btn-primary btn-custom AddMoreQualification">Add More Qualification</button>
						</div>
						<br>
						
					</div>
					
					<!-- Work Experience -->
					<div id="work-experience">
						<h3>Work Experience</h3>
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
							<div class="col-md-3">
								
							</div>
						</div>
						<div class="showAddMoreWorkExperience">
							<div class="row">
								<div class="col-md-3">   	
									<input type="text" name="company_name[]"  value=""class="form-control">	
								</div>
								<div class="col-md-3">
									<input type="text" name="work[]" value="" class="form-control">
								</div>
								<div class="col-md-3">   	
									<input type="date" name="form_date[]" value="" class="form-control">	
								</div>
								<div class="col-md-3"> 
									<input type="date" name="to_date[]" value="" class="form-control">
								</div>
							</div>
						</div>
						<br>
						<div class="text-center">
							<button type="button" value="Add More Work Experience" class="btn btn-primary btn-custom AddMoreWorkExperience">Add More Work Experience</button>
						</div>
						<br>
						
					</div>
					
					<!-- Other Details -->
					<div id="other-details">
					<h3>Other Details</h3>
						<table width="100%">
							<tr>
								<td>Job Type</td>
								<td>
									<input type="radio" name="jobtype" value="part_time" >Part Time
								</td>
								<td>
									<input type="radio" name="jobtype" value="full_time">Full Time
								</td>
								<td>
									<input type="radio" name="jobtype" value="contrect" >Contrect
								</td>
							</tr>
							<tr>
								<td>Date Of Joining</td>
								<td>
									<input type="date" name = "date_of_joining" value="" class="form-control">
								</td>
								<td>Designation</td>
								<td>
									<select name="designation" class="form-control">
										<option>Select Designation</option>
										<?php foreach($empDesignation as $empDesignationRow): ?>
										<option value="<?= $empDesignationRow['id']?>"><?= $empDesignationRow['designation_name']?></option>
										<?php endforeach; ?> 
									</select>
								</td>
							<tr>
								<td colspan="1">Willing to relocate</td>
								<td>
									<input type="radio" name="relocate" value="1"><label>Yes</label>
								</td>
								<td>
									<input type="radio" name="relocate" value="0"><label>No</label>
								</td>
							</tr>

							<tr>
								<td></td>
								<td>
								<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
								</td>
								<td>
									<input type="Reset" value="Reset" class="btn btn-primary btn-custom">
								</td>
								<td></td>
							</tr>
						</table>
					</div>
				
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$('.AddMoreQualification').click(function() {
		  var qualification_text =' <br><div class="row"><div class="col-md-3"><input type="text" name="qualification[]" class="form-control" value=""></div><div class="col-md-3"><input type="text" class="form-control" name="institute_university[]" value=""></div><div class="col-md-3"><input type="text" class="form-control" name="year_of_passing[]" value=""></div><div class="col-md-3"><input type="text" class="form-control" name="marks[]" value=""></div></div>';
		  $('.showAddMoreQualification').append(qualification_text);
		});
		$('.AddMoreWorkExperience').click(function() {
		  var experience_text =' <br><div class="row"><div class="col-md-3"><input type="text" class="form-control" name="company_name[]" value=""></div><div class="col-md-3"><input type="text" class="form-control" name="work[]" value=""></div><div class="col-md-3"><input type="date" class="form-control" name="form_date[]" value=""></div><div class="col-md-3"><input type="date" class="form-control" name="to_date[]" value=""></div></div>';
		  $('.showAddMoreWorkExperience').append(experience_text);
		});
		//for avtar
	$(document).ready(function() { 
		var readURL = function(input) {
					if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
									$('.profile-pic').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
					}
			}
			$(".file-upload").on('change', function(){
					readURL(this);
			});
			$(".profile-pic-upload-button").on('click', function() {
				$(".file-upload").click();
			});
	});
	</script>
	<style>
		
		h3{
			background-color: #b8860b;
			color: white;
			padding: 8px;
			text-align: left;
			border-radius: 10px;
			padding-left: 10px;
		}
		td{
			padding: 7px;
		}
		
		.button{
			background-color: #b8860b;
			color:#fff;
			border: none;
			padding: 10px 15px;
		}
		
		.button:hover {
			cursor: pointer;
			box-shadow: 5px 5px 5px;
		}
	/* for avtar */
	.profile-pic {
		max-width: 500px;
		max-height: 500px;
		display: block;
		}

		.file-upload {
			display: none;
		}	
	.circle {
		top: 10px;
		background-color:#C8C8C8;
		overflow: hidden;
		border-radius: 4px;
  		padding: 5px;
		width: 100px;
    	height: 100px;
	}
	.img_profile {
		max-width: 100%;
		height: 100%;
	}
	.p-image {
	  position: absolute;
	  top: 95px;
	  right: 230px;
	  color: #666666;
	  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
	}
	.p-image:hover {
	  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
	}
	.profile-pic-upload-button {
	  font-size: 1.5em;
	  position: absolute;
	  top: 13%;
	}

	.profile-pic-upload-button:hover {
	  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
	  color: #999;
	}
	</style>

	
	