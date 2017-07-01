<?php
class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('user_model');
	}
    public function index()
    {
		// get form input
		$userid = $this->input->post("userid");
        $password = $this->input->post("password");

		// form validations
		$this->form_validation->set_rules("userid", "User ID", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$data['header']['title'] = 'Login';
			$this->load->view('login_view', $data);
		}
		else
		{
			// check for user credentials
			$uresult = $this->user_model->get_user($userid, $password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array('login' => TRUE, 'uname' => $uresult[0]->fname, 'uid' => $uresult[0]->id, 'userid' => $uresult[0]->userid, 'access_key' => $uresult[0]->access_key);
				$this->session->set_userdata($sess_data);
				redirect("data/index");
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong User ID or Password!</div>');
				redirect('login/index');
			}
		}
    }
}