<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	/*public function __construct() {

		parent::__construct();

		//$this->db2 = $this->load->database('database2', TRUE);

	}*/

	public function index()
	{
		$this->load->view('hrms/emplogin');
	}
   
  
  
}

