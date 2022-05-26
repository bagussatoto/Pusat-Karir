<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login_A extends CI_Model {

	function cek_user($username,$password){
		$query = $this->db->get_where('tbl_login_a', array(
       		'nim' => $username,
       		'password' => $password
		));
		return $query->row();
	}
	function cek_session()
	{
		$userLogin = $this->session->userdata('user_a');
		if (empty($userLogin)) {
			redirect(site_url('alumni/login'));
		}
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_login_a', $data);
		return $sql;
	}

}

/* End of file Model_Login_A.php */
/* Location: ./application/models/Model_Login_A.php */