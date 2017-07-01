<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __constructor() {
		parent::__constructor();
		$this->load->helper(array('url', 'html'));
	}
	// this is the home page
	public function index() 
	{
		$this->load->view('test_view');
	}

}