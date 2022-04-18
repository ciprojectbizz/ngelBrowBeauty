<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Service</h1>
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
                <form id="add_promotion" action="<?= base_url('admin/ServiceCategoryCtl/post_add_service')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">   
									<div class="form-group ">
											<label for="service_name" class="col-sm-6 control-label">Service Name <i class="required">*</i>
											</label>
											<div class="col-sm-12">
													<input type="text" class="form-control" name="service_name" id="service_name" placeholder="Service Name Max Length : 150." value="">
											</div>
									</div>
									</div>
									<div class="col-md-6"> 
									<div class="form-group ">
											<label for="category" class="col-sm-6 control-label">Service Category
											<i class="required">*</i>
											</label>
												<div class="col-sm-12">
														<select  class="form-control chosen chosen-select-deselect" name="service_category" id="category" data-placeholder="Select Service Category" >
															<option>Select Service Category</option>
													<?php foreach($category as $categorys): ?>
													<option value="<?= $categorys['id']?>"><?= $categorys['category_name']?></option>
												<?php endforeach; ?> 
														</select>
												</div>
									</div> 
                 </div>
                </div>
                <div class="row">
                
                <div class="form-group ">
                      <label for="Description" class="col-sm-2 control-label">Description
                      </label>
                        <div class="col-md-12">
                            <textarea id="description" name="description" rows="5" cols="80" style = "width: 100%;"></textarea>
                        </div>
                  </div>  
                
                 </div>         
                 
                 <div class="row">       
                 
                <div class="col-md-6">      
                <div class="form-group ">
                    <label for="service_price" class="col-sm-6 control-label">Service Price
                    <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="service_price" id="service_price" placeholder="Service Price Max Length : 50." value="">
                    </div>
                </div>        
                </div> 
                <div class="col-md-6">                       
                <div class="form-group ">
                      <label for="duration" class="col-sm-6 control-label">Duration 
                      </label>
                      <div class="col-sm-12">
                          <select  class="form-control chosen chosen-select" name="duration" id="duration" data-placeholder="Select Duration" >
                              <option value=""></option>
                              <option value="30">30 minutes</option>
                              <option value="60">60 minutes</option>
                              <option value="90">90 minutes</option>
                              <option value="120">120 minutes</option>
                              </select>
                      </div>
                </div>
                </div>
                </div>   
               <div class="row">
                 <div class="col-md-6">
                <div class="form-group ">
                        <label for="therapist_commission" class="col-sm-6 control-label">Therapist Commission 
                        </label>
                        <div class="col-sm-12">
                            <select  class="form-control chosen chosen-select" name="therapist_commission" id="therapist_commission" data-placeholder="Select Therapist Commission" >
                                <option>Select Commission Type</option>
                                <option value="fixed">Fixed</option>
                                <option value="percentage">Percentage</option>
                                </select>
                            <small class="info help-block">
                            </small>
                        </div>
                </div>                                
                </div> 
                <div class="col-md-6">                              
                <div class="form-group ">
                  <label for="amount" class="col-sm-6 control-label">Commission Amount
                  </label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
                  </div>
                </div>
                </div>  
                </div> 
                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group ">
                        <label for="priority" class="col-sm-6 control-label">Priority 
                        </label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" name="priority" id="priority" placeholder="Priority" value="">
                              <small class="info help-block">
                              </small>
                          </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group ">
                        <label for="loyalty_points" class="col-sm-6 control-label">Loyalty Points
                        </label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" name="loyalty_points" id="loyalty_points" placeholder="Loyalty Points" value="">
                              <small class="info help-block">
                              </small>
                          </div>
                  </div>
                  </div>
                  <div class="col-md-4">                              
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
									<div class="col-md-4">
										<div class="form-group ">
											<label for="image" class="col-sm-6 control-label">Service Icon 
											</label>
												<div class="col-sm-12">
														<div id="image"></div>
														<input type="file" name="files[]" multiple required="">
														<small class="info help-block">
														</small>
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
