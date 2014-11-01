<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('users_model');
	}
		
	function index()
	{
		$item['source'] = base_url().'users/grid';
		$data['content'] = $this->load->view('list', $item, TRUE);
		$data['script'] = $this->load->view('script', '', TRUE);
		$this->load->view('template', $data);
	}
	
	function grid()
	{
		if(!$this->input->is_ajax_request())
		{
			show_404();
			exit;
		}
		echo $this->users_model->grid_user();
	}	

	function post($id = FALSE)
	{
		if($id)
		{
			$item = (array) $this->users_model->get_user($id);
		}
		else
		{
			$item = array(
				'id'=>$id,
				'nik'=>'',
				'name'=>'',
				'phone'=>'',
				'email'=>'',
				'address'=>'',
				'cti_username'=>'',
				'cti_pin'=>'',
				'cti_password'=>''
			);	
		}
		
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$this->form_validation->set_rules('nik', 'nik', 'trim|required|numeric');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		
		$this->form_validation->set_rules('cti_username', 'CTI username', 'trim|required');
		$this->form_validation->set_rules('cti_pin', 'CTI pin', 'trim|required');
		$this->form_validation->set_rules('cti_password', 'CTI password', 'trim|required');
				
		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = $this->load->view('form', $item, TRUE);
			$this->load->view('template', $data);	
		}
		else
		{
			$save['id'] = $id;
			$save['nik'] = $this->input->post('nik');
			$save['name'] = $this->input->post('name');
			$save['phone'] = $this->input->post('phone');
			$save['email'] = $this->input->post('email');
			$save['address'] = $this->input->post('address');
			$save['cti_username'] = $this->input->post('cti_username');
			$save['cti_pin'] = $this->input->post('cti_pin');
			$save['cti_password'] = $this->input->post('cti_password');
			
			$this->pasien_model->save_user($save);
			redirect('users');
		}
	}
	
	function delete()
	{
		$data['content'] = $this->load->view('form', '', TRUE);
		$this->load->view('template', $data);
	}
	
}
