<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Nilai extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function tampil_nilai($nim='')
	{
		$query = $this->db->query("SELECT b.nilaiBobot FROM tbl_nilai a INNER JOIN tbl_subkriteria b on 
			a.idSubKriteria=b.idSubKriteria where a.nim='$nim'");
		return $query->result_array();
	}
	public function tambah_data($data){
		$query = $this->db->insert('tbl_nilai', $data);
		return $query;
	}
}