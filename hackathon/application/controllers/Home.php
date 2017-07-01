<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __constructor() {
		parent::__constructor();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
	}
	// this is the home page
	public function index() 
	{
		$data['header']['title'] = 'Home';
		$this->load->view('page_view', $data);
	}

	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('home/index');
	}
}