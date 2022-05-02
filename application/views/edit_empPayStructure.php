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
              
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/pay_Structure/post_add_empPay_Structure')?>" method="post" enctype="multipart/form-data">
				<h3> Salary Structure</h3>
					<div id="personal-details">
						<table width="100%">
							<tr>
								<td>Year</td>
								<td>
									<select name = "getyear" class="form-control">
									<option>Select Year</option> 
										<?php  $lasttenYear = (int)date("Y") - 20;
											$curyear = (int)date("Y");
											for($i=$lasttenYear; $i<= $curyear; $i++){?>
											<option value="<?php echo $i;?>"><?php echo $i;?></option>  
										<?php } ?>
									</select>
								</td>	
							</tr>
							<tr>
								<td>Dearness Allowance</td>
								<td>
									<input type="text" name="dearness_allowance" placeholder="DA (Don't use special character)" value ="" class="form-control">
								</td>
								<td>Provident Fund</td>
								<td>
									<input type="text" name="Provident_fund" value ="" placeholder="PF" class="form-control">
								</td>
							</tr>
							<tr>
								
								<td>Employees State Insurance</td>
								<td>
									<input type="text" name="employees_state_insurance" placeholder="ESI" value ="" class="form-control">
								</td>
								<td>Medical Allowance</td>
								<td>
									<input type="text" name="medical_allowance" placeholder="Medical Allowance" value="" class="form-control">
								</td>
							</tr>
							
							<tr>
								<td></td>
								<td>
								<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 130px;">
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

<style>	
	h3{
		background-color: #b8860b;
		color: white;
		padding: 6px;
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
</style>

	
	