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
			  <div class = "row">
					<?php 
					$product_img = '';
						foreach($product_image as $product_image_row){
							$product_img = $product_image_row['image'];
						
					?>
					
						<div class = "col-md-3 text-center" style="border: 1px solid #e3e3e3; padding:15px; box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);
	-webkit-box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);
	-moz-box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);"> 
						<a href="<?= base_url('admin/OrderManagement/viewProduct/'.$product_image_row['id']) ?> " target="_blank">
							<img src="<?= base_url('uploads/product_img/'.$product_img)?>" class = "img-fluid" style = "width: 200px;height: 200px; object-fit:cover;margin: 0 auto;" /> 
						</a>
						</div>
					
					<?php } ?>
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
 <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- this link for multiple selection-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<script>
	$(document).ready(function(){
		$(".productName").change(function(){
			var productID = $(this).val();
			alert('hgjh');
			$.ajax({
				url: '<?php echo base_url(); ?>admin/OrderManagement/productAvailableStock',
				type: 'post',
				data: {productID:productID},
				success:function(result){
					$( ".availableStock" ).html(result);
				}
			});
		});
	});

	$(".chosen-select").chosen({
		no_results_text: "Oops, nothing found!"
	})
</script>
