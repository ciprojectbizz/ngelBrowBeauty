<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Edit</h1>
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
			<?php foreach($customerDataForEdit as $customerData){ ?>
				
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/welcome/post_edit_customer')?>" method="post" enctype="multipart/form-data">

					<input type="hidden" class="form-control" name="customerid" value="<?= $customerData['id']?>">
					<div class="col-md-6">
						<div class="circle">
							<img class="profile-pic img_profile" src="<?= base_url('uploads/profile_img/'.$customerData['profile_picture'])?>" width="150">
							<i class="fa fa-camera profile-pic-upload-button"></i>
						</div>
						<div class="p-image">
							<input class="file-upload" type="file" accept="image/*" name = "profile_picture" style="display:none">
						</div>
						<label for="first_name" class="control-label">Profile Photo </label>
					</div>
					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="first_name" class="col-sm-6 control-label">First Name 
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="first_name" id="first_name" value="<?= $customerData['first_name']?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="last_name" class="col-sm-6 control-label">Last Name
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="last_name" id="last_name" value="<?= $customerData['last_name']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="dob" class="col-sm-6 control-label">Date Of Birth </label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="dob" id="dob" value="<?= $customerData['dob']?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="age" class="col-sm-6 control-label">Age
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="age" id="age"  value="<?= $customerData['age']?>" readonly>
								</div>
							</div>
						</div>
                	</div>
                	<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="email" class="col-sm-6 control-label">Email
								</label>
								<div class="col-sm-12">
									<input type="email" class="form-control" name="email" id="email"  value="<?= $customerData['email']?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Contact Number
								</label>
								<div class="col-sm-12">
										<input type="text" class="form-control" name="contact" id="contact" value="<?= $customerData['contact']?>">
								</div>
							</div>
						</div>
                	</div>

					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="email" class="col-sm-6 control-label">Skin Conditions</label>
								<div class="col-sm-12">
									<select class="form-control chosen chosen-select" name="skin_conditions" data-placeholder="Select skin conditions">
										<option value=""></option>
										<option value="1"	<?php if($customerData['skin_conditions'] == 1){echo "Selected"; } ?>>Oily</option>
										<option value="2" <?php if($customerData['skin_conditions'] == 2){echo "Selected"; } ?>>Dry</option>
										<option value="3" <?php if($customerData['skin_conditions'] == 3){echo "Selected"; } ?>>Normal</option>
										<option value="4" <?php if($customerData['skin_conditions'] == 4){echo "Selected"; } ?>>Sensitive</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Profile Status
								</label>
								<div class="col-sm-12">
									<select  class="form-control chosen chosen-select" name="status" data-placeholder="Select Profile Status" >
										<option value=""></option>
										<option value="1" <?php if($customerData['status'] == 1){echo "Selected"; } ?>>Premium</option>
										<option value="2" <?php if($customerData['status'] == 2){echo "Selected"; } ?>>VIP</option>
									</select>
								</div>
							</div>
						</div>
                	</div>

					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="email" class="col-sm-6 control-label">Reference Name</label>
								<div class="col-sm-12">
									<select  class="form-control chosen chosen-select" name="reference_name" data-placeholder="Select Reference Name" >
										<option value="">Select Reference Name</option>
										<?php foreach($AdminUser as $AdminUser_row): ?>
									<option value="<?= $AdminUser_row['id']?>" <?php if($AdminUser_row['id'] == $customerData['reference_name']){ echo "Selected";} ?>><?= $AdminUser_row['first_name']?></option>
									<?php endforeach; ?> 
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Membership</label>
								<div class="col-sm-12">
									<select  class="form-control chosen chosen-select" name="membership" data-placeholder="Select Membership" >
										<option value="">Select Membership</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Address</label>
						<div class="col-md-12">
							<textarea id="address" name="address" rows="5" cols="80" style = "width: 100%;"><?= $customerData['address']?></textarea>
						</div>
					</div>  
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Medical Information
						</label>
						<div class="col-md-12">
							<textarea name="medical_information" rows="5" cols="80" style = "width: 100%;"><?= $customerData['medical_information']?></textarea>
						</div>
					</div> 
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Transactional Records</label>
						<div class="col-md-12">
							<textarea name="transactional_records" rows="5" cols="80" style = "width: 100%;"><?= $customerData['transactional_records']?></textarea>
						</div>
                  	</div>           
                      
                  <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              	</form>
              </div>
			  <?php } ?>
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
 <style>
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
		border-radius: 1000px !important;
		overflow: hidden;
		width: 122px;
		height: 122px;
		border: 8px solid rgba(255, 255, 255, 0.7);
		top: 10px;
		background-color:powderblue;
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#dob").change(function() {
    var dob = $('#dob').val();
    //console.log(dob);
    if(dob != ''){
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#age').val(age);
			}
    
  })

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
