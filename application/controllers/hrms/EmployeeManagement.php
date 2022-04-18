<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	
	public function add_employeeDetails()
    {
		$empid = $this->session->userdata('id');
		$data['employeesDetails'] = $this->EmployeeManagement->getAllHrmsEmployees($empid);
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
       	$this->layout_2->view('hrms/add_EmployeeDetails',$data); 

    }
	public function viewEmployeeDetails(){
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$empid = $this->session->userdata('id');
		$data['emp_Details'] = $this->EmployeeManagement->getAllemp_Details($empid);
       	$this->layout_2->view('hrms/view_EmployeeDetails',$data); 
	}
	public function post_edit_emp_details(){

		$emp_id = $this->input->post('emp_id');

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'date_of_birth' => $this->input->post('dob'),
			'husband_name' => $this->input->post('husband_name'),
			'gender' => $this->input->post('gender'),
			'mob_no' => $this->input->post('mobile_number'),
			'email' => $this->input->post('email'),
			'aadhaar_number' => $this->input->post('aadhar_number'),
			'pan_number' => $this->input->post('pan_number'),
			'jobtype' => $this->input->post('jobtype'),
			'date_of_joining' => $this->input->post('date_of_joining'),
			'designation' => $this->input->post('designation'),
			'willing_to_relocate' => $this->input->post('relocate'),
			'status' => '1');

				$update=$this->Main->update('id',$emp_id, $data,'nbb_employees'); 
				
				$employee_address_sql = "SELECT * FROM nbb_employee_address WHERE nbb_employee_address.emp_id = '".$emp_id."'";
				$employee_address_query = $this->db->query($employee_address_sql);
				$employee_address_rownum = $employee_address_query->num_rows();

			if($employee_address_rownum > 0 ){
				$address_data = array(
					'full_address' => $this->input->post('full_address'),
					'land_mark' => $this->input->post('land_mark'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'pincode' => $this->input->post('pin_code'));

				$update2 =$this->Main->update('emp_id',$emp_id, $address_data,'nbb_employee_address');
					
			}else{
				$address_data = array(
					'emp_id' => $emp_id,
					'full_address' => $this->input->post('full_address'),
					'land_mark' => $this->input->post('land_mark'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'pincode' => $this->input->post('pin_code'));
				
					$insert2 = $this->EmployeeManagement->storeEmployeeaddress($address_data);
			}

				$this->load->library('upload');
				if($_FILES['emp_picture']['name'] != '')
				{
	
					$_FILES['file']['name']       = $_FILES['emp_picture']['name'];
					$_FILES['file']['type']       = $_FILES['emp_picture']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['emp_picture']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['emp_picture']['error'];
					$_FILES['file']['size']       = $_FILES['emp_picture']['size'];
	
					// File upload configuration
					$uploadPath = 'uploads/emplyee_img/';
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
						$uploadImgData['employee_photo'] = $imageData['file_name'];
					}
					$update3 =$this->Main->update('id',$emp_id, $uploadImgData,'nbb_employees');         
				} 

				// Use for qualification
				$delete_education_qualification = "DELETE FROM nbb_emp_education_qualification WHERE emp_id = '".$emp_id."'";
				$this->db->query($delete_education_qualification);

				$qualification = $this->input->post('qualification');
				$institute_university = $this->input->post('institute_university');
				$year_of_passing = $this->input->post('year_of_passing');
				$marks = $this->input->post('marks');
				 
				$total = count($qualification);
				if($qualification){
					for($i=0; $i<$total; $i++ ){
						$qualification_data = array( 
							'emp_id'    =>  $emp_id, 
							'qualification'=>  $qualification[$i],
							'institute_university'=>  $institute_university[$i],
							'year_of_passing'=> $year_of_passing[$i],
							'marks'=>  $marks[$i]
						);
						$insert3 = $this->EmployeeManagement->storeEducationQualification($qualification_data);
					}
				}
				//Use for work experience
				$delete_work_experience = "DELETE FROM nbb_work_experience WHERE emp_id = '".$emp_id."'";
				$this->db->query($delete_work_experience);

				$company_name = $this->input->post('company_name');
				$work = $this->input->post('work');
				$form_date = $this->input->post('form_date');
				$to_date = $this->input->post('to_date');
				 
				$company_nametotal = count($company_name);
				if($company_name){
					for($i=0; $i<$company_nametotal; $i++ ){
						$experience_data = array( 
							'emp_id'    =>  $emp_id, 
							'company_name'=>  $company_name[$i],
							'work_role'=>  $work[$i],
							'form_date'=> $form_date[$i],
							'to_date'=>  $to_date[$i]
						);
						$insert4 = $this->EmployeeManagement->storeWorkExperience($experience_data);
					}
				}
			redirect('hrms/employeeManagement/viewEmployeeDetails');		
	}

	public function employeeSalaryDetails(){
		$empid = $this->session->userdata('id');
		$data['employeeSalary'] = $this->EmployeeManagement->getAllHrmsEmployeeSalary($empid);
		$this->layout_2->view('hrms/employeeSalary',$data); 
	}
	public function add_employeeSalary(){
		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
       	$this->layout->view('add_EmpSalary',$data); 
	}
	/*public function post_add_employeeSalary(){

		$data = array(
			'emp_id' => $this->input->post('employeeName'),
			'dept_id' => $this->input->post('designation'),
			'basic_pay' => $this->input->post('basic_pay'),
			'dearness_allowance' => $this->input->post('dearness_allowance'),
			'Provident_fund' => $this->input->post('Provident_fund'),
			'employees_state_insurance' => $this->input->post('employees_state_insurance'),
			//'house_rent_allowance' => $this->input->post('gender'),
			'medical_allowance' => $this->input->post('medical_allowance'),
			'total_earning' => $this->input->post('total_earning'),
			'total_deduction' => $this->input->post('total_deduction'),
			'net_pay' => $this->input->post('net_pay'),
			'status' => '1');

			$insert = $this->EmployeeManagement->storeEmployeesalary($data); 
			if($insert){
				redirect('admin/employeeManagement/allEmployeeSalary');
			}
	}
	public function edit_employeeSalary(){
		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$id = $this->uri->segment(4);	
		$data['empSalary'] = $this->EmployeeManagement->geteditEmployeeSalary($id);
       	$this->layout->view('edit_EmpSalary',$data); 
	}
	public function post_edit_employeeSalary(){
		$empSalaryid = $this->input->post('empSalaryid');
		$data = array(
			'emp_id' => $this->input->post('employeeName'),
			'dept_id' => $this->input->post('designation'),
			'basic_pay' => $this->input->post('basic_pay'),
			'dearness_allowance' => $this->input->post('dearness_allowance'),
			'Provident_fund' => $this->input->post('Provident_fund'),
			'employees_state_insurance' => $this->input->post('employees_state_insurance'),
			//'house_rent_allowance' => $this->input->post('gender'),
			'medical_allowance' => $this->input->post('medical_allowance'),
			'total_earning' => $this->input->post('total_earning'),
			'total_deduction' => $this->input->post('total_deduction'),
			'net_pay' => $this->input->post('net_pay'));

			$update = $this->Main->update('id',$empSalaryid, $data,'nbb_employee_salary');    
			if($update){
				redirect('admin/employeeManagement/edit_employeeSalary'.$empSalaryid);
			}
	}
	public function deleteEmployeeSalary()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $empSalaryId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$empSalaryId,'nbb_employee_salary');
		   if($result==true)
		   {
			   redirect('admin/employeeManagement/allEmployeeSalary');
		   }
	   }
	}*/
	public function allLeaveList(){

		$empid = $this->session->userdata('id');
		$data['employee_leave'] = $this->EmployeeManagement->getHrmsAllemp_leave($empid);
		$this->layout_2->view('hrms/all_LeaveList',$data); 

	}
	public function add_employeeleave(){
		$data['id'] = $this->session->userdata('id');
       	$this->layout_2->view('hrms/add_LeaveList',$data); 
	}
	public function post_add_empLeave(){

		$empid = $this->session->userdata('id');
		
		$datetime1 = new DateTime($this->input->post('leave_from'));
        $datetime2 = new DateTime($this->input->post('leave_to'));
		$diff       = date_diff($datetime1,$datetime2);
		$days       = $diff->format("%a")+1;
		
		$data = array(
			'emp_id' 			=> $empid,
			'leave_from' 		=> $datetime1->format('Y-m-d'),
			'leave_to' 			=> $datetime2->format('Y-m-d'),
			'total_leave_days' 	=> $days,
			'reason_for_leave' 	=> $this->input->post('reason_for_leave'));

			$insert = $this->EmployeeManagement->storeEmployeeleave($data); 
			if($insert){
				redirect('hrms/employeeManagement/allLeaveList');
			}
	}
	
	public function edit_employeeLeave(){
		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$id = $this->uri->segment(4);	
		$data['employee_leave'] = $this->EmployeeManagement->geteditEmployeeLeave($id);
       	$this->layout->view('leaveManagement/edit_EmpLeave',$data); 
	}
	public function post_edit_empLeave(){

		$leaveID = $this->input->post('leaveID');
		$datetime1 = new DateTime($this->input->post('leave_from'));
        $datetime2 = new DateTime($this->input->post('leave_to'));
		$diff       = date_diff($datetime1,$datetime2);
		$days       = $diff->format("%a")+1;
		
		$data = array(
			'emp_id' 			=> $this->input->post('employeeName'),
			'leave_from' 		=> $datetime1->format('Y-m-d H:i:s'),
			'leave_to' 			=> $datetime2->format('Y-m-d H:i:s'),
			'total_leave_days' 	=> $days,
			'reason_for_leave' 	=> $this->input->post('reason_for_leave'));

			$update = $this->Main->update('id',$leaveID, $data,'nbb_employee_leave');    
			if($update){
				redirect('admin/employeeManagement/edit_employeeLeave/'.$leaveID);
			}
	}
	public function deleteEmployeeLeave()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $empLeaveId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$empLeaveId,'nbb_employee_leave');
		   if($result==true)
		   {
			   redirect('admin/employeeManagement/allLeaveList');
		   }
	   }
	}
	public function allAttendance(){
		$empid = $this->session->userdata('id');
		$data['employee_Attendance'] = $this->EmployeeManagement->getHrmsEmployeeAttendance($empid);
       	$this->layout_2->view('hrms/attendance_sit',$data); 
	}
	public function post_add_empAttendance(){

		$empid = $this->session->userdata('id');
		$login_Time = $this->input->post('login_Time');
		
		$data = array(
			'emp_id' 		=> $empid,
			'login' 		=> $login_Time
		);
		$insert = $this->EmployeeManagement->storeEmployeeAttendance($data); 
		if($insert){
			redirect('hrms/employeeManagement/allAttendance');
		}
	}
	public function post_empAttendance_logout(){

		$emp_id = $this->session->userdata('id');
		$attendance_id = $this->input->post('attendance_id');
		$employees_attendance_sql = $this->db->query("SELECT nbb_employees_attendance.login FROM nbb_employees_attendance WHERE nbb_employees_attendance.id = '".$attendance_id."'");
			$attendance_login = '';
			foreach($employees_attendance_sql->result_array() as $employees_attendance_row){
				$attendance_login = $employees_attendance_row['login'];
			}
		
		
		$logout_Time = $this->input->post('logout_Time');
		$total_hrs = 0;
		$total_min = 0;


		$date1 = strtotime($attendance_login);
		$date2 = strtotime($logout_Time); 
		 
		$hours = round(($date2 - $date1) / 3600 ,2);
		//echo $hours.'<br/>';
		$total_hrs = $total_hrs + $hours;
		$total_min = $total_min + round(abs($date2 - $date1) / 60, 2);
		//echo $total_min; 
		//echo $hours;exit;
		$data = array(
			'logout' 		=> $logout_Time,
			'work_hours' => $hours
		);
		$update = $this->Main->update('id',$attendance_id, $data,'nbb_employees_attendance');
		if($update){
			redirect('hrms/employeeManagement/allAttendance');
		}
	}
	public function generateEmpNumber($id)
	{
		return 'NBBE' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
}
?>
