<div class="content-wrapper">
    <!-- Content Header (Page header) -->   
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Category</h1><small>New Service Category</small>
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
                <form id="add_category" action="<?= base_url('admin/productManagement/post_add_productCategory')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">             
                    <div class="form-group ">
                        <label for="name" class="col-sm-6 control-label">Category Name <i class="required">*</i>
                        </label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name Max Length : 100." value="">
                        </div>
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
                            <option value=""></option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
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
