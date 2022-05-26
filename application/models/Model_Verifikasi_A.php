<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Verifikasi_A extends CI_Model {

	public function tambah_data($data)
	{
		$query = $this->db->insert('tbl_verifikasi_a', $data);
		return $query;
	}
	public function update_data($where,$data)
	{
		$res = $this->db->update('tbl_verifikasi_a',$data,$where);
		return $res;
	}
}

/* End of file Model_Verifikasi_A.php */
/* Location: ./application/models/Model_Verifikasi_A.php */