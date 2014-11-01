<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('news_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if (!$this->session->userdata('nik'))
		{
			show_404();
			exit;
		}
	}
		
	function index()
	{
		$data['alert'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('alert');
		$item['source'] = site_url('news/grid_data');
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
		echo $this->news_model->grid_data();
	}
	
	function post_data($id = 0)
	{
		$data['id'] = false;
		$data['title'] = '';
		$data['content'] = '';
		
		if($id != 0)
		{
			$data = (array) $this->news_model->get_data($id);
		}
		
		$this->form_validation->set_rules('title', 'title', 'trim|required');
				
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
			$save['title'] = $this->input->post('title');
			$save['content'] = $this->input->post('content');
			$save['created_at'] = date('Y-m-d H:i:s');
			$save['created_by'] = $this->session->userdata('id');
			
			$this->news_model->save_data($save);
			echo 1;
		}
	}
	
	function delete_data($id)
	{
		$this->news_model->delete_data($id);
		redirect('news');		
	}
	
}
