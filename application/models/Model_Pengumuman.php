<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Pengumuman extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	/*
	=========================== FrontEnd
	*/
	public function getData($rowno,$rowperpage,$cari) {
		if (!empty($cari)) {
			$query = $this->db->query("select a.id_event,a.id_perusahaan,a.nm_event,a.isi,a.tgl_dibuat,a.foto_cover,b.nm_perusahaan,b.alamat_perusahaan,
				b.noTelp_perusahaan,b.jenis_perusahaan,b.logo_perusahaan
				from tbl_event a inner join tbl_perusahaan b
				on a.id_perusahaan=b.id_perusahaan 
				where a.nm_event like '%$cari%' or b.nm_perusahaan like '%$cari%'
				order by a.id_event desc limit $rowperpage offset $rowno");
		}
		else{
			$query = $this->db->query("select a.id_pengumuman,a.id_lowongan,a.nm_pengumuman,a.isi_pengumuman,a.tgl_dibuat,b.nm_lowongan
				from tbl_pengumuman a inner join tbl_lowongan b
				on a.id_lowongan=b.id_lowongan order by a.id_pengumuman desc limit $rowperpage offset $rowno");
		}
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($cari) {
		if (!empty($cari)) {
			$query = $this->db->query("select a.id_event,a.id_perusahaan,a.nm_event,a.isi,a.tgl_dibuat,a.foto_cover,b.nm_perusahaan,b.alamat_perusahaan,
				b.noTelp_perusahaan,b.jenis_perusahaan,b.logo_perusahaan
				from tbl_event a inner join tbl_perusahaan b
				on a.id_perusahaan=b.id_perusahaan 
				where a.nm_event like '%$cari%' or b.nm_perusahaan like '%$cari%'
				order by a.id_event desc");
		}
		else{
			$query = $this->db->query("select a.id_pengumuman,a.id_lowongan,a.nm_pengumuman,a.isi_pengumuman,a.tgl_dibuat,b.nm_lowongan
				from tbl_pengumuman a inner join tbl_lowongan b
				on a.id_lowongan=b.id_lowongan order by a.id_pengumuman desc");
		}
		return $query->num_rows();
	}
	// tampil detail
	public function detail($id='')
	{
		$query = $this->db->query("select a.id_pengumuman,a.id_lowongan,a.nm_pengumuman,a.isi_pengumuman,a.tgl_dibuat,b.nm_lowongan
				from tbl_pengumuman a inner join tbl_lowongan b
				on a.id_lowongan=b.id_lowongan where id_pengumuman='$id'");
		return $query->row();
	}
	/*
	=========================== Backend
	*/
	public function tampil_data($id_perusahaan)
	{
		$query = $this->db->query("select a.id_pengumuman,a.id_lowongan,a.nm_pengumuman,a.isi_pengumuman,c.id_perusahaan,a.tgl_dibuat
			from tbl_pengumuman a inner join tbl_lowongan b
			on a.id_lowongan=b.id_lowongan
			inner join tbl_perusahaan c
			on c.id_perusahaan=b.id_perusahaan
			where c.id_perusahaan='$id_perusahaan'");
		return $query->result_array();
	}
	public function tampil_data2($id_lowongan)
	{
		$query = $this->db->query("select * from tbl_pengumuman where id_lowongan='$id_lowongan'");
		return $query->result_array();
	}
	public function tampil_edit($id_pengumuman='')
	{
		$query = $this->db->query("select * from tbl_pengumuman where id_pengumuman='$id_pengumuman'");
		return $query->row();
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_pengumuman', $data);
		return $sql;
	}
	// proses edit data pengumuman
	public function edit_data($where,$data)
	{
		$res = $this->db->update('tbl_pengumuman',$data,$where);
		return $res;
	}
	// menghapus data
	public function hapus_data($id_pengumuman)
	{
		$query = $this->db->query("delete from tbl_lowongan where id_pengumuman='$id_pengumuman'");
		return $query;
	}
	public function getTotal()
	{
		$query = $this->db->query("select * from tbl_pengumuman");
		return $query->num_rows();
	}

	public function get($id_pengumuman=null)
    {
        if ($id_pengumuman==null)
        {
            return $this->db->select('*')
                ->from('tbl_pengumuman as peng')
                ->join('tbl_lowongan as low','low.id_lowongan=peng.id_lowongan')
                ->get()->result();
        }else{
            return $this->db->select('*')
                ->from('tbl_pengumuman as peng')
                ->join('tbl_lowongan as low','low.id_lowongan=peng.id_lowongan')
                ->where('id_pengumuman',$id_pengumuman)
                ->get()->row();
        }
    }

    public function del($id_pengumuman)
    {
        return $this->db->where('id_pengumuman', $id_pengumuman)->delete('tbl_pengumuman');
    }
}

/* End of file Model_Pengumuman.php */
/* Location: ./application/models/Model_Pengumuman.php */