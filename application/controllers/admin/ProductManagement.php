<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('Zend');
		//$this->db2 = $this->load->database('database2', TRUE);

	}
	public function all_productcategory()
    {
       
       $data['productCategory'] = $this->ProductManagement->getAllProductCategory();

       $this->layout->view('all_productCategory',$data); 
    }
	public function add_productCategory(){
        if(empty($this->session->has_userdata('id'))){
         redirect('admin');
       }
        $data['name'] = $this->session->userdata('name');
        
        $this->layout->view('add_productCategory',$data);
    }
	public function post_add_productCategory(){
		
		$data = array(
			'name' => $this->input->post('name'),
			'status' => $this->input->post('status'));

			if(!empty($data))
			{
				$insert = $this->ProductManagement->insert_productCategory($data); 
				if($insert==true)
				{
					redirect('productcategory');
				}
				else
				{
					$errorUploadType = 'Some problem occurred, please try again.';
				}                   
			}      
					  
	}
	public function editproductCategory(){
		if(empty($this->session->has_userdata('id'))){
		  redirect('admin');
		}
		$CategoryId = $this->uri->segment(4);
		$data['productCategoryDataEdit'] = $this->ProductManagement->getProductCategoryData($CategoryId);
		$this->layout->view('edit_productCategory',$data);
   	}
   public function post_edit_productCategory(){

		if(empty($this->session->has_userdata('id'))){
		redirect('admin');
		}
		
		$categoryid = $this->input->post('categoryid');
		$data = array(
			'name' => $this->input->post('name'),
			'status' => $this->input->post('status'));

		  $result=$this->Main->update('id',$categoryid, $data,'nbb_product_category');
		  if($result==true)
			{
				redirect('admin/productManagement/editproductCategory/'. $categoryid);
			}
		  else
			{
				$errorUploadType = 'Some problem occurred, please try again.';
			}  
	} 
	public function deleteProductCategory()
    {
       if($this->session->has_userdata('id')!=false)
       {
           $categoryId=$this->uri->segment(4);
           $result=$this->Main->delete('id',$categoryId,'nbb_product_category');
           if($result==true)
           {
               redirect('productcategory');
           }
           else
           {
               redirect('productcategory');
           }
       }
    }
	public function all_product()
    {
       
       $data['product'] = $this->ProductManagement->getAllProduct();
       $this->layout->view('all_product',$data); 
    }
	public function add_product(){
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
			}
		   $data['name'] = $this->session->userdata('name');
		   $data['category'] = $this->ProductManagement->getAllProductCategory();
		   
		   $this->layout->view('add_product',$data);
	}
	public function post_add_product()
	{
	  $errorUploadType = "";
	  $statusMsg = "";

		$product_data = array(
			'categorie_id' => $this->input->post('product_category'),
			'sku' => $this->input->post('product_sku'),
			'name' => $this->input->post('product_name'),
			'product_code' => $this->input->post('product_code'),
			'description' => $this->input->post('description'),
			'short_description' => $this->input->post('shortDescription'),
			'tags' => $this->input->post('product_tag'),
			'weight' => $this->input->post('product_weight'),
			'price' => $this->input->post('product_price'),
			'stock' => $this->input->post('stock'),
			'available_stock' => $this->input->post('stock'),
			'mfg_date' => $this->input->post('mfg_date'),
			'expiry_date' => $this->input->post('expiry_date'),
			'status' =>$this->input->post('status')
			);
			$this->db->insert('nbb_product',$product_data); 
			$insert_id = $this->db->insert_id();
			
			$this->load->library('upload');
		$image = array();
		$ImageCount = count($_FILES['productfiles']['name']);
        for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['productfiles']['name'][$i];
            $_FILES['file']['type']       = $_FILES['productfiles']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['productfiles']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['productfiles']['error'][$i];
            $_FILES['file']['size']       = $_FILES['productfiles']['size'][$i];

            // File upload configuration
            $uploadPath = 'uploads/product_img/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                 $uploadImgData[$i]['image'] = $imageData['file_name'];
				 $uploadImgData[$i]['product_id'] = $insert_id;
            }
        }
         if(!empty($uploadImgData)){
            $insert = $this->ProductManagement->insertproduct($uploadImgData); 
				if($insert==true)
				{
					redirect('product');
				}           
        }
		
  	}
	public function editProduct(){
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		   	$data['name'] = $this->session->userdata('name');
		   	$data['category'] = $this->ProductManagement->getAllProductCategory();
		   	$productId = $this->uri->segment(4);
			$data['productDataEdit'] = $this->ProductManagement->getProductDataEdit($productId);
		   	$this->layout->view('edit_product',$data);
	}
	public function post_edit_product()
	{
	  	$product_id = $this->input->post('product_id');
			$product_data = array(
			'categorie_id' => $this->input->post('product_category'),
			'sku' => $this->input->post('product_sku'),
			'name' => $this->input->post('product_name'),
			'product_code' => $this->input->post('product_code'),
			'description' => $this->input->post('description'),
			'short_description' => $this->input->post('shortDescription'),
			'tags' => $this->input->post('product_tag'),
			'weight' => $this->input->post('product_weight'),
			'price' => $this->input->post('product_price'),
			'stock' => $this->input->post('stock'),
			'mfg_date' => $this->input->post('mfg_date'),
			'expiry_date' => $this->input->post('expiry_date'),
			'status' =>$this->input->post('status')
			);
			$result=$this->Main->update('id',$product_id, $product_data,'nbb_product');
			
			$this->load->library('upload');
		$image = array();
		$ImageCount = count($_FILES['productfiles']['name']);
        for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['productfiles']['name'][$i];
            $_FILES['file']['type']       = $_FILES['productfiles']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['productfiles']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['productfiles']['error'][$i];
            $_FILES['file']['size']       = $_FILES['productfiles']['size'][$i];

            // File upload configuration
            $uploadPath = 'uploads/product_img/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			$config['max_height'] = "";
			$config['max_width'] = "";

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                 $uploadImgData[$i]['image'] = $imageData['file_name'];
				 $uploadImgData[$i]['product_id'] = $product_id;
            }
        }
         if(!empty($uploadImgData)){
            $insert = $this->ProductManagement->insertproduct($uploadImgData); 		         
        }
		if($insert==true || $result == true)
			{
				redirect('admin/productManagement/editProduct/'.$product_id);
			}  
		
  	}
	  public function updateStack_status()
	  {
		  if(empty($this->session->has_userdata('id'))){
			  redirect('admin');
		  }
	  
		  $product_detailsId = $this->input->post('product_detailsId');
		  $data = array(
			  'available_stock' => $this->input->post('product_stock'),
			  'stock' => $this->input->post('product_stock')
		  );  
		  
		  $result=$this->Main->update('id',$product_detailsId, $data,'nbb_product');
		  if($result == true)
		  {
			  return redirect('admin/productManagement/all_product');
		  }
		  else
		  {
			  $errorUploadType = 'Some problem occurred, please try again.';
		  }      
	  }
	public function set_barcode()
	{
		$product_id = $_GET['product_id']; 
		$sku_code = $_GET['sku_code']; 
		$date_now = date("Y-m-d");
		//load library
		
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		
		$file = Zend_Barcode::draw('code128', 'image', array('text' => $sku_code), array());
  		$barcode_image = $sku_code.'_'.$date_now.'.png';
		$store_image = imagepng($file,FCPATH."uploads/barcode/".$barcode_image);

		$barcode_data = array('barcode' => $barcode_image);

		$update = $this->Main->update('id',$product_id, $barcode_data,'nbb_product');    
		if($update){
		  redirect('product');
		}
	}

	public function deleteProduct()
	{
		 if($this->session->has_userdata('id')!=false)
		 {
			 $productId=$this->uri->segment(4);
			 $result=$this->Main->delete('id',$productId,'nbb_product');
			 $productimage = $this->ProductManagement->getAllProductImage($productId);
			 foreach($productimage as $productimageRow){
				$product_image = $productimageRow['image'];
				if(file_exists($product_image)){
					unlink(base_url("uploads/product_img/".$product_image));
				}
			 }
			 $result2=$this->Main->delete('product_id',$productId,'nbb_product_image');
			 if($result==true)
			 {
				 redirect('product');
			 }
			 else
			 {
				 redirect('product');
			 }
		 }
	}
	public function delete_productImage()
	{
		if($this->session->has_userdata('id')!=false)
		{
			$imageId = $_POST['id'];
			$product_image = $_POST['productimage'];
			$productId = $_POST['productId'];
			$result=$this->Main->delete('id',$imageId,'nbb_product_image');
			unlink(base_url(base_url("uploads/product_img/".$product_image)));
			
		}
	}
}
?>
