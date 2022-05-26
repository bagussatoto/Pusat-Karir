<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Pendidikan extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function tampil_data()
	{
		$query =  $this->db->query("select * from tbl_pendidikan");
		return $query->result_array();
	}
	public function tampil_data2($id_lowongan)
	{
		$query =  $this->db->query("select * from tbl_pendidikan where id_lowongan='$id_lowongan'");
		return $query->result_array();
	}	

}

/* End of file Model_Pendidikan.php */
/* Location: ./application/models/Model_Pendidikan.php */