<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Course_model');
	}
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = "dashboard";
			$data['my_class'] = $this->Course_model->get_kelas_by_user();
			$this->load->view('Template', $data);
		} else {
			redirect('login','refresh');
		}
		
		
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */