<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('user_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
		
	function index()
	{
		$data['alert'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('alert');
		$item['source'] = site_url('user/grid_data');
		$data['content'] = $this->load->view('data_list', $item, TRUE);
		$data['script'] = $this->load->view('data_list_js', '', TRUE);
		$this->load->view('template', $data);
	}
	
	function grid_data()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->user_model->grid_data();
	}
	
	function post_data($id = 0)
	{
		$data['id'] = false;
		$data['user'] = '';
		$data['description'] = '';
		
		if($id != 0)
		{
			$data = (array) $this->user_model->get_data($id);
		}
		
		$this->form_validation->set_rules('user', 'user', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			if(validation_errors() != FALSE)
			{
				echo validation_errors();
			}
			else
			{
				$this->load->view('data_form', $data);
			}
		}
		else
		{
			$save['id'] = ($id != 0) ? $id : '';
			$save['user'] = $this->input->post('user');
			$save['description'] = $this->input->post('description');
			$save['created_at'] = date('Y-m-d H:i:s');
			$save['created_by'] = $this->session->userdata('id');
			
			$this->user_model->save_data($save);
			echo 1;
		}
	}
	
	function delete_data($id)
	{
		$this->user_model->delete_data($id);
		redirect('user');		
	}
	
}
