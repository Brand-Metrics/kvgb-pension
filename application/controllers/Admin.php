<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
       parent::__construct();
       $method = $this->input->server('REQUEST_METHOD');
		if ($method == 'DELETE' || $method == 'PUT') {
			// Return an error response or exit
			show_error('DELETE and PUT requests are not allowed.', 403);
		}
       if (!$this->session->userdata('ADMINID')) {
            $this->session->set_flashdata('success', 'User not logged in. Redirecting to login Page');
			$this->load->helper('url');
			redirect(base_url()); exit();
       }$this->load->model('Admin_model');
       
	}
	public function index(){
	    $this->load->view('admin/dashboard');
	}
	

    public function logout() {
        $this->session->unset_userdata('EPF');
        redirect(base_url()); 
    }

    public function form16() {
		$this->load->helper('directory');
		$map = directory_map('./uploads/parta/');
		$data['map'] = $map;
		$this->load->view('form16',$data);
    }
    
     public function addpensioner() {
         $this->form_validation->set_rules('epf','epf','required|trim');
		 $this->form_validation->set_rules('name','name','required|trim');
		 $this->form_validation->set_rules('dob','dob','required|trim');
		 $this->form_validation->set_rules('pancard','pancard','required|trim');
		
		if($this->form_validation->run()){
		    
		    $formArray = array();
		        $formArray['EPF'] = $this->security->xss_clean($this->input->post('epf'));
    			$formArray['PANCARDNO'] = $this->security->xss_clean($this->input->post('pancard'));
    			$formArray['NAME'] = $this->security->xss_clean($this->input->post('name'));
    			$formArray['DOB'] = $this->security->xss_clean($this->input->post('dob'));
                $this->Admin_model->addpensioner($formArray);
			$this->session->set_flashdata('success','Pensioner Added');
			$this->load->view('admin/add-pensioner');	
		}else{
			$this->load->view('admin/add-pensioner');
		}
		
    }
	
	public function deletepensioner($a){
	    
	    $this->db->where('EPF',$a);
	    $this->db->delete('pensioners');
	   redirect(base_url('admin/add-pensioner')); 
	}
	
	
	public function import_pensionslip(){
		
	 	$this->load->library('Excel');
		$content = $this->input->post();
		if (isset($_FILES["file"]["name"])) {
			$data = array();
			 $path = $_FILES["file"]["tmp_name"];
			 $object = PHPExcel_IOFactory::load($path);
			 $ext = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
			 $monthslip =  date('Ym', strtotime($content['datepicker']));
			 if ($ext == 'xlsx' || $ext == 'xls') {
				 foreach ($object->getWorksheetIterator() as $worksheet) {
					
					 $highestRow = $worksheet->getHighestRow();
					 $highestColumn = $worksheet->getHighestColumn();
					 for ($row = 2; $row <= $highestRow; $row++) {
						 $NAR  = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						 $EPF = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						 $PPO  = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						 $STAFF_NAME  = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						 $BRANCH  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						 $BASIC_PENSION  = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						 $DA_Rate  = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						 $DA  = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						 $EXXGRTIA  = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						 $TOTAL_PENSION  = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						 $EPFO  = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						 $COMMUTATION_FACT  = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						 $TDS  = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						 $NET_PENSION_PAYABLE  = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
						 $Month  =  $monthslip;
						 $BENIFICIARY_NAME  = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
						 $NARATION  = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
						 $NARATION2  = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
						 $VERIFIED  = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
					 	$data[] = array(
						 'NAR' => $NAR,
						 'EPF' => $EPF,
						 'PPO' =>$PPO,
						 'STAFF_NAME' =>$STAFF_NAME,
						 'BRANCH' =>$BRANCH,
						 'BASIC_PENSION' =>$BASIC_PENSION,
						 'DA_Rate' =>$DA_Rate,
						 'DA' =>$DA,
						 'exgratia' =>$EXXGRTIA,
						 'TOTAL_PENSION' =>$TOTAL_PENSION,
						 'EPFO' =>$EPFO ,
						 'COMMUTATION_FACT' =>$COMMUTATION_FACT,
						 'TDS' =>$TDS,
						 'NET_PENSION_PAYABLE' =>$NET_PENSION_PAYABLE,
						 'Month' =>$Month,
						 'BENIFICIARY_NAME' =>$BENIFICIARY_NAME,
						 'NARATION' =>$NARATION,
						 'NARATION2' =>$NARATION2,
						 'VERIFIED' =>$VERIFIED);
					 }	
					
				 }

				 $this->db->insert_batch('pensiondata',$data);
				 $this->session->set_flashdata('success','file import successfully');
				 redirect(base_url('admin-dashboard'));
			 }
			 else{
				  $this->session->set_flashdata('failure','file data not inserted');
				 redirect(base_url('admin-dashboard'));
			 }
		 }


	 }
}
