<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
	}

	public function get_kelas($id){
		return $this->db->where('id_kelas', $id)
						->get('kelas')
						->result();
	}

	public function get_kelas_by_user(){
		if ($this->session->userdata('level') == "dosen") {
			return $this->db->where('id_user', $this->session->userdata('id_user'))
							->get('kelas')
							->result();
		} else {
			return $this->db->join('anggota', 'anggota.id_kelas = kelas.id_kelas')
							->where('anggota.id_user', $this->session->userdata('id_user'))
							->get('kelas')
							->result();
		}
	}

	public function get_materi_by_class($id){
		return $this->db->join('user', 'user.id_user = kelas.id_user')
						->join('materi', 'materi.id_kelas = kelas.id_kelas')
						->where('materi.id_kelas', $id)
						->get('kelas')
						->result();
	}

	public function buat_kelas(){
		$data = array(
			'kode_kelas' => random_string('alpha', 6),
			'nama_kls' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'id_user' => $this->session->userdata('id_user') );
		$this->db->insert('kelas', $data);

		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function join_kelas(){
		$query = $this->db->where('kode_kelas', $this->input->post('code'))
				 		  ->get('kelas');

		if ($this->db->affected_rows() == 1) {
			$da = $query->row();
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'id_kelas' => $da->id_kelas );
			$this->db->insert('anggota', $data);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tambah_materi($file, $id){
		$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'attach' => $file['file_name'],
			'id_kelas' => $id,
			'tgl' => date('Y-m-d H:i:s'));
		$this->db->insert('materi', $data);
		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file Course_model.php */
/* Location: ./application/models/Course_model.php */