<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function index()
	{
		$data['content'] = $this->load->view('profile', '', TRUE);
		$this->load->view('template', $data);
	}
	
}
