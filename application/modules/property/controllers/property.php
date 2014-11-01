<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller {

	function index()
	{
		$data['content'] = $this->load->view('list', '', TRUE);
		$this->load->view('template', $data);
	}
	
}
