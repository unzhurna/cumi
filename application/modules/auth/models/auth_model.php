<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {
    	
  	function check()
	{
		$nik = $this->input->post('username');
		$password = $this->input->post('password');
		$extension = $this->input->post('extension');
		
		$result = $this->db->get_where('users', array('nik' =>$nik, 'password'=>$password));
				
		if ($result->num_rows() > 0)
		{
			return $result->row_array();
		}
		else
		{
			return FALSE;
		}
	}
}
