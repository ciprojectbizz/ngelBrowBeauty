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
              <div class="card-header">
								<h5>Salary Details</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
							<?php foreach($employeeSalary as $employeeSalaryRow): ?>
								<div class="row">
										<div class="col-md-6">
										<h6 class="mb-0">Employee ID</h6>
										</div>
										<div class="col-md-6 text-secondary">
										<?= $employeeSalaryRow['emp_number'] ?>
										</div>
									</div>
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Designation</h6>
										</div>
										<div class="col-md-6 text-secondary">
										<?= $employeeSalaryRow['designation_name']?>
										</div>
									</div>
									
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Basic Pay</h6>
										</div>
										<div class="col-md-6 text-secondary">
										$<?= $employeeSalaryRow['basic_pay']?>
										</div>
									</div>
									
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Dearness Allowance(DA)</h6>
										</div>
										<div class="col-md-6 text-secondary">
										$<?= $employeeSalaryRow['dearness_allowance']?>
										</div>
									</div>
									
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Provident Fund</h6>
										</div>
										<div class="col-md-6 text-secondary">
										$<?= $employeeSalaryRow['Provident_fund']?>
										</div>
									</div>
									
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Employees State Insurance</h6>
										</div>
										<div class="col-md-6 text-secondary">
										$<?= $employeeSalaryRow['employees_state_insurance']?>
										</div>
									</div>
									
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Medical Allowance</h6>
										</div>
										<div class="col-md-6 text-secondary">
											$<?= $employeeSalaryRow['medical_allowance'] ?>
										</div>
									</div>
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Total Earning</h6>
										</div>
										<div class="col-md-6 text-secondary">
											$<?= $employeeSalaryRow['total_earning'] ?>
										</div>
									</div>
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Total Deduction</h6>
										</div>
										<div class="col-md-6 text-secondary">
										$<?= $employeeSalaryRow['total_deduction'] ?>
										</div>
									</div>
									<hr>
									<div class="row pt-3">
										<div class="col-md-6">
										<h6 class="mb-0">Net Pay</h6>
										</div>
										<div class="col-md-6 text-secondary">
										$<?= $employeeSalaryRow['net_pay'] ?>
										</div>
									</div>
				<?php endforeach; ?>
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
 