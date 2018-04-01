<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Course_model');
	}
	public function index()
	{
		
	}

	public function kelas(){
		$id = $this->uri->segment(3);
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = "course";
			$data['materi'] = $this->Course_model->get_materi_by_class($id);
			$data['kelas'] = $this->Course_model->get_kelas($id);
			$this->load->view('Template', $data);
		} else {
			redirect('login','refresh');
		}
	}

	public function details(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = "detail_materi";
			$this->load->view('Template', $data);
		} else {
			redirect('login','refresh');
		}
	}

	public function buat_kelas(){
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Course_model->buat_kelas() == TRUE) {
				$this->session->set_flashdata('notif', 'Kelas Berhasil Ditambahkan');
				redirect('home','refresh');
			} else {
				$this->session->set_flashdata('notif', 'Kelas Gagal Ditambahakan');
				redirect('home','refresh');
			}
		} else {
			redirect('login','refresh');
		}
	}

	public function join_kelas(){
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->Course_model->join_kelas() == TRUE) {
				$this->session->set_flashdata('notif', 'Berhasil Bergabung');
				redirect('home','refresh');
			} else {
				$this->session->set_flashdata('notif', 'Gagal Bergabung');
				redirect('home','refresh');
			}
		} else {
			redirect('login','refresh');
		}
	}

	public function tambah_materi(){
		$id = $this->uri->segment(3);
		if ($this->session->userdata('logged_in') == TRUE) {
			$config['upload_path'] = './file';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 2000;

			$this->load->library('upload', $config);

			
			if (  !$this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('notif', $error);
				echo $error;
				redirect('course/kelas/'.$this->upload->display_errors().'','refresh');
			}
			else{
				if ($this->Course_model->tambah_materi($this->upload->data(),$id) == TRUE) {
					$this->session->set_flashdata('notif', 'Materi Berhasil Ditambah');
					redirect('course/kelas/'.$id.'','refresh');	
				} else {
					
				}
			}
			
		} else {
			# code...
		}
		
	}

}

/* End of file Course.php */
/* Location: ./application/controllers/Course.php */