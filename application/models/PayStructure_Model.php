<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PayStructure_Model extends CI_Model
{
	public function __construct()
	{
		// Call the CI_Model constructor
		//$this->load->library('m_pdf');
		parent::__construct();

	}

	function getAllpay_structure(){
		$this->db->select('nbb_pay_structure.*');
		$this->db->from('nbb_pay_structure');
		return $this->db->get()->result_array();
	}
	function storeEmpPay_structure($data)
    {
        $insert = $this->db->insert('nbb_pay_structure',$data); 
        return true;
    }
	function getLastpay_structure(){
		$this->db->select('nbb_pay_structure.*');
		$this->db->from('nbb_pay_structure');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		//return $this->db->get()->result_array();
		$pay_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach( $pay_structure_query as $row){				

			$pay_structure_data = array(
				'id' 					=> $row['id'],
				'dearness_Allowance' 	=> $row['dearness_Allowance'],
				'provident_Fund' 		=> $row['provident_Fund'],
				'ESI' 					=> $row['ESI'],
				'medical_Allowance' 	=> $row['medical_Allowance'],
				
			);	

		}
		return $pay_structure_data;
	}
	/*function getEditpay_structure($pay_structureId){
		$this->db->select('nbb_pay_structure.*');
		$this->db->from('nbb_pay_structure');
		 $this->db->where('id',$pay_structureId);
		//return $this->db->get()->result_array();
		$pay_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach( $pay_structure_query as $row){				

			$pay_structure_data = array(
				'id' 					=> $row['id'],
				'dearness_Allowance' 	=> $row['dearness_Allowance'],
				'provident_Fund' 		=> $row['provident_Fund'],
				'ESI' 					=> $row['ESI'],
				'medical_Allowance' 	=> $row['medical_Allowance'],
				
			);	

		}
		return $pay_structure_data;
	}*/
}

?>
