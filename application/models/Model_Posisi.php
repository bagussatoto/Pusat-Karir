<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Posisi extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function tampil_data()
	{
		$query =  $this->db->query("select * from tbl_posisi_jabatan");
		return $query->result_array();
	}

}

/* End of file Model_Posisi.php */
/* Location: ./application/models/Model_Posisi.php */