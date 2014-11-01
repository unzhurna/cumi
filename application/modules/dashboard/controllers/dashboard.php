<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function index()
	{
		$data['alert'] = $this->session->flashdata('alert');
		$data['content'] = $this->load->view('dashboard', '', TRUE);
		$data['script'] = $this->load->view('script', '', TRUE);
		$this->load->view('template', $data);
	}
	
}
