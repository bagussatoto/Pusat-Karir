<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Event extends CI_Model {

	public function tampil_data_f()
	{
		$query = $this->db->query("select * from tbl_event order by id_event desc limit 9 ");
		return $query->result_array();
	}
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
			$query = $this->db->query("select a.id_event,a.id_perusahaan,a.nm_event,a.isi,a.tgl_dibuat,a.foto_cover,b.nm_perusahaan,b.alamat_perusahaan,
				b.noTelp_perusahaan,b.jenis_perusahaan,b.logo_perusahaan
				from tbl_event a inner join tbl_perusahaan b
				on a.id_perusahaan=b.id_perusahaan order by a.id_event desc limit $rowperpage offset $rowno");
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
			$query = $this->db->query("select a.id_event,a.id_perusahaan,a.nm_event,a.isi,a.tgl_dibuat,a.foto_cover,b.nm_perusahaan,b.alamat_perusahaan,
				b.noTelp_perusahaan,b.jenis_perusahaan,b.logo_perusahaan
				from tbl_event a inner join tbl_perusahaan b
				on a.id_perusahaan=b.id_perusahaan order by a.id_event desc");
		}
		return $query->num_rows();
	}
	// tampil detail
	public function detail($id='')
	{
		$query = $this->db->query("select a.id_event,a.id_perusahaan,a.nm_event,a.tgl_dibuat,a.foto_cover,b.nm_perusahaan,a.isi
			from tbl_event a inner join tbl_perusahaan b
			on a.id_perusahaan=b.id_perusahaan
			where a.id_event='$id'");
		return $query->row();
	}
	/*
	================= Backend
	*/
	public function tampil_data($id_perusahaan='')
	{
		$query = $this->db->query("select * from tbl_event where id_perusahaan='$id_perusahaan'");
		return $query->result_array();
	}
	public function tampil_data2()
	{
		$query = $this->db->query("select * from tbl_event a inner join tbl_perusahaan b on a.id_perusahaan=b.id_perusahaan");
		return $query->result_array();
	}
	public function tampil_edit($id_event)
	{
		$query = $this->db->query("select * from tbl_event where id_event='$id_event'");
		return $query->row();
	}
	// proses edit data lowongan
	public function edit_data($where,$data)
	{
		$res = $this->db->update('tbl_event',$data,$where);
		return $res;
	}
	// menghapus data
	public function hapus_data($id_event)
	{
		$query = $this->db->query("delete from tbl_event where id_event='$id_event'");
		return $query;
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_event', $data);
		return $sql;
	}

	public function get($id=null)
    {
        if ($id==null)
        {
            return $this->db->select('*')
                ->from('tbl_event as ev')
                ->join('tbl_perusahaan as per','per.id_perusahaan=ev.id_perusahaan')
                ->get()->result();
        }else{
            return $this->db->select('*')
                ->from('tbl_event as ev')
                ->join('perusahaan as per','per.id_perusahaan=ev.id_perusahaan')
                ->where('id_event', $id)
                ->get()->row_object();
        }
    }

}
