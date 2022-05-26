<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login_P extends CI_Model {

	function cek_user($username,$password){
		$query = $this->db->get_where('tbl_login_p', array(
       		'email' => $username,
       		'password' => $password
		));
		return $query->row();
	}
	function cek_session()
	{
		$userLogin = $this->session->userdata('user_p');
		if (empty($userLogin)) {
			redirect(site_url('perusahaan/login'));
		}
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_login_p', $data);
		return $sql;
	}

}

/* End of file Model_Login_P.php */
/* Location: ./application/models/Model_Login_P.php */