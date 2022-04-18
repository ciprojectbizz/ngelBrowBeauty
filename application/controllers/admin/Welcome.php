<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	/*public function __construct() {

		parent::__construct();

		//$this->db2 = $this->load->database('database2', TRUE);

	}*/

	public function index()
	{
		$this->load->view('login');
	}

    public function user_details(){
        $data['user']=$this->Auth->getAllUser();
        $this->layout->view('users',$data);
    }

	public function post_login()
        {
 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('login');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => hash('sha512', $this->input->post('password')),
 
             );
   
            $check = $this->Auth->login($data);
            
            if($check == true){
 
                 $user = array(
                 'id' => $check->id,
                 'unique_id' => $check->id,
                 'email' => $check->email,
                );
       
            $this->session->set_userdata($user);
 
             redirect('dashboard') ; 
            }
            
            $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');  
            //redirect('Welcome');  
              
 
          	$this->load->view('login');
        }
         
    }

    public function dashboard(){
      
       $this->layout->view('dashboard');
    }

    public function find(){
        $selectDate = $_GET['findDate'];
        $data['list'] = $this->Auth->findList($selectDate);
        echo json_encode($data);
     }

     public function sign_up(){
        extract($_POST);
        $data = array(
            'branch_id' => $branch_name,
            'employee_name' => $name,
            'email' => $email,
            'password' => hash('sha512', $this->input->post('password')),
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s")); 
            $insert = $this->Auth->signUp($data); 
            if($insert == true)
            {
                return redirect('users');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
    }
    
    public function getServiceByID(){
        $sId =$this->input->get('id');
        // print_r($sId);
        // die;
        $totalPrice = 0;
        $totalDuration =0;
        foreach($sId as $val){
            $data=$this->Auth->getServiceByID($val);
            $totalPrice += $data->service_price;
            $totalDuration += $data->duration;
        }
        $data1['totalPrice']=$totalPrice;
        $data1['totalDuration']=$totalDuration;
        echo json_encode($data1);
    }
    public function bookingSlot()
    {
        $therapistId = $_GET['therapistId']; 
        $totalDuration = $_GET['duration']; 
        $date = $_GET['date']; 
        $data=$this->Auth->getBookingAvailable( $date,  $therapistId);
        //$serviceId = $_GET['serviceId'];
        //$data1=$this->Auth->getServiceByID($serviceId[0]);
       
        $data2 = $this->Auth->getTimeSlot($totalDuration,'9:00', '19:00');
        $data3=[];
        $data3['bookslot']=$data;
        $data3['availabletimelist']=$data2;
        echo json_encode($data3);
    }

    public function editAppointment(){
            if(empty($this->session->has_userdata('id'))){
              redirect('admin');
            }
            $data['appointmentId'] = $this->uri->segment(4);
            $this->layout->view('appointment-edit',$data);
    }
    
    public function post_edit_appointment(){
        if(empty($this->session->has_userdata('id'))){
            redirect('admin');
        }
		$appointmentId=$this->uri->segment(4);
		extract($_POST);
		$data=array('customer_number' => $customer_number,
					'customer_name' => $customer_name,
					'total_amount' => $amount,
					'appointment_date' => $date,
					'instructions' => $instructions,
					'feedback' => $feedback);
		$clean_data=$this->security->xss_clean($data);
		$result=$this->Main->update('id',$appointmentId, $data,'appointment');
		if($result==true)
		{
			redirect('appointment');
		}
		else
		{
			redirect('appointment');
		}
    }
   
   	public function feedback()
    {
    	if($this->session->has_userdata('branch_id')){
			$data['feedback'] = $this->Auth->getAllFeedback($this->session->userdata('branch_id'));
		}
		else
		{
		$data['feedback'] = $this->Auth->getAllFeedback();
		}
       	$this->layout->view('feedback',$data);
    }

    public function add_feedback(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      	}
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $data['user'] = $this->Auth->getAllUser();
       $this->layout->view('add_feedback',$data);
    }

    public function post_add_feedback(){
        extract($_POST);
        $data = array(
            'user_id' => $user_id,
            'branch_id' => $branch,
            'rate' => $rate,
            'comment' => $comment,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s"));
            $insert = $this->Auth->storeFeedback($data); 
            if($insert == true)
            {
                return redirect('feedback');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
    }
   
    public function deleteFeedback()
    {
        if($this->session->has_userdata('id')!=false)
        {
            $feedbackId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$feedbackId,'feedback');
            if($result==true)
            {
                redirect('feedback');
            }
            else
            {
                redirect('feedback');
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
		//extract($_POST);
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'age' => $this->input->post('age'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'medical_information' => $this->input->post('medical_information'),
			'transactional_records' => $this->input->post('transactional_records'),
			'skin_conditions' => $this->input->post('skin_conditions'),
			'status' => $this->input->post('status'),
			'created_by' => $this->session->userdata('id'),
			'created_at' => date("Y-m-d H:i:s"));

				$insert = $this->Auth->storeCustomer($data); 
				$insert_id = $this->db->insert_id();
				if($insert==true)
				{
					$this->load->library('upload');
					if($_FILES['profile_picture']['name'] != '')
					{
		
						$_FILES['file']['name']       = $_FILES['profile_picture']['name'];
						$_FILES['file']['type']       = $_FILES['profile_picture']['type'];
						$_FILES['file']['tmp_name']   = $_FILES['profile_picture']['tmp_name'];
						$_FILES['file']['error']      = $_FILES['profile_picture']['error'];
						$_FILES['file']['size']       = $_FILES['profile_picture']['size'];
		
						// File upload configuration
						$uploadPath = 'uploads/profile_img/';
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
							$uploadImgData['profile_picture'] = $imageData['file_name'];
						}
						$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_customer');         
					} 

				}
				else
				{
					$errorUploadType = 'Some problem occurred, please try again.';
				}                   
			
		redirect('customer');                 
    }
	public function editCustomer(){
		if(empty($this->session->has_userdata('id'))){
		  redirect('admin');
		}
		$customerId = $this->uri->segment(4);
		$data['customerDataForEdit'] = $this->Auth->getCustomerData($customerId);
		$this->layout->view('edit_Customer',$data);
   }
   public function post_edit_customer(){
	if(empty($this->session->has_userdata('id'))){
	  redirect('admin');
	}
		
		$customerid = $this->input->post('customerid');
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'age' => $this->input->post('age'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'medical_information' => $this->input->post('medical_information'),
			'transactional_records' => $this->input->post('transactional_records'),
			'skin_conditions' => $this->input->post('skin_conditions'),
			'status' => $this->input->post('status')

		);
		  $result=$this->Main->update('id',$customerid, $data,'nbb_customer');

		  $this->load->library('upload');
			if($_FILES['profile_picture']['name'] != '')
			{

				$_FILES['file']['name']       = $_FILES['profile_picture']['name'];
				$_FILES['file']['type']       = $_FILES['profile_picture']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['profile_picture']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['profile_picture']['error'];
				$_FILES['file']['size']       = $_FILES['profile_picture']['size'];

				// File upload configuration
				$uploadPath = 'uploads/profile_img/';
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
					$uploadImgData['profile_picture'] = $imageData['file_name'];
				}
				if(!empty($uploadImgData)){
					$update=$this->Main->update('id',$customerid, $uploadImgData,'nbb_customer');         
				}
			} 
		 
			redirect('admin/welcome/editCustomer/'. $customerid);
	} 
	public function deleteCustomer()
    {
        if($this->session->has_userdata('id')!=false)
        {
            $customerId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$customerId,'nbb_customer');
            if($result==true)
            {
                redirect('customer');
            }
            else
            {
                redirect('customer');
            }
        }
    } 
    public function getCustomerByID(){
        $data=$this->Auth->getCustomerByID($this->input->get('contact'));
        echo json_encode($data);
    }

    public function logout(){
	    $this->session->sess_destroy();
	    redirect('welcome');
   }    
  
  
}

