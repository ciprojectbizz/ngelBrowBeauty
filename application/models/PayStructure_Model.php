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
}

?>
