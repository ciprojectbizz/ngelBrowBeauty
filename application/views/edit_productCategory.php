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
              <?php foreach($productCategoryDataEdit as $productCategoryrow){ ?>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_category" action="<?= base_url('admin/productManagement/post_edit_productCategory')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="categoryid" id="categoryid" value="<?= $productCategoryrow['id'];?>">
                <div class="row">
                  <div class="col-md-6">             
                <div class="form-group ">
                    <label for="name" class="col-sm-6 control-label">Category Name <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name Max Length : 100." value="<?= $productCategoryrow['name'];?>">
                    </div>
                </div>
                </div>
                <div class="row">     
					<div class="col-md-6">                       
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Status 
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select" name="status" id="status" data-placeholder="Select Status" >
									<option value="0" <?php if($productCategoryrow['status'] == 0){ echo 'selected'; }?>>Inactive</option>
									<option value="1" <?php if($productCategoryrow['status'] == 1){ echo 'selected'; }?>>Active</option>
								</select>
								<small class="info help-block">
								</small>
							</div>
						</div>
					</div>  
                </div>                                        
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
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
