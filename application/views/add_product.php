<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
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
                <form id="add_promotion" action="<?= base_url('admin/productManagement/post_add_product')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  	<div class="col-md-6">   
						<div class="form-group ">
							<label for="service_name" class="col-sm-6 control-label">Product Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_name" placeholder="Product Name Max Length : 150." value="" required>
							</div>
						</div>
                	</div>
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Category
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select class="form-control chosen chosen-select-deselect" name="product_category" data-placeholder="Select Product Category" required>
									<option>Select Product Category</option>
									<?php foreach($category as $category_row): ?>
									<option value="<?= $category_row['id']?>"><?= $category_row['name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div> 
                 	</div>
                </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="image" class="col-sm-6 control-label">Product SKU </label>
							<div class="col-sm-12">
							<input type="text" class="form-control" name="product_sku" placeholder="Product SKU Max Length : 50." required value="">
							</div>
						</div>
					</div>
                 	<div class="col-md-6"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> product Code
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_code" placeholder="Product Code Max Length : 50." value="">
							</div>
						</div> 
                 	</div>
                </div> 
                         
				<div class="form-group ">
                    <label for="Description" class="col-sm-2 control-label">Short Description</label>
					<div class="col-md-12">
						<textarea id="shortDescription" name="shortDescription" rows="4" cols="80" style = "width: 100%;"></textarea>
					</div>
                </div>  
				<div class="form-group ">
                    <label for="Description" class="col-sm-2 control-label">Description</label>
					<div class="col-md-12">
						<textarea id="description" name="description" rows="5" cols="80" style = "width: 100%;"></textarea>
					</div>
                </div>  
                <div class="row">       
					<div class="col-md-4">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Product Price
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="product_price" placeholder="Product Price Max" value="" required>
							</div>
						</div>        
					</div> 
					<div class="col-md-4">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Product Weight
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="product_weight" required placeholder="Product Price" value="">
							</div>
						</div>        
					</div> 
					<div class="col-md-4">                       
						<div class="form-group ">
							<label for="stock" class="col-sm-6 control-label">Stock <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="stock" required placeholder="Numder Of Product Available In Store" value="">
							</div>
						</div>
					</div>
                </div>   
               	<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Tag </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_tag" id="product_tag" placeholder="Product tag Max Length : 50." value="">
							</div>
						</div>                                
					</div> 
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
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Manufacturing Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="mfg_date" required placeholder="Manufacturing Date" value="">
							</div>
						</div>                                
					</div> 
					<div class="col-md-6">                              
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Expiry Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="expiry_date" required placeholder="Expiry Date" value="">
								<small class="info help-block">
								</small>
							</div>
						</div>
                  	</div>  
                </div>
                <div class="row">
					<div class="col-md-4">
						<div class="form-group ">
							<label for="image" class="col-sm-6 control-label">Product Image </label>
							<div class="col-sm-12">
								<div id="image"></div>
								<input type="file" name="productfiles[]" multiple required="">
								<small class="info help-block">
								</small>
							</div>
						</div>
					</div>
                 	
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
