<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	function grid_user()
	{
		$this->load->database();
		$this->load->library('datatables');
		$this->datatables->select('A.id_user, A.nik, A.name, B.name AS tenat', FALSE)
			->from('user A')
			->unset_column('A.id_user')
			->join('tenant B', 'A.id_tenant = B.id_tenant', 'inner')
			->add_column('Actions', $this->get_buttons('$1'), 'A.id_user');
		return $this->datatables->generate();
	}
	
	function get_buttons($id)
	{
		$btn = '<div class="btn-group">';
		$btn .= '<button class="btn btn-xs tooltips" title="Edit" id="btnModal" rel="'.$id.'"><i class="icon-edit"></i></button>';
		$btn .= '<button class="btn btn-xs tooltips" title="Delete"><i class="icon-trash"></i></button>';
	    $btn .= '</div>';
	    return $btn;
	}
	
	function get_user($id)
	{
		$query = $this->db->get_where('users', array('id'=>$id));
		return $query->row_array();
	}

}
