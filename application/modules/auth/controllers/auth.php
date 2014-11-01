<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}
	
	function index()
	{
		if (!$this->session->userdata('nik'))
		{
			$data['alert'] = $this->session->flashdata('alert');
			$this->load->view('login_page', $data);
		}
		else
		{
			redirect('dashboard');
		}
	}
	
	function login()
	{
		$this->form_validation->set_error_delimiters('<p class"text-danger"><i class="icon-warning-sign"></i> ', '</p>');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|md5');
		//$this->form_validation->set_rules('extension', 'extension', 'trim|required|min_length[6]|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$result = $this->auth_model->check();
		
			if($result)
			{
				$this->session->set_userdata($result);
				$this->session->set_flashdata('alert', '<i class="icon-info-sign"></i> Welcome! You have successfuly sign in');
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('alert', '<i class="icon-warning-sign"></i> Ouch! Ivalid username or password');
				redirect('auth');
			}		
		}
		
	}
	
	function logout()
	{
		$this->session->unset_userdata('nik');			
		$this->session->set_flashdata('alert', '<i class="icon-info-sign"></i> You have successfuly sing out');
		redirect('auth');
	}	

}
