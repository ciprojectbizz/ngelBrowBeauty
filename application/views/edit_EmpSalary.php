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
                <form id="add_promotion" action="<?= base_url('admin/employeeManagement/post_edit_employeeSalary')?>" method="post" enctype="multipart/form-data">
				<h3>Employee Salary Edit</h3>
					<div id="personal-details">
						<?php foreach($empSalary as $empSalaryRow){ ?>
							<input type="hidden" name="empSalaryid" value ="<?= $empSalaryRow['id'] ?>" class="form-control">
						<table width="100%">
							<tr>
								<td>Employee Name</td>
								<td>
									<select name="employeeName" class="form-control">
										<option>Select Employee Name</option>
										<?php foreach($allemployees as $allemployeesnRow): ?>
										<option value="<?= $allemployeesnRow['id']?>"<?php if($allemployeesnRow['id'] == $empSalaryRow['emp_id']){echo 'Selected';}?>><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name']?></option>
										<?php endforeach; ?> 
									</select>
								</td>
								<td>Employee Designation</td>
								<td>
									<select name="designation" class="form-control">
										<option>Select Designation</option>
										<?php foreach($empDesignation as $empDesignationRow): ?>
										<option value="<?= $empDesignationRow['id']?>"<?php if($empDesignationRow['id'] == $empSalaryRow['dept_id']){echo 'Selected';}?>><?= $empDesignationRow['designation_name']?></option>
										<?php endforeach; ?> 
									</select>
								</td>
							</tr>
							<tr>
								<td>Basic Pay</td>
								<td>
									<input type="text" name="basic_pay" placeholder="Basic Pay" value ="<?= $empSalaryRow['basic_pay'] ?>" id = "basic_pay" class="form-control" onkeyup ="calcSalary()">
								</td>
								<td>Dearness Allowance</td>
								<td>
									<input type="text" name="dearness_allowance" placeholder="Dearness Allowance" value ="<?= $empSalaryRow['dearness_allowance'] ?>" class="form-control" id = "dearness_allowance">
								</td>
							</tr>
							<tr>
								<td>Provident Fund</td>
								<td>
									<input type="text" name="Provident_fund" value ="<?= $empSalaryRow['Provident_fund'] ?>" placeholder="Provident Fund" class="form-control" id = "Provident_fund">
								</td>
								<td>Employees State Insurance</td>
								<td>
									<input type="text" name="employees_state_insurance" placeholder="Employees State Insurance" value ="<?= $empSalaryRow['employees_state_insurance'] ?>" class="form-control" id="esi">
								</td>
							</tr>
							
							<tr>
								<td>Medical Allowance</td>
								<td>
									<input type="text" name="medical_allowance" placeholder="Medical Allowance" value="<?= $empSalaryRow['medical_allowance'] ?>" class="form-control" id = "medical_allowance">
								</td>
								<td>Total Earning</td>
								<td>
									<input type="text" name="total_earning" placeholder="Total Earning" value="<?= $empSalaryRow['total_earning'] ?>" class="form-control" id="total_earning">
								</td>
							</tr>
							<tr>
								<td>Net Pay</td>
								<td>
									<input type="text" name="net_pay" placeholder="Net Pay" value="<?= $empSalaryRow['net_pay'] ?>" class="form-control" id="net_pay">
								</td>
								<td>Total Deduction</td>
								<td>
									<input type="text" name="total_deduction" placeholder="Total Deduction" value="<?= $empSalaryRow['total_deduction'] ?>" class="form-control" id="total_deduction" >
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
								<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 130px;">
								</td>
								
							</tr>
						</table>
						<?php } ?>
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
<script type = "text/javascript">
    function calcSalary(){

		const basic_pay = parseInt(document.getElementById('basic_pay').value);
		//alert(basic_pay);
		
		/*const price = parseInt(document.getElementById('dearness_allowance').value);
		const available_stock = parseInt(document.getElementById('available_stock_').value);*/

		const DA = basic_pay * 0.10;
		const HRA = basic_pay * 0.5;
		const MA = basic_pay * 0.02;
		const GP = basic_pay + DA + HRA;
        const PF = GP * 0.02;
        const Tax = GP * 0.01;
        const Deduction = Tax + PF;
        const NetPay = GP - Deduction;
		//alert(GP);
		//const result2 = available_stock - quantity;

		if(!isNaN(basic_pay)) {
			document.getElementById('dearness_allowance').value = DA;
			document.getElementById('Provident_fund').value = PF;
			document.getElementById('esi').value = Tax;
			document.getElementById('medical_allowance').value = MA;
			document.getElementById('total_earning').value = GP;
			document.getElementById('net_pay').value = NetPay;
			document.getElementById('total_deduction').value = Deduction;
		}
	}
</script>
	
	