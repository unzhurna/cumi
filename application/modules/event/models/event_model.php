<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {

	function grid_data()
	{
		$this->load->library('datatables');
		$this->datatables->select('A.id, A.event, A.description, A.event_start, A.event_stop')
			->from('events A')
			->unset_column('A.id')
			->join('users B', 'A.created_by = B.id', 'inner')
			->add_column('Actions', $this->get_buttons('$1'), 'A.id');
		return $this->datatables->generate();
	}
	
	function get_buttons($id)
	{
		$btn = '<div class="btn-group">';
		$btn .= '<button class="btn btn-xs tooltips" title="Edit" onclick="return myModal('.$id.')"><i class="icon-edit"></i></button>';
		$btn .= '<button class="btn btn-xs tooltips" title="Delete" onclick="return myConfirm(\''.base_url().'event/delete_data/'.$id.'\')" ><i class="icon-trash"></i></button>';
	    $btn .= '</div>';
	    return $btn;
	}
	
	function get_data($id)
	{
		$query = $this->db->get_where('events', array('id'=>$id));
		return $query->row_array();
	}
	
	function save_data($data)
	{
		if($data['id'])
		{
			$this->db->update('events', $data, array('id'=>$data['id']));
			$this->session->set_flashdata('alert', '<i class="icon-info-sign"></i> Success! Data has been edited');
		}
		else
		{
			$this->db->insert('events', $data);
			$this->session->set_flashdata('alert', '<i class="icon-info-sign"></i> Success! Data has been added');
		}
	}
	
	function delete_data($id)
	{
		$this->db->delete('events', array('id'=>$id));
		$this->session->set_flashdata('alert', '<i class="icon-info-sign"></i> Success! Data has been deleted');
	}

}