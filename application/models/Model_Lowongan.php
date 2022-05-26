<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Lowongan extends CI_Model {

	public function tampil_data_f($offset='',$limit='')
	{
		if (empty($offset)&& empty($limit)) {
			$query = $this->db->query("select  a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
				from tbl_lowongan a inner JOIN tbl_perusahaan b
				on a.id_perusahaan=b.id_perusahaan
				order by a.id_lowongan desc limit 3 offset 0");
		}else{
			$query = $this->db->query("select  a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
				from tbl_lowongan a inner JOIN tbl_perusahaan b
				on a.id_perusahaan=b.id_perusahaan
				order by a.id_lowongan desc limit $limit offset $offset");
		}
		return $query->result_array();
	}
	// tampil detail
	public function detail($id='')
	{
		$query = $this->db->query("select  a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan,b.noTelp_perusahaan,b.jenis_perusahaan
				from tbl_lowongan a inner JOIN tbl_perusahaan b
				on a.id_perusahaan=b.id_perusahaan where id_lowongan='$id'");
		return $query->row();
	}
	
	public function getData($rowno,$rowperpage,$filter,$cari) {
		if (!empty($cari)) {
			// $query = $this->db->query("select  DISTINCT a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,
			// 	a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
			// 	from tbl_lowongan a inner JOIN tbl_perusahaan b
			// 	on a.id_perusahaan=b.id_perusahaan
			// 	inner join tbl_lowongan_tags c
			// 	on c.id_lowongan=a.id_lowongan
			// 	where c.tags like '%$cari%' or a.nm_lowongan like '%$cari%' or b.nm_perusahaan like '%$cari%'
			// 	order by a.id_lowongan desc limit $rowperpage offset $rowno");
			$query = $this->db->select('*,low.id_lowongan')
            	->from('tbl_lowongan as low')
            	->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            	->join('tbl_pendidikan as pen','pen.id_pendidikan=low.id_pendidikan')
            	->join('tbl_posisi_jabatan as posjab','posjab.id_posisi_jabatan=low.id_posisi_jabatan')
            	->like('nm_lowongan',$cari,'both')
            	->like('nm_perusahaan',$cari,'both')
            	->limit($rowperpage)
            	->offset($rowno)
            	->get();
		}
		else if (empty($filter)) {
			// $query = $this->db->query("select  DISTINCT a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,
			// 	a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
			// 	from tbl_lowongan a inner JOIN tbl_perusahaan b
			// 	on a.id_perusahaan=b.id_perusahaan
			// 	inner join tbl_lowongan_tags c
			// 	on c.id_lowongan=a.id_lowongan
			// 	order by a.id_lowongan desc limit $rowperpage offset $rowno");
			 $query = $this->db->select('*,low.id_lowongan')
            	->from('tbl_lowongan as low')
            	->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            	->join('tbl_pendidikan as pen','pen.id_pendidikan=low.id_pendidikan')
            	->join('tbl_posisi_jabatan as posjab','posjab.id_posisi_jabatan=low.id_posisi_jabatan')
            	->limit($rowperpage)
            	->offset($rowno)
            	->get();
		}
		else{

			// $query = $this->db->query("select  DISTINCT a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,
			// 	a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
			// 	from tbl_lowongan a inner JOIN tbl_perusahaan b
			// 	on a.id_perusahaan=b.id_perusahaan
			// 	inner join tbl_lowongan_tags c
			// 	on c.id_lowongan=a.id_lowongan
			// 	where c.tags='".$filter['k1']."' or c.tags='".$filter['k2']."' or c.tags='".$filter['k3']."'
			// 	order by a.id_lowongan desc limit $rowperpage offset $rowno");
			 $query = $this->db->select('*,low.id_lowongan')
            	->from('tbl_lowongan as low')
            	->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            	->join('tbl_pendidikan as pen','pen.id_pendidikan=low.id_pendidikan')
            	->join('tbl_posisi_jabatan as posjab','posjab.id_posisi_jabatan=low.id_posisi_jabatan')
            	->limit($rowperpage)
            	->offset($rowno)
            	->get();
		}
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($filter,$cari) {
		if (!empty($cari)) {
			// $query = $this->db->query("select  DISTINCT a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,
			// 	a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
			// 	from tbl_lowongan a inner JOIN tbl_perusahaan b
			// 	on a.id_perusahaan=b.id_perusahaan
			// 	inner join tbl_lowongan_tags c
			// 	on c.id_lowongan=a.id_lowongan
			// 	where c.tags like '%$cari%' or a.nm_lowongan like '%$cari%' or b.nm_perusahaan like '%$cari%'
			// 	order by a.id_lowongan desc");
			$query = $this->db->select('*,low.id_lowongan')
            	->from('tbl_lowongan as low')
            	->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            	->join('tbl_pendidikan as pen','pen.id_pendidikan=low.id_pendidikan')
            	->join('tbl_posisi_jabatan as posjab','posjab.id_posisi_jabatan=low.id_posisi_jabatan')
            	->like('nm_lowongan',$cari,'both')
            	->like('nm_perusahaan',$cari,'both')
            	->get();
		}
		else if (empty($filter)) {
			// $query = $this->db->query("select  DISTINCT a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,
			// 	a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
			// 	from tbl_lowongan a inner JOIN tbl_perusahaan b
			// 	on a.id_perusahaan=b.id_perusahaan
			// 	inner join tbl_lowongan_tags c
			// 	on c.id_lowongan=a.id_lowongan
			// 	order by a.id_lowongan desc");
			 $query = $this->db->select('*,low.id_lowongan')
            	->from('tbl_lowongan as low')
            	->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            	->join('tbl_pendidikan as pen','pen.id_pendidikan=low.id_pendidikan')
            	->join('tbl_posisi_jabatan as posjab','posjab.id_posisi_jabatan=low.id_posisi_jabatan')
            	->get();
		}else{

			// $query = $this->db->query("select  DISTINCT a.id_lowongan,a.id_perusahaan,a.nm_lowongan,a.jumlah_orang,a.deskripsi_lowongan,a.tgl_deadline,a.tgl_dibuat,
			// 	a.`status`,b.nm_perusahaan,b.logo_perusahaan,b.alamat_perusahaan
			// 	from tbl_lowongan a inner JOIN tbl_perusahaan b
			// 	on a.id_perusahaan=b.id_perusahaan
			// 	inner join tbl_lowongan_tags c
			// 	on c.id_lowongan=a.id_lowongan
			// 	where c.tags='".$filter['k1']."' or c.tags='".$filter['k2']."' or c.tags='".$filter['k3']."'
			// 	order by a.id_lowongan desc");
			 $query = $this->db->select('*,low.id_lowongan')
            	->from('tbl_lowongan as low')
            	->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            	->join('tbl_pendidikan as pen','pen.id_pendidikan=low.id_pendidikan')
            	->join('tbl_posisi_jabatan as posjab','posjab.id_posisi_jabatan=low.id_posisi_jabatan')
            	->get();
		}
		return $query->num_rows();
	}
	
	/*
	===================== BackEnd
	*/
	// menampilkan data lowongan sesuai perusahaan yang login
	public function tampil_lowongan($id_perusahaan='')
	{
		$query = $this->db->query("select a.id_lowongan,a.nm_lowongan,a.tgl_dibuat,a.tgl_deadline,b.nm_perusahaan,b.id_perusahaan from tbl_lowongan a inner join tbl_perusahaan b on a.id_perusahaan=b.id_perusahaan  order by id_lowongan desc");
		return $query->result_array();
	}

	public function lowongan_perhitungan()
    {
        return $this->db->select('*')
            ->from('tbl_lowongan as low')
            ->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            ->join('tbl_pelamar as pel','pel.id_lowongan=low.id_lowongan')
            ->get()->result_array();
    }
	// proses edit data lowongan
	public function edit_data($where,$data)
	{
		$res = $this->db->update('tbl_lowongan',$data,$where);
		return $res;
	}
	// menghapus data
	public function hapus_data($id_lowongan)
	{
		$query = $this->db->query("delete from tbl_lowongan where id_lowongan='$id_lowongan'");
		return $query;
	}
	//menampilkan data berdasarkan id_lowongan 
	public function tampil_data($id_lowongan='')
	{
		$query = $this->db->query("select * from tbl_lowongan where id_lowongan='$id_lowongan'");
		return $query->row();
	}
	public function tampil_detail_lowongan()
	{
		$query = $this->db->query("select * from tbl_lowongan");
	}
	public function tampil_pelamar($id='')
	{
		$query = $this->db->query("select * from tbl_pelamar where id_lowongan='$id'");
		return $query->result_array();
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_lowongan', $data);
		return $sql;
	}
	public function getTotal()
	{
		$query = $this->db->query("select * from tbl_lowongan");
		return $query->num_rows();
	}
	public function get($id = null)
    {
        if ($id==null)
        {
            return $this->db->select('*,low.id_lowongan')
            	->from('tbl_lowongan as low')
            	->join('tbl_perusahaan as per','per.id_perusahaan=low.id_perusahaan')
            	->join('tbl_pendidikan as pen','pen.id_pendidikan=low.id_pendidikan')
            	->join('tbl_posisi_jabatan as posjab','posjab.id_posisi_jabatan=low.id_posisi_jabatan')
            	->get()->result();
        }else{
            return $this->db->where('id_lowongan',$id)->get('tbl_lowongan')->row_object();
        }
    }

    public function update($id,$data)
    {
        return $this->db->where('id_lowongan',$id)->update('tbl_lowongan',$data);
    }

}
