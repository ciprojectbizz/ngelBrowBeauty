<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceCategory_Model extends CI_Model
{

     function findList($id,$selectDate){
         $this->db->select('*');
         $this->db->from('nbb_appointment');
         $this->db->where('appointment_date',$selectDate);
         $this->db->where('therapists',$id);
         //$this->db->join('therapists','therapists.id=appointment.therapists');
         //$this->db->join('customer','customer.id=appointment.customer_id');
         return $this->db->get()->result_array();
        //  print_r($this->db->last_query()); 
        //  die;
         
     }

    function getBookingAvailable($date,$therapist)
    {
      $this->db->select('*');
      $this->db->from('nbb_appointment');
      $this->db->where('appointment_date',$date);
      $this->db->where('therapists',$therapist);
      return $this->db->get()->result_array();
    } 
    
    function storeAppointment($data)
    {
        $insert = $this->db->insert('nbb_appointment',$data); 
        return true;
    }
	function getAllAddon() 
    {
        $this->db->select('*');
        $this->db->from('nbb_add_ons');
        return $this->db->get()->result_array();
    }
    function getAllCategory()
    {
		//$db2 = $this->load->database('database2', TRUE);
        $this->db->select('nbb_category.*');
        $this->db->from('nbb_category');

        return $this->db->get()->result_array();
    }
	function getAllCategoryEdit($id)
    {
		//$db2 = $this->load->database('database2', TRUE);
        $this->db->select('nbb_category.*');
        $this->db->from('nbb_category');
		$this->db->where('id',$id);

        return $this->db->get()->result_array();
    }
	function insert_category($data = array())
    {
        $insert = $this->db->insert_batch('nbb_category',$data); 
        return true;
    }
    function getAllAppointment()
    {
        $this->db->select('nbb_appointment.*, nbb_service.service_name,nbb_therapists.name');
        $this->db->from('nbb_appointment');
        $this->db->join('nbb_service','nbb_service.id = nbb_appointment.services');
        $this->db->join('nbb_therapists','nbb_therapists.id = nbb_appointment.therapists');

        return $this->db->get()->result_array();
    }
    
    function getAllServices()
    {
        $this->db->select('nbb_service.*,nbb_category.category_name');
        $this->db->from('nbb_service');
        $this->db->join('nbb_category','nbb_category.id = nbb_service.service_category');
        return $this->db->get()->result_array();
    }
	function getServiceDataEdit($id){
		$this->db->select('*');
		$this->db->from('nbb_service');
		$this->db->where('id',$id);
		return $this->db->get()->result_array();
	}
    function getServiceByID($id){
        $this->db->select('*');
        $this->db->from('nbb_service');
        $this->db->where('id',$id);
        $result= $this->db->get()->row();
        return $result;
    }
    function getCustomerByID($contact){
        $this->db->select('*');
        $this->db->from('nbb_customer');
        $this->db->where('contact',$contact);
        return $this->db->get()->result_array();
    }
   	function getAllTherapist()
    {
		$this->db->select('nbb_employees.*,nbb_emp_designation.designation_name');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_emp_designation','nbb_emp_designation.id = nbb_employees.designation');
		$this->db->where('nbb_employees.status', '1');
		$this->db->where('nbb_employees.designation', '1');
		return $this->db->get()->result_array();

    }

    function insert_therapists($data = array())
    {
        $insert = $this->db->insert_batch('nbb_therapists',$data); 
        return true;
    }

    function insertService($data = array())
    {
        $insert = $this->db->insert_batch('nbb_service',$data); 
        return true;
    }
    
    function getTimeSlot($interval, $start_time, $end_time)
	{
		$start = new DateTime($start_time);
		$end = new DateTime($end_time);
		$startTime = $start->format('H:i');
		$endTime = $end->format('H:i');
		$i=0;
		$time = [];
		while(strtotime($startTime) <= strtotime($endTime)){
			$start = $startTime;
			$end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
			$startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
			$i++;
			if(strtotime($startTime) <= strtotime($endTime)){
				$time[$i]['slot_start_time'] = $start;
				$time[$i]['slot_end_time'] = $end;
			}
		}
		return $time;
	}

}
