<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Therapists</h1>
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
                <!--<a href="<?=base_url('admin/ServiceCategoryCtl/add_therapists')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add New Therapists </button></a>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="site-table" style="overflow: auto; height: 400px ">
								<table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
                    <th>Employee number </th>
                    <th>Employee Name</th>
										<th>Photo</th>
										<th>PAN Number</th>
                    <th>Date of birth</th>
                    <th>Contact No.</th>
										<th>Email</th>
                    <th>Gender</th>
										<th>Designation</th>
                    <th>Employee Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($therapist as $therapistRow): ?>
                      <tr>
                        <td><?= $therapistRow['emp_number']?></td>
												<td><?= $therapistRow['first_name'].' '.$therapistRow['last_name']?></td>	
												<td><img src="<?= base_url('uploads/emplyee_img/'.$therapistRow['employee_photo'])?>" width="50" height="50"></td>
                        <td><?= $therapistRow['pan_number']?></td>
                        <td><?= $therapistRow['date_of_birth']?></td>
                        <td><?= $therapistRow['mob_no']?></td>
												<td><?= $therapistRow['email']?></td>
                        <td><?= $therapistRow['gender']?></td>
                        <td><?= $therapistRow['designation_name'] ?></td>
												<td><?= $therapistRow['jobtype'] ?></td>
                        <td>
													<a href="<?= base_url('admin/EmployeeManagement/viewEmployeeDetails/'.$therapistRow['id'])?>" class="btn btn-default" target="_blank" title="View" style="color:#b8860b"><i class="fa fa-eye" aria-hidden="true"></i></a>
													<a href="<?= base_url('admin/EmployeeManagement/empArchive/'.$therapistRow['id'])?>" onclick="return confirm('Are you sure you want to Archive this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-user-times" aria-hidden="true"></i></a>
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
