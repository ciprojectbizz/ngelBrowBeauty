<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	 
	public function __construct() {

		parent::__construct();
		//$this->load->helper('url'); //Loading url helper 
		//$this->db2 = $this->load->database('database2', TRUE);
	}

	public function register()
    {
		$this->load->view('hrms/empregister');
	}	
		
	public function post_register()
	{
	    extract($_POST);
		$data = array(
			'first_name' => $this->input->post('emp_name'),
			'email' => $this->input->post('email'),
			'password' => hash('sha512', $this->input->post('password')),
			'create_date' => date("Y-m-d H:i:s"),
			'status' => '1' );
			
			
			$insert = $this->Empauth->empsignup($data); 
		if($insert == true)
		{
			//return redirect('users');
		}
		else
		{
			$errorUploadType = 'Some problem occurred, please try again.';
		}
		
		$this->load->view('hrms/emplogin');
	}

	public function post_login()
    {
 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('hrms/emplogin');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => hash('sha512', $this->input->post('password')),
            );
   
            $check = $this->Empauth->login($data);
            
            if($check == true){
 
                $user = array(
                 'id' => $check->id,
                 'unique_id' => $check->id,
                 'email' => $check->email,
                );
       
            $this->session->set_userdata($user);
 
             redirect('empdashboard') ; 
            }
            
            $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');  
            //redirect('Welcome');  
              
          	$this->load->view('hrms/emplogin');
        }
         
    }

    public function empdashboard(){
      
       $this->layout_2->view('hrms/empdashboard');
    }

    public function find(){
        $selectDate = $_GET['findDate'];
        $data['list'] = $this->Auth->findList($selectDate);
        echo json_encode($data);
    }
	public function logout(){
	    $this->session->sess_destroy();
	    redirect('hrms');
   }  
}

