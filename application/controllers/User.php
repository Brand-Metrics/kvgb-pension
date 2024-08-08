<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
       parent::__construct();
	   $method = $this->input->server('REQUEST_METHOD');
		if ($method == 'DELETE' || $method == 'PUT') {
			// Return an error response or exit
			show_error('DELETE and PUT requests are not allowed.', 403);
		}
		
	    if ($this->session->userdata('EPF')) {
			
	    }
	    else {
            echo "No Session Saved";
			$this->session->set_flashdata('fail',"<span class='btn btn-info btn-block fw-bold'>User not logged In</span> <br/>");
			//redirect(base_url()); 
			exit();
        }
    }
	public function index(){
	    
	    $epf = $this->session->userdata('EPF');
		$this->db->where('EPF',$epf);
		$user = $this->db->get('pensioners')->result_array();
		$data['user'] = $user;
		
		$this->load->view('dashboard',$data);
	}
	public function logout() {
        $this->load->library('session');
        $this->session->unset_userdata('ADMIN');
        $this->session->unset_userdata('ADMINID');
        $this->session->unset_userdata('EPF');
        redirect(base_url()); 
    }

    public function form16() {
		$this->load->helper('directory');
		$map = directory_map('./uploads/2024/parta/');
		$data['map'] = $map;
		$this->load->view('form16',$data);
    }
	

	public function pensionslip() {
		$epf = $this->session->userdata('EPF');
		$this->db->select("Month");
		$this->db->distinct("Month");
		$this->db->where('EPF',$epf);
		$this->db->order_by('Month desc');
		$info  = $this->db->get('pensiondata')->result_array();
		//echo $this->db->last_query();
		$data['info'] = $info;
		$this->load->view('pensionslip',$data);
    }
    
    public function arrears() {
		$epf = $this->session->userdata('EPF');
		$this->db->where('EPF',$epf);
		$info  = $this->db->get('commutation')->result_array();
		$data['commutation'] = $info;
		$data['epf'] = $epf;
		
		$this->db->where('EPF',$epf);
		$info2  = $this->db->get('arrears')->result_array();
		$data['arrears'] = $info2;
		
		$this->db->where('EPF',$epf);
		$info3  = $this->db->get('pension_arrears')->result_array();
		$data['pension_arrears'] = $info3;
		
		$this->load->view('arrears',$data);
    }
	
	 public function computerarrears() {
		$epf = $this->session->userdata('EPF');
		$this->db->where('EMPNO',$epf);
		$computer_arrers  = $this->db->get('computer_arrers')->result_array();
		$data['computer_arrers'] = $computer_arrers;
		$data['epf'] = $epf;
		$this->load->view('computer-arrears',$data);
    }
	
	public function pensiondata($a = '') {
		$epf = $this->session->userdata('EPF');
		$this->db->where('EPF',$epf);
		$this->db->where('NAR','PEN');
		$this->db->where('Month',$a);
		$info  = $this->db->get('pensiondata')->result_array();
		$data['info'] = $info;
		
		$this->db->where('EPF',$epf);
		$this->db->where('NAR','ADD');
		$this->db->where('Month',$a);
		$add  = $this->db->get('pensiondata')->result_array();
		if($add){
		$data['add'] = $add;
		}
		
		$this->db->where('EPF',$epf);
		$this->db->where('NAR','REC');
		$this->db->where('Month',$a);
		$rec  = $this->db->get('pensiondata')->result_array();
		if($rec){
		$data['rec'] = $rec;
		}
		
		$this->load->view('pensiondata',$data);
    
    }

	
	
	 public function pdf_pensiondata($a = '')
	 {
		$epf = $this->session->userdata('EPF');
		$this->db->where('EPF',$epf);
		$this->db->where('NAR','PEN');
		$this->db->where('Month',$a);
		$info  = $this->db->get('pensiondata')->result_array();
		$data['info'] = $info;
		
		
		require_once(APPPATH.'helpers/tcpdf/tcpdf.php');
	  $pdf= new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	  $month_name = date("F", mktime(0, 0, 0, substr($info[0]['Month'],4,2), 10)); 
	  $pdf->setTitle('PENSION SLIP'." -".$month_name." ".substr($info[0]['Month'],0,4));
	  $pdf->AddPage();
	  $total=$info[0]["TDS"]+$info[0]["COMMUTATION_FACT"]+$info[0]["EPFO"];
	  $html='<table style="  padding-top: 15px; "><tr><td style="width:20%"><img src="./assets/brand/logo-crop-min.png" height="100px;" width="100px"></td>
	  		<td style="width:80%;"><b style="font-size:20px;">KARNATAKA VIKAS GRAMEENA BANK</b><br>
			 <b style="font-size:15px;">HEAD OFFICE : DHARWAD</b><br>
			<b style="font-size:12px;">PENSION SLIP : '.$month_name." ".substr($info[0]['Month'],0,4).'</b></td></tr></table><br>';
	
	  $html .='<table border="0"  cellpadding="4"style="font-weight:bold">
	  <thead>
		<tr>
		  <th style="width:35%">Emp No : </th>
		  <th style="width:65%">'.$info[0]['EPF'].' </th>
		</tr>
		  <tr>
		  <th scope="col">Pension P. No : </th>
		  <th scope="col">'.$info[0]['PPO'].'</th>
		</tr>
		  <tr>
		  <th scope="col">Name : </th>
		  <th scope="col">'.$info[0]['STAFF_NAME'].'</th>
		</tr>
		  <tr>
		  <th scope="col">Branch : </th>
		  <th scope="col">'.$info[0]['BRANCH'].'</th>
		</tr>
		  <tr>
		  <th scope="col">Beneficiary Name( if any) : </th>
		  <th scope="col">'.$info[0]['BENIFICIARY_NAME'].'</th>
		</tr>
	  </thead>
	</table>  ';
	$html .='<h3>Pension Slip</h3>';
	$html .='<table border="1" cellpadding="4">
				  <thead>
					<tr  style="background-color:#f2f2f2" >
					  <th colspan="2" style="font-weight:bold">EARNINGS </th>
					  <th colspan="2"style="font-weight:bold">DEDUCTIONS</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>BASIC</td>
					  <td>'.$info[0]['BASIC_PENSION'].'</td>
					  <td>EPF</td>
					  <td>'.$info[0]['EPFO'].'</td>
					</tr>
				 	<tr>
					  <td>DA Rate</td>
					  <td>'.$info[0]['DA_Rate'].'</td>
					  <td>COMMUTATION FACT</td>
					  <td>'.$info[0]['COMMUTATION_FACT'].'</td>
					</tr>
				 	<tr>
					  <td>DA</td>
					  <td>'.$info[0]['DA'].'</td>
					  <td>TDS</td>
					  <td>'.$info[0]['TDS'].'</td>
					</tr>
				 	<tr>
					  <th style="font-weight:bold">GROSS</th>
					  <th style="font-weight:bold">'.$info[0]['TOTAL_PENSION'].'</th>
					  <th style="font-weight:bold">TOTAL DEDUCTION</th>
					 
					  <th style="font-weight:bold">'.$total.'</th>
					</tr>
					<tfoot>
					<tr>
					  <th style="font-weight:bold">NET PENSION</th>
					  <th style="font-weight:bold" colspan="3">'.$info[0]['NET_PENSION_PAYABLE'].'</th>
					</tr>
					</tfoot>
				  </tbody>
				  </table>';

			$this->db->where('EPF',$epf);
			$this->db->where('NAR','ADD');
			$this->db->where('Month',$a);
			$add  = $this->db->get('pensiondata')->result_array();
			if($add) {
				foreach($add as $item)
				{	
					$html .="<h3>Addtional Slip</h3>";
					$total_additional=$item['TDS']+$item['COMMUTATION_FACT']+$item['EPFO'];
					$html .='<table border="1" cellpadding="4">
				  <thead>
					<tr  style="background-color:#f2f2f2">
					<th colspan="2" style="font-weight:bold">EARNINGS </th>
					<th colspan="2"style="font-weight:bold">DEDUCTIONS</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>BASIC</td>
					  <td>'. $item['BASIC_PENSION'].'</td>
					  <td>EPF</td>
					  <td>'. $item['EPFO'].'</td>
					</tr>
				 	<tr>
					  <td>DA Rate</td>
					  <td>'.$item['DA_Rate'].'</td>
					  <td>COMMUTATION FACT</td>
					  <td>'.$item['COMMUTATION_FACT'].'</td>
					</tr>
				 	<tr>
					  <td>DA</td>
					  <td>'.$item['DA'].'</td>
					  <td>TDS</td>
					  <td>'. $item['TDS'].'</td>
					</tr>
				 	<tr>
					  <th style="font-weight:bold">GROSS</th>
					  <th style="font-weight:bold">'.$item['TOTAL_PENSION'].'</th>
					  <th style="font-weight:bold">TOTAL DEDUCTION</th>
					  <th style="font-weight:bold">'.$total_additional.'</th>
					</tr>
					<tfoot>
					<tr>
					  <th style="font-weight:bold" >NET PENSION</th>
					  <th  style="font-weight:bold"colspan="3">'.$item['NET_PENSION_PAYABLE'].'</th>
					</tr>
					</tfoot>
				  </tbody>
				  </table>'; 
				  $html .= '<p>*'. $item["BENIFICIARY_NAME"].'</p>';
				  } 
			} 
			$epf = $this->session->userdata('EPF');
			$this->db->where('EPF',$epf);
			$this->db->where('NAR','REC');
			$this->db->where('Month',$a);
			$rec  = $this->db->get('pensiondata')->result_array();
			 if($rec) {
				  foreach($rec as $item) {
					$html .="<h3>Recovery</h3>";
					$total_rec=$item['TDS']+$item['COMMUTATION_FACT']+$item['EPFO'];
					$html .='<table border="1" cellpadding="4">
				  <thead>
					<tr style="background-color:#f2f2f2">
					<th colspan="2" style="font-weight:bold">EARNINGS </th>
					<th colspan="2"style="font-weight:bold">DEDUCTIONS</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>BASIC</td>
					  <td>'. $item['BASIC_PENSION'].'</td>
					  <td>EPF</td>
					  <td>'.$item['EPFO'].'</td>
					</tr>
				 	<tr>
					  <td>DA Rate</td>
					  <td>'.$item['DA_Rate'].'</td>
					  <td>COMMUTATION FACT</td>
					  <td>'.$item['COMMUTATION_FACT'].'</td>
					</tr>
				 	<tr>
					  <td>DA</td>
					  <td>'.$item['DA'].'</td>
					  <td>TDS</td>
					  <td>'. $item['TDS'].'</td>
					</tr>
				 	<tr>
					  <th style="font-weight:bold">GROSS</th>
					  <th style="font-weight:bold">'.$item['TOTAL_PENSION'].'</th>
					  <th style="font-weight:bold">TOTAL DEDUCTION</th>
					  <th style="font-weight:bold">'.$total_rec.'</th>
					</tr>
					<tfoot>
					<tr>
					  <th style="font-weight:bold">NET PENSION</th>
					  <th style="font-weight:bold" colspan="3">'. $item['NET_PENSION_PAYABLE'].'</th>
					</tr>
					</tfoot>
				  </tbody>
				  </table>';
				  $html .='<p>*'.$item["BENIFICIARY_NAME"].'</p>';
				   } 
				  } 
	  $pdf->WriteHTML($html);
	  $pdf->Output('tutorial.pdf','I');


	 }




}
