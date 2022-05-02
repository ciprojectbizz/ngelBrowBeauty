<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_Structure extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function allPay_Structure(){

		$data['allpay_structure'] = $this->PayStructure->getAllpay_structure();
		$this->layout->view('all_empPayStructure',$data); 
	}
	public function add_PayStructure(){
		$data['name'] = $this->session->userdata('name');
       	$this->layout->view('add_empPayStructure',$data); 
	}
	public function post_add_empPay_Structure(){

		$data = array(
			'year' => $this->input->post('getyear'),
			'dearness_allowance' => $this->input->post('dearness_allowance'),
			'Provident_fund' => $this->input->post('Provident_fund'),
			'ESI' => $this->input->post('employees_state_insurance'),
			//'house_rent_allowance' => $this->input->post('gender'),
			'medical_allowance' => $this->input->post('medical_allowance'));

			$insert = $this->PayStructure->storeEmpPay_structure($data); 
			if($insert){
				redirect('admin/pay_Structure/allPay_Structure');
			}
	}
	public function edit_empPay_Structure(){
		$pay_structureId = $this->uri->segment(4);
		$data['allpay_structure'] = $this->PayStructure->getEditpay_structure($pay_structureId);
		$this->layout->view('edit_empPayStructure',$data); 
	}
	public function deleteEmpPay_Structurey()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $emppayId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$emppayId,'nbb_pay_structure');
		   if($result==true)
		   {
			   redirect('admin/pay_Structure/allPay_Structure');
		   }
	   }
	}
}
?>
