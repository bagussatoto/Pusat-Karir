<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Alumni extends CI_Model {

	public function getWhere($nim)
	{
		$query = $this->db->get_where('tbl_alumni', array(
			'nim' => $nim
		));
		return $query->row();
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_alumni', $data);
		return $sql;
	}
	public function tampil_data()
	{
		$query = $this->db->query("select a.nim,a.nm_alumni,a.alamat,a.thn_angkatan,a.thn_kelulusan,a.noTelp,a.email,a.jurusan,a.keahlian,a.foto from tbl_alumni a inner join tbl_verifikasi_a b on a.nim=b.nim where b.status_v='Y' order by thn_angkatan desc");
		return $query->result_array();
	}
	public function tampil_data_v()
	{
		$query = $this->db->query("select a.nim,a.nm_alumni,a.alamat,a.thn_angkatan,a.thn_kelulusan,a.ipk,a.noTelp,a.email,a.jurusan,a.keahlian, b.id_verifikasi_a,b.status_v,a.foto from tbl_alumni a inner join tbl_verifikasi_a b on a.nim=b.nim where b.status_v='B' order by id_verifikasi_a asc");
		return $query->result_array();
	}
	public function cekAlumni($nim)
	{
		$query = $this->db->query("select a.nim,b.status_v
			from tbl_alumni a inner join tbl_verifikasi_a b
			on a.nim=b.nim where a.nim='$nim'");
		return $query->row();
	}
	public function tampil_dataK($nim='')
	{
		$query = $this->db->query("select lk,pk,tpa,kba,ipk,nim from tbl_alumni");
		return $query->row();
	}
	public function hapus_data($id='')
	{
		$query = $this->db->query("delete from tbl_alumni where nim='$id'");
		return $query;
	}
	public function getP($nim='')
	{
		$query = $this->db->query("SELECT * FROM tbl_pelamar a inner join tbl_lowongan b on a.id_lowongan=b.id_lowongan INNER join tbl_alumni c on a.nim=c.nim inner join tbl_detail_pelamar d on d.id_pelamar=a.id_pelamar inner join tbl_perusahaan e on b.id_perusahaan=e.id_perusahaan inner join tbl_pengumuman f on f.id_lowongan=b.id_lowongan where f.id_lowongan=a.id_lowongan AND a.nim='$nim'");
		return $query->result_array();
	}

}

/* End of file Model_Alumni.php */
/* Location: ./application/models/Model_Alumni.php */