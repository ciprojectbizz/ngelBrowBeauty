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
			<?php foreach($productDataEdit as $productData){ ?>
				
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/productManagement/post_edit_product')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="product_id" id="product_id" value="<?= $productData['id'] ?>">
                <div class="row">
                  	<div class="col-md-6">   
						<div class="form-group ">
							<label for="service_name" class="col-sm-6 control-label">Product Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name Max Length : 150." value="<?= $productData['name'] ?>">
							</div>
						</div>
                	</div>
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Category
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select class="form-control chosen chosen-select-deselect" name="product_category" id="product_category" data-placeholder="Select Product Category" >
									<option>Select Product Category</option>
									<?php foreach($category as $category_row): ?>
									<option value="<?= $category_row['id']?>"<?php if($productData['categorie_id'] == $category_row['id']){ echo "Selected";} ?>><?= $category_row['name']?></option>
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
							<input type="text" class="form-control" name="product_sku" id="product_sku" placeholder="Product SKU Max Length : 50." value="<?= $productData['sku'] ?>">
							</div>
						</div>
					</div>
                 	<div class="col-md-6"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> product Code
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_code" id="product_code" placeholder="Product Code Max Length : 50." value="<?= $productData['product_code'] ?>">
							</div>
						</div> 
                 	</div>
                </div> 
                        
                <div class="form-group ">
                    <label for="Description" class="col-md-12 control-label">Description</label>
					<div class="col-md-12">
						<textarea id="description" name="description" rows="5" cols="80" style="width: 100%"><?= $productData['description'] ?></textarea>
					</div>
                </div>  
				<div class="form-group ">
                    <label for="Description" class="col-md-12 control-label">Short Description</label>
					<div class="col-md-12">
						<textarea id="shortDescription" name="shortDescription" rows="5" cols="80" style="width: 100%"><?= $productData['short_description'] ?></textarea>
					</div>
                </div>  
                <div class="row">       
					<div class="col-md-6">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Product Price
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="product_price" id="product_price" placeholder="Product Price Max Length : 50." value="<?= $productData['price'] ?>">
							</div>
						</div>        
					</div> 
					<div class="col-md-6">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Product Weight
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_weight" id="product_weight" placeholder="Product Weight Max Length : 50." value="<?= $productData['weight'] ?>">
							</div>
						</div>        
					</div> 
                </div>   
               	<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Tag </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_tag" id="product_tag" placeholder="Product Tag Max Length : 50." value="<?= $productData['tags'] ?>">
							</div>
						</div>                                
					</div>  
                </div> 
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Manufacturing Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="mfg_date" id="mfg_date" placeholder="Manufacturing Date" value="<?= $productData['mfg_date'] ?>">
							</div>
						</div>                                
					</div> 
					<div class="col-md-6">                              
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Expiry Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="expiry_date" id="expiry_date" placeholder="Expiry Date" value="<?= $productData['expiry_date'] ?>">
								<small class="info help-block">
								</small>
							</div>
						</div>
                  	</div>  
                </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="image" class="col-sm-6 control-label">Product Image </label>
							<div class="col-sm-12">
								<div id="image"></div>
								<input type="file" name="productfiles[]" multiple>
								<small class="info help-block">
								</small>
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
									<option value="0" <?php if($productData['status'] == 0){ echo "Selected";} ?>>Inactive</option>
									<option value="1" <?php if($productData['status'] == 1){ echo "Selected";} ?>>Active</option>
								</select>
								<small class="info help-block">
								</small>
							</div>
						</div>
                  	</div> 
                </div>                              
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
              </div>
			  <?php } ?>
              <!-- /.card-body -->
			  <div class = "row">
				<?php $productId = $this->uri->segment(4);
					$nbb_product_image_sql = $this->db->query("SELECT nbb_product_image.id,
					nbb_product_image.image AS product_image,
					nbb_product.name AS p_name
					FROM nbb_product_image 
					LEFT JOIN nbb_product ON nbb_product.id = nbb_product_image.product_id
					WHERE nbb_product_image.product_id = '".$productId."' ORDER BY nbb_product_image.id DESC");
					$image_id = ''; 
					$product_image = '';
					foreach($nbb_product_image_sql->result_array() as $product_image_row){
						$image_id = $product_image_row['id']; 
						$product_image = $product_image_row['product_image'];
				?>
						<div class = "col-md-3 text-center productimg_row_<?= $image_id; ?>" style="border: 1px solid #e3e3e3; padding:15px; box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);
	-webkit-box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);
	-moz-box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);"> 
							<img src="<?= base_url('uploads/product_img/'.$product_image)?>" class = "img-fluid" style = "width: 200px;height: 200px; object-fit:cover;margin: 0 auto;" /> 

							<a class="remove-image deleteproductimgrow" data-image_id="<?php echo $image_id; ?>" data-product_image="<?php echo $product_image; ?>" href="javascript:void(0)" style="display: inline;position: absolute;right: 30px;font-size: 30px;color: red;">&#215;</a>
						</div>
					<?php } ?>
				</div>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$(".deleteproductimgrow").click(function() {
			var element = $(this);
			var imageID= $(this).data('image_id');

			var productimage= $(this).data('product_image');
		if(confirm("Are you sure you want to delete this?"))
		{
		 $.ajax({
		   type: "POST",
		   url: "<?php echo base_url(); ?>admin/ProductManagement/delete_productImage",
		   data: {id: imageID, productimage: productimage},
		   success: function(){
		 }
		});
			
			$(element).closest(".productimg_row_"+imageID).css('color','red'); 
			$(element).closest(".productimg_row_"+imageID).fadeOut(2000); 
			alert("Record deleted successfully");
		    
		}
		return false;
		});
	});	
</script>
