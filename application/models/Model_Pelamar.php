<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Pelamar extends CI_Model {

	public function tampil_pelamar($id_lowongan)
	{
		$query = $this->db->query("select a.id_pelamar,a.id_lowongan,a.nim,b.nm_alumni,b.thn_angkatan,b.thn_kelulusan,b.alamat,b.noTelp,b.email,b.jurusan,b.keahlian
			from tbl_pelamar a inner join tbl_alumni b
			on a.nim=b.nim
			inner join tbl_detail_pelamar c 
			on c.id_pelamar=a.id_pelamar
			where a.id_lowongan='$id_lowongan' and c.status_p!='ditolak' and c.status_p!='diterima'");
		return $query->result_array();
	}
	public function tampil_pelamar2($id_lowongan)
	{
		$query = $this->db->query("select a.id_pelamar,a.id_lowongan,a.nim,b.nm_alumni,b.thn_angkatan,b.thn_kelulusan,b.alamat,b.noTelp,b.email,b.jurusan,b.keahlian
			from tbl_pelamar a inner join tbl_alumni b
			on a.nim=b.nim
			inner join tbl_detail_pelamar c 
			on c.id_pelamar=a.id_pelamar
			where a.id_lowongan='$id_lowongan' and c.status_p='diterima'");
		return $query->result_array();
	}
	public function tampil_pelamar3($id_lowongan)
	{
		$query = $this->db->query("select a.id_pelamar,a.id_lowongan,a.nim,b.nm_alumni,b.thn_angkatan,b.thn_kelulusan,b.alamat,b.noTelp,b.email,b.jurusan,b.keahlian
			from tbl_pelamar a inner join tbl_alumni b
			on a.nim=b.nim
			inner join tbl_detail_pelamar c 
			on c.id_pelamar=a.id_pelamar
			where a.id_lowongan='$id_lowongan' and c.status_p='ditolak'");
		return $query->result_array();
	}
	public function tampil_pelamar4($id_perusahaan)
	{
		$query = $this->db->query("select a.id_pelamar,a.id_lowongan,a.id_lowongan,a.nim,b.nm_alumni,c.id_perusahaan,c.nm_lowongan
		from tbl_pelamar a inner join tbl_alumni b
		on a.nim=b.nim
		inner join tbl_lowongan c
		on a.id_lowongan=c.id_lowongan
		inner join tbl_detail_pelamar d
		on d.id_pelamar=a.id_pelamar
		where c.id_perusahaan='$id_perusahaan' and d.status_p!='Diterima' and d.status_p!='Ditolak'");
		return $query->result_array();
	}
	public function daftar_pelamar($id_lowongan)
	{
		$query = $this->db->query("select a.id_pelamar,a.id_lowongan,a.id_lowongan,a.nim,b.nm_alumni,c.id_perusahaan,c.nm_lowongan, e.nm_perusahaan
		from tbl_pelamar a inner join tbl_alumni b
		on a.nim=b.nim
		inner join tbl_lowongan c
		on a.id_lowongan=c.id_lowongan
		inner join tbl_detail_pelamar d
		on d.id_pelamar=a.id_pelamar
		inner join tbl_perusahaan e 
		on e.id_perusahaan=c.id_perusahaan
		where c.id_lowongan='$id_lowongan'");
		return $query->result_array();
	}
	public function detail_pelamar($id)
	{
		$query = $this->db->query("select b.id_pelamar,a.nim,a.nm_alumni,a.thn_angkatan,a.thn_kelulusan,a.alamat,a.noTelp,a.email,a.jurusan,
		a.keahlian,a.ipk,a.foto,c.status_p
		from tbl_alumni a inner join tbl_pelamar b 
		on b.nim=a.nim
		inner join tbl_detail_pelamar c
		on c.id_pelamar=b.id_pelamar
		 where b.id_pelamar='$id'");
		return $query->row();
	}
	public function detail_pelamar2($id)
	{
		$query = $this->db->query("select b.id_pelamar,a.nim,a.nm_alumni,a.thn_angkatan,a.thn_kelulusan,a.alamat,a.noTelp,a.email,a.jurusan,
		a.keahlian,a.ipk,a.foto,c.status_p
		from tbl_alumni a inner join tbl_pelamar b 
		on b.nim=a.nim
		inner join tbl_detail_pelamar c
		on c.id_pelamar=b.id_pelamar
		 where a.nim='$id'");
		return $query->row();
	}
	public function getBerkas($nim)
	{
		$query = $this->db->query("select * from tbl_berkas_alumni where nim='$nim'");
		return $query->row_object();
	}
	public function getPelamar($nim='')
	{
		$query = $this->db->query("select id_pelamar from tbl_pelamar where nim='$nim' order by id_pelamar desc");
		return $query->row();
	}
	public function getPelamar2($nim='',$id_lowongan='')
	{
		$query = $this->db->query("select id_pelamar from tbl_pelamar where nim='$nim' and id_lowongan='$id_lowongan' order by id_pelamar desc");
		return $query->row();
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_pelamar', $data);
		return $sql;
	}

}

/* End of file Model_Pelamar.php */
/* Location: ./application/models/Model_Pelamar.php */