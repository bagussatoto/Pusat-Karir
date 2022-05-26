<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Tags extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function tampil_tags($id_lowongan='')
	{
		$query = $this->db->query("select * from tbl_lowongan_tags where id_lowongan='$id_lowongan'");
		return $query->result();
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_lowongan_tags', $data);
		return $sql;
	}
	public function hapus_data($id_lowongan)
	{
		$query = $this->db->query("delete from tbl_lowongan_tags where id_lowongan='$id_lowongan'");
		return $query;
	}
	// tampil data pendidikan berdasarkan id_lowongan
	public function tampil_pendidikan($id_lowongan)
	{
		$query =  $this->db->query("select * from tbl_lowongan_tags where id_lowongan='$id_lowongan' AND keterangan='pendidikan'");
		return $query->result_array();
	}	
	// tampil data posisi berdasarkan id_lowongan
	public function tampil_posisi($id_lowongan)
	{
		$query =  $this->db->query("select * from tbl_lowongan_tags where id_lowongan='$id_lowongan' AND keterangan='posisi'");
		return $query->result_array();
	}	
	// tampil data jenis pekerjaan berdasarkan id_lowongan
	public function tampil_jenis($id_lowongan)
	{
		$query =  $this->db->query("select * from tbl_lowongan_tags where id_lowongan='$id_lowongan' AND keterangan='jenis'");
		return $query->result_array();
	}
	// tampil data pendidikan berdasarkan id_lowongan
	public function tampil_lokasi($id_lowongan)
	{
		$query =  $this->db->query("select * from tbl_lowongan_tags where id_lowongan='$id_lowongan' AND keterangan='lokasi'");
		return $query->result_array();
	}	



}

/* End of file Model_Tags.php */
/* Location: ./application/models/Model_Tags.php */