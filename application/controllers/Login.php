<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('home','refresh');
		} else {
			$this->load->view('Login');
		}
		
	}

	public function cek_user(){
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('home','refresh');
		} else {
			if ($this->User_model->cek_user() == TRUE) {
				redirect('home','refresh');
			} else {
				redirect('login','refresh');
			}		
		}
		
	}

	public function logout(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */