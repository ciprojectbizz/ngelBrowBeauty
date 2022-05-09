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
              
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/employeeManagement/post_add_empHoliday')?>" method="post" enctype="multipart/form-data">
				<h3> Employee Holidays List</h3>
					<div id="personal-details">
						<div class="row p-3" >
							<div class="col-md-4">   
								<h6 class="col-sm-12">Holiday Year</h6>
							</div>
							<div class="col-md-4">   
								<select name = "getyear" class="form-control">
									<option>Select Year</option> 
									<?php  $lasttenYear = (int)date("Y") - 20;
										$curyear = (int)date("Y");
										for($i=$lasttenYear; $i<= $curyear; $i++){?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>  
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					
					
					<!-- Educational Qualification -->
					<div id="educational-qualification">
						
						<div class="row p-2" >
							<div class="col-md-4">   
								<h6 class="col-sm-12">Date</h6>
							</div>
							<div class="col-md-4">
								<h6 class="col-sm-12">Day</h6>
							</div>
							<div class="col-md-4">
								<h6 class="col-sm-12">Holidays</h6>
							</div>
						</div>
						<div class="showAddMoreQualification">
							<div class="row  p-2">
								<div class="col-md-4">   	
									<input type="text" name="holidayDate[]"  value="" class="form-control" >	
								</div>
								<div class="col-md-4">
									<select class="form-control" name="holidayDay[]">
										<option>Select Day<option>
										<option value="Sunday">Sunday<option>
										<option value="Monday">Monday<option>
										<option value="Tuesday">Tuesday<option>
										<option value="Wednesday">Wednesday<option>
										<option value="Thursday">Thursday<option>
										<option value="Friday">Friday<option>
										<option value="Saturday">Saturday<option>
									<select>
								</div>
								<div class="col-md-4">   	
									<input type="text" name="holidays[]" value="" class="form-control" >	
								</div>
							</div>
						</div>
						<br>
						<div class="text-center">
							<button type="button" value="Add More Qualification" class="btn btn-primary btn-custom AddMoreQualification">Add More Holidays</button>
						</div>
						<br>
						
					</div>
				<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
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
		  var qualification_text =' <br><div class="row p-2"><div class="col-md-4"><input type="text" name="holidayDate[]" class="form-control" value=""></div><div class="col-md-4"><select class="form-control" name="holidayDay[]"><option>Select Day<option><option value="Sunday">Sunday<option><option value="Monday">Monday<option><option value="Tuesday">Tuesday<option><option value="Wednesday">Wednesday<option><option value="Thursday">Thursday<option><option value="Friday">Friday<option><option value="Saturday">Saturday<option><select></div><div class="col-md-4"><input type="text" class="form-control" name="holidays[]" value=""></div></div>';
		  $('.showAddMoreQualification').append(qualification_text);
		});
		
	</script>
	<style>
		
		h3{
			background-color: #b8860b;
			color: white;
			padding: 5px;
			text-align: left;
			border-radius: 5px;
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
	
	</style>

	
	