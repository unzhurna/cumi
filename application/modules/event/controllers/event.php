<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('event_model');
		$this->load->helper(array('form', 'date'));
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
		$item['source'] = site_url('event/grid_data');
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
		echo $this->event_model->grid_data();
	}
	
	function post_data($id = 0)
	{
		$data['id'] = false;
		$data['event'] = '';
		$data['max_call_count'] = 3;
		$data['periode'] = '';
		$data['description'] = '';
		
		
		if($id != 0)
		{
			$data = (array) $this->event_model->get_data($id);
			$data['periode'] = format_dmy($data['event_start']).' - '.format_dmy($data['event_stop']);
		}
		
		$this->form_validation->set_rules('event_name', 'event', 'trim|required');
		$this->form_validation->set_rules('max_call_count', 'max_call_count', 'trim|required|numeric');
		
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
			$periode = explode(' - ', $this->input->post('periode'));
			
			$save['id'] = ($id != 0) ? $id : '';
			$save['event'] = $this->input->post('event_name');
			$save['max_call_count'] = $this->input->post('max_call_count');
			$save['event_start'] = format_ymd($periode[0]);
			$save['event_stop'] = format_ymd($periode[1]);
			$save['description'] = $this->input->post('description');
			$save['created_at'] = date('Y-m-d H:i:s');
			$save['created_by'] = $this->session->userdata('id');
			
			$this->event_model->save_data($save);
			echo 1;
		}
	}
	
	function delete_data($id)
	{
		$this->event_model->delete_data($id);
		redirect('event');		
	}
	
}
