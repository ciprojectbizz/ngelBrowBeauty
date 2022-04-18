<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Empauth_Model extends CI_Model
{
	
	function login($data)
	{
		$this->db->select('*');
		$this->db->from('nbb_employees');
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
	
	function empsignup($data)
    {
        echo $insert = $this->db->insert('nbb_employees',$data); 
		return true;
    }

    function therapistList()
    {
      $this->db->select('*');
      $this->db->from('nbb_therapists');
      return $this->db->get()->result_array();
    }

    function findList($id,$selectDate){

         $this->db->select('*');
         $this->db->from('nbb_appointment');
         $this->db->where('appointment_date',$selectDate);
         $this->db->where('therapists',$id);
         return $this->db->get()->result_array();
        
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
	
	function getServiceByID($id){
        $this->db->select('*');
        $this->db->from('nbb_service');
        $this->db->where('id',$id);
        $result= $this->db->get()->row();
        return $result;
    }

    function signUp($data)
    {
        $insert = $this->db->insert('nbb_employee',$data); 
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
