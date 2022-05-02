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
                <form id="add_promotion" action="<?= base_url('admin/employeeManagement/post_add_employeeSalary')?>" method="post" enctype="multipart/form-data">
				<h3>Employee Salary Registration</h3>
					<div id="personal-details">
						<table width="100%">
							<tr>
								<td>Employee Name</td>
								<td>
									<select name="employeeName" class="form-control">
										<option>Select Employee Name</option>
										<?php foreach($allemployees as $allemployeesnRow): ?>
										<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name']?></option>
										<?php endforeach; ?> 
									</select>
								</td>
								<td>Employee Designation</td>
								<td>
									<select name="designation" class="form-control">
										<option>Select Designation</option>
										<?php foreach($empDesignation as $empDesignationRow): ?>
										<option value="<?= $empDesignationRow['id']?>"><?= $empDesignationRow['designation_name']?></option>
										<?php endforeach; ?> 
									</select>
								</td>
							</tr>
							<tr>
								<td>Basic Pay</td>
								<td>
									<input type="text" name="basic_pay" placeholder="Basic Pay" value ="" id = "basic_pay" class="form-control" onkeyup ="calcSalary()">
								</td>
								<td>Dearness Allowance</td>
								<td>
									<input type="hidden" name="da" value ="<?= $lastpay_structure['dearness_Allowance']?>" id = "da">
									<input type="text" name="dearness_allowance" placeholder="Dearness Allowance" value ="" class="form-control" id = "dearness_allowance">
								</td>
							</tr>
							<tr>
								<td>Provident Fund</td>
								<td>
									<input type="hidden" name="pf" value ="<?= $lastpay_structure['provident_Fund']?>" id = "pf">
									<input type="text" name="Provident_fund" value ="" placeholder="Provident Fund" class="form-control" id = "Provident_fund">
								</td>
								<td>Employees State Insurance</td>
								<td>
									<input type="hidden" name="esi" value ="<?= $lastpay_structure['ESI']?>" id = "esi">
									<input type="text" name="employees_state_insurance" placeholder="Employees State Insurance" value ="" class="form-control" id="EmployeesStateInsurance">
								</td>
							</tr>
							
							<tr>
								<td>Medical Allowance</td>
								<td>
									<input type="hidden" name="ma" value ="<?= $lastpay_structure['medical_Allowance']?>" id = "ma">
									<input type="text" name="medical_allowance" placeholder="Medical Allowance" value="" class="form-control" id = "medical_allowance">
								</td>
								<td>Total Earning</td>
								<td>
									<input type="text" name="total_earning" placeholder="Total Earning" value="" class="form-control" id="total_earning">
								</td>
							</tr>
							<tr>
								<td>Net Pay</td>
								<td>
									<input type="text" name="net_pay" placeholder="Net Pay" value="" class="form-control" id="net_pay">
								</td>
								<td>Total Deduction</td>
								<td>
									<input type="text" name="total_deduction" placeholder="Total Deduction" value="" class="form-control" id="total_deduction" >
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
<script type = "text/javascript">
    function calcSalary(){

		const basic_pay = parseInt(document.getElementById('basic_pay').value);
		const da = document.getElementById("da").value;//   parseInt(document.getElementById('da').value);
		const pf = document.getElementById("pf").value;
		const esi = document.getElementById("esi").value;
		const ma = document.getElementById("ma").value;

		//alert(da);
		
		const DA = basic_pay * da;
		//const HRA = basic_pay * 0.5;
		const MA = basic_pay * ma;
		const GrandPay = basic_pay + DA;
        const PF = GrandPay * pf;
        const EmployeesStateInsurance = GrandPay * esi;
        const Deduction = EmployeesStateInsurance + PF;
        const NetPay = GrandPay - Deduction;

		//alert(NetPay);
		
		if(!isNaN(basic_pay)) {
			document.getElementById('dearness_allowance').value = DA;
			document.getElementById('Provident_fund').value = PF;
			document.getElementById('EmployeesStateInsurance').value = EmployeesStateInsurance;
			document.getElementById('medical_allowance').value = MA;
			document.getElementById('total_earning').value = GrandPay;
			document.getElementById('net_pay').value = NetPay;
			document.getElementById('total_deduction').value = Deduction;
		}
	}
</script>
	
	