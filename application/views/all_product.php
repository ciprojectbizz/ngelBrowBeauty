<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Management</h1>
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
								
                <a href="<?=base_url('admin/ProductManagement/add_product')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add New Product </button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 250px ">
                <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b">
                  <tr>
                    <th>SKU </th>
                    <th>Product Name</th>
					<th>Image</th>
                    <th>Category</th>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Short Description</th>
                    <th>Price</th>
					<th>Weight</th>
                    <th>Total Stock</th>
					<th>Available stock</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($product as $productRow): ?>
                      <tr>
                        <td><?= $productRow['sku']?></td>
						<td>
							<?php if($productRow['available_stock'] < 10 ){?>
							<a href="#" data-toggle="tooltip" data-placement="top" title="The available stock of <?= $productRow['name']?> product is less than <?= $productRow['available_stock'] ?>!"><i class="fa fa-question-circle" style="font-size:20px;color:red;" data-tip="tip-first"></i></a>
							
							<?php }else{} ?>
							<?= $productRow['name']?></td>
						<?php $nbb_product_image_sql = $this->db->query("SELECT nbb_product_image.image AS product_image
						FROM nbb_product_image 
						WHERE nbb_product_image.product_id = '".$productRow['id']."' ORDER BY id DESC LIMIT 1");
						foreach($nbb_product_image_sql->result_array() as $product_image_row){ 
						?>
                        <td><img src="<?= base_url('uploads/product_img/'.$product_image_row['product_image'])?>" width="40" height="40"></td>
						<?php } ?>
                        <td><?= $productRow['category_name']?></td>
                        <td><?= $productRow['product_code']?></td>
                        <td><?= $productRow['description']?></td>
                        <td><?= $productRow['short_description']?></td>
                        <td><?= $productRow['price']?></td>
                        <td><?= $productRow['weight']?></td>
                        <td><?= $productRow['stock'] ?></td>
						<td><?= $productRow['available_stock'] ?></td>
						<td><?= $productRow['tags']?></td>
                        <td><?php if($productRow['status'] == 1)
						{
							echo 'Active';
						}else{
							echo 'Inactive';
						} ?></td>
                        <td>
						<a href="<?= base_url('admin/productManagement/editProduct/'.$productRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
						<a href="<?= base_url('admin/productManagement/deleteProduct/'.$productRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a></td>
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
