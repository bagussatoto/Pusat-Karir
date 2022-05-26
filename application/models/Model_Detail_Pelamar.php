<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Detail_Pelamar extends CI_Model {

	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_detail_pelamar', $data);
		return $sql;
	}
	public function update_data($where,$data)
	{
		$res = $this->db->update('tbl_detail_pelamar',$data,$where);
		return $res;
	}
	public function status_pelamar($nim='')
	{
		$query = $this->db->query("select a.id_det_pelamar,a.id_pelamar,a.status_p,b.id_lowongan,b.nim,c.nm_lowongan,d.nm_perusahaan,c.id_lowongan
			from tbl_detail_pelamar a inner join tbl_pelamar b
			on a.id_pelamar=b.id_pelamar
			inner join tbl_lowongan c
			on c.id_lowongan=b.id_lowongan
			inner join tbl_perusahaan d
			on d.id_perusahaan=c.id_perusahaan
			where b.nim='$nim'");
		return $query->result_array();
	}
	public function getTotal($nim='')
	{
		$query = $this->db->query("select a.id_det_pelamar,a.id_pelamar,a.status_p,b.id_lowongan,b.nim,c.nm_lowongan,d.nm_perusahaan,c.id_lowongan
			from tbl_detail_pelamar a inner join tbl_pelamar b
			on a.id_pelamar=b.id_pelamar
			inner join tbl_lowongan c
			on c.id_lowongan=b.id_lowongan
			inner join tbl_perusahaan d
			on d.id_perusahaan=c.id_perusahaan
			where b.nim='$nim'");
		return $query->num_rows();
	}

}

/* End of file Model_Detail_Pelamar.php */
/* Location: ./application/models/Model_Detail_Pelamar.php */