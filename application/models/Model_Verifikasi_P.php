<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Verifikasi_P extends CI_Model {

	// proses edit data lowongan
	public function update_data($where,$data)
	{
		$res = $this->db->update('tbl_verifikasi_p',$data,$where);
		return $res;
	}
		public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_verifikasi_p', $data);
		return $sql;
	}

}

/* End of file Model_Verifikasi_P.php */
/* Location: ./application/models/Model_Verifikasi_P.php */