<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
       parent::__construct();

	   $method = $this->input->server('REQUEST_METHOD');
		if ($method == 'DELETE' || $method == 'PUT') {
			// Return an error response or exit
			show_error('DELETE and PUT requests are not allowed.', 403);
		}

        


    }
	public function index()	{
		$this->form_validation->set_rules('epf','epf','required|trim');
		$this->form_validation->set_rules('pancard','pancard','required|trim');
		$this->form_validation->set_rules('dob','dob','required|trim');
		$content = $this->input->post();

       
        if($this->form_validation->run() ){

			$userIp=$this->input->ip_address(); 
			

			$formArray = array();
			$epf = $this->security->xss_clean($this->input->post('epf'));
			$pancard = $this->security->xss_clean($this->input->post('pancard'));
			$dob = $this->security->xss_clean($this->input->post('dob'));
			
            $this->db->where('EPF',$epf);
			$this->db->where('PANCARDNO',$pancard);
			$this->db->where('DOB',$dob);
			$user = $this->db->get('pensioners')->result_array();	
			if($user){
				
				$newdata = array(
					'EPF'  => $epf
				);
               
				$this->session->set_userdata($newdata);
                redirect(base_url().'dashboard');  
			}	
			else {
             	$this->session->set_flashdata('fail',"<span class='btn btn-info btn-block fw-bold'>Incorrect credentals</span> <br/>");
				redirect(base_url());				
			}
		
		}
        else{

			$this->load->view('login');
		}
		
	}
	
	public function admin()
	{
		$this->form_validation->set_rules('user','user','required|trim');
		$this->form_validation->set_rules('password','password','required|trim');

		if($this->form_validation->run() ){
		$formArray = array();
			$user = $this->security->xss_clean($this->input->post('user'));
			$password = md5($this->security->xss_clean($this->input->post('password')));
			
            $this->db->where('ADMINID',$user);
			$this->db->where('PASSWORD',$password);
			$user = $this->db->get('admin')->result_array();	
			
			if($user){
				$newdata = array(
					'ADMIN'  => $user ,
					'ADMINID' => 'ADMIN'
				);
				$this->session->set_userdata($newdata);
				redirect(base_url().'admin-dashboard');  
			}
			else {
				$this->session->set_flashdata('fail',"<span class='btn btn-info btn-block fw-bold'>Incorrect credentals</span> <br/>");
				redirect(base_url().'random');				
			}
		}
        else{
		$this->load->view('admin');
		}
		
	}
   

    public function page404() {
       
    }
    
    public function forget() {
        $this->form_validation->set_rules('user','user','required|trim');
	
		if($this->form_validation->run() ){
		 $formArray = array();
			$user = $this->security->xss_clean($this->input->post('user'));
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randstring = '';
            for ($i = 0; $i < 10; $i++) {
                $randstring .= $characters[rand(0, 60)];
            }
            
            
            $this->email->from('dit@kvgbank.com', 'Karnataka Vikas Grameena Bank');
            $this->email->to($user);
            $this->email->subject('New Password for Pension portal Admin');
            $this->email->message($randstring);
            if ($this->email->send()) {
                print "success";
            } 
            else {
             print "Could not send email, please try again later";
            }
           
            
            $this->db->where('ADMINID',$user);
            $this->db->set('PASSWORD',md5($randstring));
            $IP = $this->input->ip_address();
            $this->db->set('LOGIN',$IP);
            
			$user = $this->db->update('admin');	
		
    }
    else{
        $this->load->view('forget');
    }
    }
}
