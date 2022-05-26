<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Berkas extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function tampil_data($nim='')
	{
		$query = $this->db->query("select * from tbl_berkas_alumni where nim='$nim' order by id_berkas desc");
		return $query->result_array();
    }
    public function tampil_where($id='')
	{
		$query = $this->db->query("select * from tbl_berkas_alumni where id_berkas='$id'");
		return $query->row();
    }
    public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_berkas_alumni', $data);
		return $sql;
	}
	public function edit_data($where,$data)
	{
		$res = $this->db->update('tbl_berkas_alumni',$data,$where);
		return $res;
	}
}