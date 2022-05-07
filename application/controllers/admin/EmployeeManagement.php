<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function all_employees()
    {
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$this->layout->view('all_employees',$data); 
	}
	public function add_employeeDetails()
    {
       
		$data['name'] = $this->session->userdata('name');
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
       	$this->layout->view('add_EmployeeDetails',$data); 

    }
	public function post_add_emp_details(){

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
			'password' => hash('sha512', $this->input->post('password')),
			'aadhaar_number' => $this->input->post('aadhar_number'),
			'pan_number' => $this->input->post('pan_number'),
			'jobtype' => $this->input->post('jobtype'),
			'date_of_joining' => $this->input->post('date_of_joining'),
			'designation' => $this->input->post('designation'),
			'willing_to_relocate' => $this->input->post('relocate'),
			'status' => '1');

				$insert = $this->EmployeeManagement->storeEmployee($data); 
				$insert_id = $this->db->insert_id();

			$emp_number = $this->generateEmpNumber($insert_id);			
			$this->db->where('id' , $insert_id);
			$this->db->update('nbb_employees', array('emp_number'=>$emp_number));

			if($insert_id){
				$address_data = array(
					'emp_id' => $insert_id,
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
					$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_employees');         
				} 

				// Use for qualification
				$qualification = $this->input->post('qualification');
				$institute_university = $this->input->post('institute_university');
				$year_of_passing = $this->input->post('year_of_passing');
				$marks = $this->input->post('marks');
				 
				$total = count($qualification);
				if($qualification){
					for($i=0; $i<$total; $i++ ){
						$qualification_data = array( 
							'emp_id'    =>  $insert_id, 
							'qualification'=>  $qualification[$i],
							'institute_university'=>  $institute_university[$i],
							'year_of_passing'=> $year_of_passing[$i],
							'marks'=>  $marks[$i]
						);
						$insert3 = $this->EmployeeManagement->storeEducationQualification($qualification_data);
					}
				}
				//Use for work experience
				$company_name = $this->input->post('company_name');
				$work = $this->input->post('work');
				$form_date = $this->input->post('form_date');
				$to_date = $this->input->post('to_date');
				 
				$company_nametotal = count($company_name);
				if($company_name){
					for($i=0; $i<$company_nametotal; $i++ ){
						$experience_data = array( 
							'emp_id'    =>  $insert_id, 
							'company_name'=>  $company_name[$i],
							'work_role'=>  $work[$i],
							'form_date'=> $form_date[$i],
							'to_date'=>  $to_date[$i]
						);
						$insert4 = $this->EmployeeManagement->storeWorkExperience($experience_data);
					}
				}
			redirect('employees');		
	}
	public function generateEmpNumber($id)
	{
		return 'NBBE' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
	public function viewEmployeeDetails(){
		$data['name'] = $this->session->userdata('name');
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$empId = $this->uri->segment(4);
		$data['emp_Details'] = $this->EmployeeManagement->getAllemp_Details($empId);
       	$this->layout->view('view_EmployeeDetails',$data); 
	}
	public function post_edit_empaddress(){

		$emp_id = $this->input->post('emp_id');
			$address_data = array(
				'full_address' => $this->input->post('full_address'),
				'land_mark' => $this->input->post('land_mark'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'pincode' => $this->input->post('pin_code'));
	
			$update=$this->Main->update('emp_id',$emp_id, $address_data,'nbb_employee_address');   
			if($update){
				redirect('admin/EmployeeManagement/viewEmployeeDetails/'.$emp_id);
			}			
	}
	public function post_edit_PersonalDeatils(){

		$emp_id = $this->input->post('emp_id');
		$emp_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'date_of_birth' => $this->input->post('date_of_birth'),
			'husband_name' => $this->input->post('husband_name'),
			'gender' => $this->input->post('gender'),
			'mob_no' => $this->input->post('mob_no'),
			'email' => $this->input->post('email'),
			'password' => hash('sha512', $this->input->post('password')),
			'aadhaar_number' => $this->input->post('aadhaar_number'),
			'pan_number' => $this->input->post('pan_number'),
			'jobtype' => $this->input->post('jobtype'),
			'date_of_joining' => $this->input->post('date_of_joining'),
			'designation' => $this->input->post('designation'));
			$update = $this->Main->update('id',$emp_id, $emp_data,'nbb_employees');   
			if($update){
				redirect('admin/EmployeeManagement/viewEmployeeDetails/'.$emp_id);
			}			
	}
	public function empArchive(){
		$empId = $this->uri->segment(4);		
		$this->db->where('id' , $empId);
		$this->db->update('nbb_employees', array('status'=> '0'));

		redirect('employees');
	}
	public function all_ArchiveEmployees()
    {
		$data['allemployees'] = $this->EmployeeManagement->getAllArchiveEmployees();
		$this->layout->view('all_employees',$data); 
	}
	public function allEmployeeSalary(){

		$data['employeeSalary'] = $this->EmployeeManagement->getAllEmployeeSalary();
		$this->layout->view('all_employeeSalary',$data); 
	}
	public function add_employeeSalary(){
		$data['name'] = $this->session->userdata('name');
		$data['lastpay_structure'] = $this->PayStructure->getLastpay_structure();
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
       	$this->layout->view('add_EmpSalary',$data); 
	}
	public function post_add_employeeSalary(){

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
	/*public function edit_employeeSalary(){
		$data['name'] = $this->session->userdata('name');
		$data['lastpay_structure'] = $this->PayStructure->getLastpay_structure();
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$id = $this->uri->segment(4);	
		$data['empSalary'] = $this->EmployeeManagement->geteditEmployeeSalary($id);
       	$this->layout->view('edit_EmpSalary',$data); 
	}*/
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
	}
	public function allLeaveList(){

		$data['name'] = $this->session->userdata('name');
		$data['employee_leave'] = $this->EmployeeManagement->getAllemp_leave();
		$this->layout->view('leaveManagement/all_LeaveList',$data); 

	}
	public function add_employeeleave(){
		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
       	$this->layout->view('leaveManagement/add_LeaveList',$data); 
	}
	public function post_add_empLeave(){
		
		$datetime1 = new DateTime($this->input->post('leave_from'));
        $datetime2 = new DateTime($this->input->post('leave_to'));
		$diff       = date_diff($datetime1,$datetime2);
		$days       = $diff->format("%a")+1;
		
		$data = array(
			'emp_id' 			=> $this->input->post('employeeName'),
			'leave_from' 		=> $datetime1->format('Y-m-d'),
			'leave_to' 			=> $datetime2->format('Y-m-d'),
			'total_leave_days' 	=> $days,
			'reason_for_leave' 	=> $this->input->post('reason_for_leave'));

			$insert = $this->EmployeeManagement->storeEmployeeleave($data); 
			if($insert){
				redirect('admin/employeeManagement/allLeaveList');
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
	public function all_holidaysList()
    {
		$data['name'] = $this->session->userdata('name');
		$data['emp_holidays'] = $this->EmployeeManagement->getAllholidaysList();
		$this->layout->view('all_holidaysList',$data); 
	}
	public function add_holidays(){
		$data['name'] = $this->session->userdata('name');
       	$this->layout->view('add_holidaysList',$data); 
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
	public function update_Leavestatus()
	{
		$status_leaveid = $this->input->post('status_leaveid');
		$leavestatus = $this->input->post('status');

		$this->db->where('id' , $status_leaveid);
		$this->db->update('nbb_employee_leave', array('status'=>$leavestatus));

		redirect('admin/employeeManagement/allLeaveList');

	}
	public function allAttendance(){

		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['employee_Attendance'] = $this->EmployeeManagement->getAllemp_Attendance();
		$this->layout->view('all_Attendance',$data); 
	}
	public function exportEmpAttendance(){

	
		$employeeid =  $this->input->post('employeeName');
		$login_Time =  $this->input->post('login_Time');
		
		$empname = $this->EmployeeManagement->getEmployeeNameDownload_attendance($employeeid);
		
		$header_fields = array('Employee Name', 'Login', 'Logout', 'Work Hours'); 

		// get data 
		$empData = $this->EmployeeManagement->getDownload_attendance($employeeid,$login_Time);


			$delimiter = ","; 
			$filename = "attendance_".$empname.'_'. date('Y-m-d') . ".csv"; 

			// $f = fopen("./uploads/products/csv/".$filename, 'w'); 
			$f = fopen('php://memory', 'w');
			if ($f === false) {
				die('Cannot open the file ' . $filename);
			}

			//$header_fields = array('Order Number', 'Quantity', 'Size'); 
			fputcsv($f, $header_fields, $delimiter); 

			$attendanceData = array();

				foreach($empData as $empDataRow){ 	
					$emp_name = $empDataRow['first_name'].' '.$empDataRow['last_name'];
					$login = $empDataRow['login'];
					$logout = $empDataRow['logout'];
					$work_hours = $empDataRow['work_hours'];
					
					$attendanceData = array($emp_name, $login, $logout, $work_hours); 
					//print_r($productData);
				fputcsv($f, $attendanceData, $delimiter); 
			} 


			rewind($f);
			header('Content-Type: application/csv; charset=UTF-8');
			header('Content-Disposition: attachment; filename="' . $filename . '";');
			fpassthru($f);


	}
}
?>
