<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
	
	function login($data)
	{
		$this->db->select('*');
		$this->db->from('nbb_users');
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$query=$this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}	
	}

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

    function getAllUser()
    {
      $this->db->select('*');
      $this->db->from('nbb_users');
      return $this->db->get()->result_array();
    }

    function getBookingAvailable($date,$therapist)
    {
      $this->db->select('*');
      $this->db->from('nbb_appointment');
      $this->db->where('appointment_date',$date);
      $this->db->where('therapists',$therapist);
      return $this->db->get()->result_array();
    } 
    
    function storeFeedback($data)
    {
        $insert = $this->db->insert('nbb_feedback',$data); 
        return true;
    }
    
    function storeAppointment($data)
    {
        $insert = $this->db->insert('nbb_appointment',$data); 
        return true;
    }
	
	function storeCustomer($data)
    {
        $insert = $this->db->insert('nbb_customer',$data); 
        return true;
    }

    function signUp($data)
    {
        $insert = $this->db->insert('employee',$data); 
		return true;
    }

    function getAllCustomer(){
        $this->db->select('nbb_customer.*');
        $this->db->from('nbb_customer');
        return $this->db->get()->result_array();     
    }
	function getAllAdminUser(){
        $this->db->select('nbb_users.*');
        $this->db->from('nbb_users');
        return $this->db->get()->result_array();     
    }

    function getCustomerByID($contact){
        $this->db->select('*');
        $this->db->from('nbb_customer');
        $this->db->where('contact',$contact);
        return $this->db->get()->result_array();
    }
	function getCustomerData($id){
        $this->db->select('*');
        $this->db->from('nbb_customer');
        $this->db->where('id',$id);
        return $this->db->get()->result_array();
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


    //start dashboard

    function getAllDuration(){
        $this->db->select('*');
        $this->db->from('nbb_check_therapist');
        return $this->db->get()->result_array();  
      }
       function checkOrderAsc($query){
          $query = $this->db->query($query);
          return $query->result_array();
      }
      function getAllTherapistH(){
          $this->db->select('nbb_employees.*');
          $this->db->from('nbb_employees');
          $this->db->where('nbb_employees.designation','1');
          $this->db->where('nbb_employees.status','1');
          $this->db->order_by('nbb_employees.order_id','ASC');
          //$this->db->join('xin_leave_applications','xin_leave_applications.employee_id = xin_employees.user_id','left');
          return $this->db->get()->result_array();
      }
      function getAllEvent()
      {
          $this->db->select('nbb_dashboard.*');
          $this->db->from('nbb_dashboard');
          $this->db->join('nbb_employees','nbb_employees.id = nbb_dashboard.therapist_id');
          return $this->db->get()->result_array();
      } 
      function getAllServices($id=null)
      {
          $this->db->select('nbb_service.*');
          $this->db->from('nbb_service');
       
          return $this->db->get()->result_array();
      }

      function checkEvent($therapist_id,$date,$start_time,$end_time){
          $this->db->select('id');
          $this->db->from('nbb_dashboard');
          $this->db->where('therapist_id',$therapist_id);
          $this->db->where('start_date',$date);
          $this->db->group_start();
          $this->db->where('start_time <=',$start_time);
          $this->db->where('end_time >=',$end_time);
          $this->db->group_end();
          return $this->db->get()->num_rows();
      }
       function dashboard($data)
      {
          $insert = $this->db->insert('nbb_dashboard',$data); 
          return true;
      }
      function insertDur($data){
          $insert = $this->db->insert('nbb_check_therapist',$data); 
          return true;
       }
      function getServiceByID($id){
          $this->db->select('*');
          $this->db->from('nbb_service');
          $this->db->where('id',$id);
          $result= $this->db->get()->row();
          return $result;
      }
}
