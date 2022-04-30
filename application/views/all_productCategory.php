<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Category</h1>
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
					<a href="<?=base_url('admin/productManagement/add_productCategory')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add Category</button></a>         
				</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($productCategory as $productCategoryrow): ?>
                      <tr>
                        <td><?= $productCategoryrow['id']?></td>
                        <td><?= $productCategoryrow['name']?></td>
                        <td><a href="<?= base_url('admin/productManagement/editproductCategory/'. $productCategoryrow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
                         <a href="<?= base_url('admin/productManagement/deleteProductCategory/'. $productCategoryrow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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
