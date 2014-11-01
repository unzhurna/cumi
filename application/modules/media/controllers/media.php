<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {

	function index()
	{
		$data['content'] = $this->load->view('taybaw', '', TRUE);
		$this->load->view('template', $data);
	}
	
}
