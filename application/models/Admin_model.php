<?php 
class Admin_model extends CI_model
{
	
	public function addpensioner($formArray)
	{   $this->db->insert('pensioners',$formArray);    }


	public function delpensioner($token)
	{   $this->db->where('epf', $token);
        $this->db->delete('pensioners');
    }

	
	
}