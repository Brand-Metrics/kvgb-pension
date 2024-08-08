<?php 
class Data_model extends CI_model
{
	
	public function addlawyer($formArray)
	{   $this->db->insert('lawyers',$formArray);    }


	public function adddata($formArray)
	{   $this->db->insert('trackdata',$formArray);    }

	
	public function editdevice($formArray,$token)
	
	{   $this->db->where('DeviceId',$token);
	$this->db->update('deviceinformation',$formArray);    }
}