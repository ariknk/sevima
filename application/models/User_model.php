<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function cek_user(){
		$query = $this->db->join('level', 'level.id_level = user.id_level')
						  ->where('email', $this->input->post('email'))
				 		  ->where('password', md5( $this->input->post('password')))
				 		  ->get('user');

		if ($this->db->affected_rows() == 1) {
			$user = $query->row();
			$array = array(
				'logged_in' => TRUE,
				'email' => $user->email,
				'nama' => $user->nama_lengkap,
				'level' => $user->level,
				'id_user' => $user->id_user
			);
			
			$this->session->set_userdata( $array );
			return TRUE;
		} else {
			$this->session->set_flashdata('notif', 'Email Atau Password Salah');
			return FALSE;
		}

	}
	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */