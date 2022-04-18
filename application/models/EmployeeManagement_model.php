<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeManagement_model extends CI_Model
{
	public function __construct()
	{
		// Call the CI_Model constructor
		//$this->load->library('m_pdf');
		parent::__construct();

	}
	function getAllemployees(){
		$this->db->select('nbb_employees.*,
		nbb_emp_designation.designation_name');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_emp_designation', 'nbb_emp_designation.id = nbb_employees.designation', 'LEFT');
		$this->db->where('nbb_employees.status', '1');
		return $this->db->get()->result_array();
	}
	function getAllArchiveEmployees(){
		$this->db->select('nbb_employees.*,
		nbb_emp_designation.designation_name');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_emp_designation', 'nbb_emp_designation.id = nbb_employees.designation', 'LEFT');
		$this->db->where('nbb_employees.status', '0');
		return $this->db->get()->result_array();
	}
	function getAllemp_designation(){
		
		$this->db->select('nbb_emp_designation.*');
		$this->db->from('nbb_emp_designation');
		return $this->db->get()->result_array();
		
	}
	function storeEmployee($data)
    {
        $insert = $this->db->insert('nbb_employees',$data); 
        return true;
    }
	function storeEmployeeaddress($data)
    {
        $insert = $this->db->insert('nbb_employee_address',$data); 
        return true;
    }
	function storeEmployeesalary($data)
    {
        $insert = $this->db->insert('nbb_employee_salary',$data); 
        return true;
    }
	function storeEducationQualification($data)
    {
        $insert = $this->db->insert('nbb_emp_education_qualification',$data); 
        return true;
    }
	function storeWorkExperience($data)
    {
        $insert = $this->db->insert('nbb_work_experience',$data); 
        return true;
    }
	function storeEmployeeleave($data)
    {
        $insert = $this->db->insert('nbb_employee_leave',$data); 
        return true;
    }
	function storeEmployeeAttendance($data)
    {
        $insert = $this->db->insert('nbb_employees_attendance',$data); 
        return true;
    }
	function getAllemp_Details($id){
		$this->db->select('nbb_employees.*,
		nbb_emp_designation.designation_name,
		nbb_employee_address.full_address,
		nbb_employee_address.land_mark,
		nbb_employee_address.city,
		nbb_employee_address.pincode,
		nbb_employee_address.state');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_emp_designation', 'nbb_emp_designation.id = nbb_employees.designation', 'LEFT');
		$this->db->join('nbb_employee_address', 'nbb_employee_address.emp_id = nbb_employees.id', 'LEFT');
		$this->db->where('nbb_employees.id', $id);
		//return $this->db->get()->result_array();
		$employees_query = $this->db->get()->result_array();
		$data = array();			

		foreach($employees_query as $row){	
			$data = array(
				'id' => $id,
				'emp_number' => $row['emp_number'],
				'first_name' => $row['first_name'],
				'last_name' => $row['last_name'],
				'designation_name' => $row['designation_name'],
				'employee_photo' => $row['employee_photo'],
				'aadhaar_number' => $row['aadhaar_number'],
				'pan_number' => $row['pan_number'],
				'date_of_birth' => $row['date_of_birth'],
				'mob_no' => $row['mob_no'],
				'email' => $row['email'],
				'password' => $row['password'],
				'father_name' => $row['father_name'],
				'mother_name' => $row['mother_name'],
				'husband_name' => $row['husband_name'],
				'gender' => $row['gender'],
				'designation' => $row['designation'],
				'jobtype' => $row['jobtype'],
				'date_of_joining' => $row['date_of_joining'],
				'willing_to_relocate' => $row['willing_to_relocate'],
				'full_address' => $row['full_address'],
				'land_mark' => $row['land_mark'],
				'city' => $row['city'],
				'state' => $row['state'],
				'pincode' => $row['pincode'],
			);
		}
		return $data;
	}
	function getAllEmployeeSalary(){
		$this->db->select('nbb_employee_salary.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name,
		nbb_emp_designation.designation_name');
		$this->db->from('nbb_employee_salary');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_salary.emp_id', 'LEFT');
		$this->db->join('nbb_emp_designation', 'nbb_emp_designation.id = nbb_employee_salary.dept_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function geteditEmployeeSalary($id){
		$this->db->select('nbb_employee_salary.*');
		$this->db->from('nbb_employee_salary');
		$this->db->where('nbb_employee_salary.id', $id);
		return $this->db->get()->result_array();
	}
	function getAllemp_leave(){
		$this->db->select('nbb_employee_leave.*,nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employee_leave');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_leave.emp_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function getAllemp_Attendance(){
		$this->db->select('nbb_employees_attendance.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employees_attendance');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employees_attendance.emp_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function geteditEmployeeLeave($id){
		$this->db->select('nbb_employee_leave.*');
		$this->db->from('nbb_employee_leave');
		$this->db->where('nbb_employee_leave.id', $id);
		return $this->db->get()->result_array();
	}
	
	function getHrmsAllemp_leave($empid){
		$this->db->select('nbb_employee_leave.*,nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employee_leave');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_leave.emp_id', 'LEFT');
		$this->db->where('nbb_employee_leave.emp_id', $empid);
		return $this->db->get()->result_array();
	}
	function getAllHrmsEmployees($empid){
		$this->db->select('nbb_employees.*,
		nbb_employee_address.full_address,
		nbb_employee_address.land_mark,nbb_employee_address.city,nbb_employee_address.state,nbb_employee_address.pincode');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_employee_address', 'nbb_employee_address.emp_id = nbb_employees.id', 'LEFT');
		$multiClause = array('nbb_employees.id' => $empid, 'nbb_employees.status' => 1 );
		$this->db->where($multiClause);
		return $this->db->get()->result_array();
	}
	function getAllHrmsEmployeeSalary($empid){
		$this->db->select('nbb_employee_salary.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name,
		nbb_emp_designation.designation_name');
		$this->db->from('nbb_employee_salary');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_salary.emp_id', 'LEFT');
		$this->db->join('nbb_emp_designation', 'nbb_emp_designation.id = nbb_employee_salary.dept_id', 'LEFT');
		$this->db->where('nbb_employee_salary.emp_id', $empid);
		return $this->db->get()->result_array();
	}
	function getHrmsEmployeeAttendance($empid){
		$this->db->select('nbb_employees_attendance.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employees_attendance');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employees_attendance.emp_id', 'LEFT');
		$this->db->where('nbb_employees_attendance.emp_id', $empid);
		return $this->db->get()->result_array();
	}
	function getDownload_attendance($employeeid,$login_Time){
		$sql_emp_attendance = "SELECT nbb_employees_attendance.*,
			nbb_employees.emp_number,
			nbb_employees.first_name,
			nbb_employees.last_name
			FROM nbb_employees_attendance 
			LEFT JOIN nbb_employees ON nbb_employees.id = nbb_employees_attendance.emp_id
			WHERE nbb_employees_attendance.emp_id = '".$employeeid."' AND DATE_FORMAT(nbb_employees_attendance.login, '%Y-%m') = '".$login_Time."';";
		
		$query_emp_attendance = $this->db->query($sql_emp_attendance); 
		return $query_emp_attendance->result_array();	
	}
	
	function getEmployeeNameDownload_attendance($id){
		
		$this->db->select('nbb_employees.*');
		$this->db->from('nbb_employees');
		$this->db->where('nbb_employees.id', $id);
		//return $this->db->get()->result_array();
		$employees_query = $this->db->get()->result_array();
		$empname = '';			

		foreach($employees_query as $row){	

				
			$empname = $row['first_name'].'_'.$row['last_name'];
				

		}
		return $empname;
	}
}
?>
