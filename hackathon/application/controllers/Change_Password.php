<?php
class change_password extends CI_Controller
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
        $old_password = $this->input->post("old_password");

		// form validation
		$this->form_validation->set_rules("userid", "User ID", "trim|required");
		$this->form_validation->set_rules("old_password", "Old Password", "trim|required");
		$this->form_validation->set_rules("new_password", "New Password", "trim|required");

		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$data['header']['title'] = 'Change Password';
			$this->load->view('change_password_view', $data);
		}
		else
		{
			// check for user credentials
			$uresult = $this->user_model->get_user($userid, $old_password);
			if (count($uresult) > 0)
			{

					$data = array('password' => $this->input->post('new_password'));

					if ($this->user_model->update_user($userid, $old_password, $data))
					{
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Updated your Password.</div>');
						redirect('change_password/index');
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again.</div>');
						redirect('change_password/index');
					}

			}

			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong User ID or Password!</div>');
				redirect('change_password/index');
			}
		}
    }
}