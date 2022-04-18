<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceCategoryCtl extends CI_Controller {

	public function __construct() {

		parent::__construct();

		//$this->db2 = $this->load->database('database2', TRUE);

	}
     
	public function all_category()
    {
       
       $data['category'] = $this->ServiceCategory->getAllCategory();

       $this->layout->view('all_category',$data); 
    }
	public function add_category(){
        if(empty($this->session->has_userdata('id'))){
         redirect('admin');
       }
        $data['name'] = $this->session->userdata('name');
        
        $this->layout->view('add_nbbCategory',$data);
    }
	public function post_add_category()
	{
	  $errorUploadType = "";
	  $statusMsg = "";
	  if($_POST!=NULL)
	  	{
		  if($this->session->has_userdata('id')!=false)
		  {
			  if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
			  {
				  $name = $this->input->post('name');
				  $details = $this->input->post('details');
				  $status = $this->input->post('status');
				  $filesCount = count($_FILES['files']['name']);

				  for($i = 0; $i < $filesCount; $i++)
				  {
					  $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
					  $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
					  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
					  $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
					  $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
					  $uploadPath = 'uploads/'; 
					  $config['upload_path'] = $uploadPath; 
					  $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
					  $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
					  $config['max_height'] = "";
					  $config['max_width'] = "";
					  $this->load->library('upload', $config); 
					  $this->upload->initialize($config);

					  if($this->upload->do_upload('file'))
					  {
						  $fileData = $this->upload->data(); 
						  $uploadData[$i]['category_image'] = $fileData['file_name']; 
						  $uploadData[$i]['category_name'] = $name;
						  $uploadData[$i]['category_details'] = $details;
						  $uploadData[$i]['status'] = $status;
						  $uploadData[$i]['created_by'] = $this->session->userdata('id');
						  $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
	  
					  }
					  else
					  {
						  $errorUploadType .= $_FILES['file']['name'].' | ';
					  }

					  $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
				  }

					  if(!empty($uploadData))
					  {
						  $insert = $this->ServiceCategory->insert_category($uploadData); 
						  if($insert==true)
						  {
							  redirect('allcategory');
						  }
						  else
						  {
							  $errorUploadType = 'Some problem occurred, please try again.';
						  }                   
					  }
					  else
					  {
						  $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
					  }
			  }
			  else
			  {
				  echo "Please Select File to Upload";
			  }
		  }
		  else
		  {
			  redirect('admin');
		  }
	  }
	  else
	  {
		  redirect('admin');
	  }
  	}
	public function edit_category(){
		if(empty($this->session->has_userdata('id'))){
		redirect('admin');
	}
		$data['name'] = $this->session->userdata('name');
		$serviceCategoryId = $this->uri->segment(4);
		$data['category'] = $this->ServiceCategory->getAllCategoryEdit($serviceCategoryId);
		$this->layout->view('edit_serviceCategory',$data);
	}
	public function post_edit_servicecategory()
	{
		$servicecategory_id = $this->input->post('servicecategory_id');
			$service_data = array(
				'category_name' => $this->input->post('name'),
				'category_details' => $this->input->post('details'),
				'status' => $this->input->post('status')
			);
			$result=$this->Main->update('id',$servicecategory_id, $service_data,'nbb_category');
			
			$this->load->library('upload');
			if($_FILES['catagoryfiles']['name'] != '')
			{

				$_FILES['file']['name']       = $_FILES['catagoryfiles']['name'];
				$_FILES['file']['type']       = $_FILES['catagoryfiles']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['catagoryfiles']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['catagoryfiles']['error'];
				$_FILES['file']['size']       = $_FILES['catagoryfiles']['size'];

				// File upload configuration
				$uploadPath = 'uploads/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
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
					$uploadImgData['category_image'] = $imageData['file_name'];
					$uploadImgData['id'] = $servicecategory_id;
				}
			if(!empty($uploadImgData)){
				$update=$this->Main->update('id',$servicecategory_id, $uploadImgData,'nbb_category');
					if($update==true)
					{
						redirect('admin/ServiceCategoryCtl/edit_category/'.$servicecategory_id);
					}           
			}
		}
	}
  public function deleteCategory()
    {
       if($this->session->has_userdata('id')!=false)
       {
           $categoryId=$this->uri->segment(4);
           $result=$this->Main->delete('id',$categoryId,'nbb_category');
           if($result==true)
           {
               redirect('allcategory');
           }
           else
           {
               redirect('allcategory');
           }
       }
    }
	public function service()
    {

       $data['service'] = $this->ServiceCategory->getAllServices();
    
       $this->layout->view('all_service',$data);
    }
	public function add_service()
    {
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      	}
       $data['name'] = $this->session->userdata('name');
       $data['category'] = $this->ServiceCategory->getAllCategory();
       $this->layout->view('add_nbbservice',$data);
    }
	public function post_add_service()
	{
	  $errorUploadType = "";
	  $statusMsg = "";
	  if($_POST!=NULL)
	  {
		  if($this->session->has_userdata('id')!=false)
		  {
			  if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
			  {
				  $service_name = $this->input->post('service_name');
				  $service_category = $this->input->post('service_category');
				  $description = $this->input->post('description');
				  $service_price = $this->input->post('service_price');
				  $duration = $this->input->post('duration');
				  $therapist_commission = $this->input->post('therapist_commission');
				  $amount = $this->input->post('amount');
				  $priority = $this->input->post('priority');
				  $loyalty_points = $this->input->post('loyalty_points');
				  $status = $this->input->post('status');
				  $filesCount = count($_FILES['files']['name']);
				  for($i = 0; $i < $filesCount; $i++)
				  {
					  $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
					  $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
					  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
					  $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
					  $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
					  $uploadPath = 'uploads/'; 
					  $config['upload_path'] = $uploadPath; 
					  $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
					  $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
					  $config['max_height'] = "";
					  $config['max_width'] = "";
					  $this->load->library('upload', $config); 
					  $this->upload->initialize($config);

					  if($this->upload->do_upload('file'))
					  {
						  $fileData = $this->upload->data(); 
						  $uploadData[$i]['service_icon'] = $fileData['file_name']; 
						  //$uploadData[$i]['type']=$fileData['file_type'];
						  $uploadData[$i]['service_name'] = $service_name;
						  $uploadData[$i]['service_category'] = $service_category;
						  $uploadData[$i]['description'] = $description;
						  $uploadData[$i]['service_price'] = $service_price;
						  $uploadData[$i]['duration'] = $duration;
						  $uploadData[$i]['therapist_commission'] = $therapist_commission;
						  $uploadData[$i]['commission_amount'] = $amount;
						  $uploadData[$i]['priority'] = $priority;
						  $uploadData[$i]['loyalty_points'] = $loyalty_points;
						  $uploadData[$i]['status'] = $status;
						  $uploadData[$i]['created_by'] = $this->session->userdata('id');
						  $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
						  
					  }
					  else
					  {
						  $errorUploadType .= $_FILES['file']['name'].' | ';
					  }

					  $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
				  }

					  if(!empty($uploadData))
					  {
						  $insert = $this->ServiceCategory->insertService($uploadData); 
						  if($insert==true)
						  {
							  redirect('allservice');
						  }
						  else
						  {
							  $errorUploadType = 'Some problem occurred, please try again.';
						  }                   
					  }
					  else
					  {
						  $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
					  }
			  }
			  else
			  {
				  echo "Please Select File to Upload";
			  }
		  }
		  else
		  {
			  redirect('admin');
		  }
	  }
	  else
	  {
		  redirect('admin');
	  }
  	}
	public function editService(){
		if(empty($this->session->has_userdata('id'))){
		  redirect('admin');
		}
		$serviceId = $this->uri->segment(4);
		$data['serviceDataEdit'] = $this->ServiceCategory->getServiceDataEdit($serviceId);
		$data['category'] = $this->ServiceCategory->getAllCategory();
		$this->layout->view('edit_service',$data);
   	}
	public function post_edit_service()
	{
		$service_id = $this->input->post('service_id');
			$service_data = array(
				'service_name' => $this->input->post('service_name'),
				'service_category' => $this->input->post('service_category'),
				'description' => $this->input->post('description'),
				'service_price' => $this->input->post('service_price'),
				'duration' => $this->input->post('duration'),
				'therapist_commission' => $this->input->post('therapist_commission'),
				'commission_amount' => $this->input->post('amount'),
				'priority' => $this->input->post('priority'),
				'loyalty_points' => $this->input->post('loyalty_points'),
				'status' => $this->input->post('status'),
			);
			$result=$this->Main->update('id',$service_id, $service_data,'nbb_service');
			
			$this->load->library('upload');
			if($_FILES['servicefiles']['name'] != '')
			{

				$_FILES['file']['name']       = $_FILES['servicefiles']['name'];
				$_FILES['file']['type']       = $_FILES['servicefiles']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['servicefiles']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['servicefiles']['error'];
				$_FILES['file']['size']       = $_FILES['servicefiles']['size'];

				// File upload configuration
				$uploadPath = 'uploads/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
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
					$uploadImgData['service_icon'] = $imageData['file_name'];
				}
			if(!empty($uploadImgData)){
				$update=$this->Main->update('id',$service_id, $uploadImgData,'nbb_service');
					if($update==true)
					{
						redirect('admin/ServiceCategoryCtl/editService/'.$service_id);
					}           
			}
		}
	}
	public function deleteService()
	{
		if($this->session->has_userdata('id')!=false)
		{
			$serviceId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$serviceId,'nbb_service');
			if($result==true)
			{
				redirect('allservice');
			}
			else
			{
				redirect('allservice');
			}
		}
	}
	public function appointment()
    {
       $data['appointment'] = $this->ServiceCategory->getAllAppointment();
     
       $this->layout->view('appointment',$data);
  	}
	public function add_appointment(){
		if(empty($this->session->has_userdata('id'))){
		 redirect('admin');
	   }
		$data['therapist'] = $this->ServiceCategory->getAllTherapist();
		$data['name'] = $this->session->userdata('name');
		$data['service'] = $this->ServiceCategory->getAllServices();
		$data['addon']  = $this->ServiceCategory->getAllAddon();
		$this->layout->view('add_appointment',$data);
	}
	public function post_add_appointment(){

        extract($_POST);
        $data = array(
            'customer_number' => $customer_number,
            'customer_id' => $customer_id,
            'customer_name' => $customer_name,
            'email' => $email,
            'services' => implode(',',$service),
            'therapists' => $therapist,
            'time_slot' => $selected_timeslot,
            'total_amount' => $amount,
            'appointment_date' => $date,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s"));  
            $insert = $this->ServiceCategory->storeAppointment($data); 
            if($insert == true)
            {
                return redirect('appointment');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }      
    }
	public function deleteAppointment()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $appointmentId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$appointmentId,'nbb_appointment');
            if($result==true)
            {
                redirect('appointment');
            }
            else
            {
                redirect('appointment');
            }
        }
     }
	public function all_therapists()
		{

			$data['therapist'] = $this->ServiceCategory->getAllTherapist();
			$this->layout->view('all_therapists',$data);
		}

	public function add_therapists(){
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$data['service'] = $this->ServiceCategory->getAllServices();
		$this->layout->view('add_nbbtherapist',$data);
		
	}

    public function post_add_therapist()
      {
        $errorUploadType = "";
        $statusMsg = "";
        if($_POST!=NULL)
        {
            if($this->session->has_userdata('id')!=false)
            {
                if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
                {
                    $name = $this->input->post('name');
                    $age =  $this->input->post('age');
                    $gender = $this->input->post('gender');
                    $service = $this->input->post('service');
                    $checkin = $this->input->post('checkin');
                    $mobile = $this->input->post('mobile');
                    $filesCount = count($_FILES['files']['name']);
                    for($i = 0; $i < $filesCount; $i++)
                    {
                        $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                        $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                        $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                        $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                        $uploadPath = 'uploads/'; 
                        $config['upload_path'] = $uploadPath; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
                        $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        $config['max_height'] = "";
                        $config['max_width'] = "";
                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('file'))
                        {
                            $fileData = $this->upload->data(); 
                            $uploadData[$i]['image'] = $fileData['file_name']; 
                            $uploadData[$i]['name'] = $name;
                            $uploadData[$i]['age'] = $age;
                            $uploadData[$i]['gender'] = $gender;
                            $uploadData[$i]['service_id'] = $service;
                            $uploadData[$i]['checkin'] = $checkin;
                            $uploadData[$i]['mobile'] = $mobile;
                            $uploadData[$i]['created_by'] = $this->session->userdata('id');
                            $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
                            $uploadData[$i]['updated_at'] = date("Y-m-d H:i:s");
                            
                        }
                        else
                        {
                            $errorUploadType .= $_FILES['file']['name'].' | ';
                        }

                        $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    }

                        if(!empty($uploadData))
                        {
                            $insert = $this->ServiceCategory->insert_therapists($uploadData); 
                            if($insert==true)
                            {
                                redirect('alltherapists');
                            }
                            else
                            {
                                $errorUploadType = 'Some problem occurred, please try again.';
                            }                   
                        }
                        else
                        {
                            $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                        }
                }
                else
                {
                    echo "Please Select File to Upload";
                }
            }
            else
            {
                redirect('admin');
            }
        }
        else
        {
            redirect('admin');
        }
    }

    public function deleteTherapist()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $therapistId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$therapistId,'nbb_therapists');
            if($result==true)
            {
                redirect('alltherapists');
            }
            else
            {
                redirect('alltherapists');
            }
        }
     }

	 public function customer()
	 {
	
		$data['customer'] = $this->Auth->getAllCustomer();
	  
		$this->layout->view('customers',$data); 
	 }
	 
	 public function add_customer(){
		if(empty($this->session->has_userdata('id'))){
		 redirect('admin');
	   }
		$data['name'] = $this->session->userdata('name');
		
		$this->layout->view('add_customer',$data);
	 
	 }
	 
	 public function post_add_customer(){
			 extract($_POST);
			 $data = array(
				 'first_name' => $first_name,
				 'last_name' => $last_name,
				 'dob' => $dob,
				 'age' => $age,
				 'email' => $email,
				 'contact' => $contact,
				 'address' => $address,
				 'created_by' => $this->session->userdata('id'),
				 'created_at' => date("Y-m-d H:i:s"));
				 $insert = $this->Auth->storeCustomer($data); 
				 echo json_encode($insert);				 
	 }
   
	 public function getCustomerByID(){
		 $data=$this->ServiceCategory->getCustomerByID($this->input->get('contact'));
		 echo json_encode($data);
	 }

}
