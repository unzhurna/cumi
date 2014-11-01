<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller {

	function index()
	{
		$data['content'] = $this->load->view('calendar', '', TRUE);
		$this->load->view('template', $data);
	}
	
}
