<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Perusahaan extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function tampil_dataP(){
		$query = $this->db->query("select * from tbl_perusahaan");
		return $query->result_array();
	} 
	public function getWhere($email)
	{
		$query = $this->db->get_where('tbl_perusahaan', array(
			'email_perusahaan' => $email
		));
		return $query->row();
	}
	public function getAll()
	{
		$query =$this->db->query("select a.status_v,b.id_perusahaan,b.nm_perusahaan,b.alamat_perusahaan,b.email_perusahaan,b.noTelp_perusahaan,
			b.jenis_perusahaan,b.logo_perusahaan,b.surat_izin
			from tbl_verifikasi_p a inner join tbl_perusahaan b
			on a.id_perusahaan=b.id_perusahaan
			where a.status_v='L'");
		return $query->result_array();
	}
	public function getVerifikasi()
	{
		$query = $this->db->query("select a.status_v,b.id_perusahaan,b.nm_perusahaan,b.alamat_perusahaan,b.email_perusahaan,b.noTelp_perusahaan,
			b.jenis_perusahaan,b.logo_perusahaan,b.surat_izin
			from tbl_verifikasi_p a inner join tbl_perusahaan b
			on a.id_perusahaan=b.id_perusahaan
			where a.status_v!='L' order by a.status_v asc");
		return $query->result_array();
	}
	public function getPerusahaan($id)
	{
		$query = $this->db->query("select a.status_v,b.id_perusahaan,b.nm_perusahaan,b.alamat_perusahaan,b.email_perusahaan,b.noTelp_perusahaan,
			b.jenis_perusahaan,b.logo_perusahaan,b.surat_izin
			from tbl_verifikasi_p a inner join tbl_perusahaan b
			on a.id_perusahaan=b.id_perusahaan where a.id_perusahaan='$id'");
		return $query->row();
	}
	// menghapus data
	public function hapus_data($id_perusahaan)
	{
		$query = $this->db->query("delete from tbl_perusahaan where id_perusahaan='$id_perusahaan'");
		return $query;
	}
	public function tambah_data($data)
	{
		$sql = $this->db->insert('tbl_perusahaan', $data);
		return $sql;
	}
	/**
	 * FrontEnd
	 * 
	 */
	public function tampil_data()
	{
		$query = $this->db->query("select * from tbl_perusahaan order by nm_perusahaan desc");
		return $query->result_array();
    }
	public function getData($rowno,$rowperpage,$cari) {
		if (!empty($cari)) {
			$query = $this->db->query("select * from tbl_perusahaan a 
			where a.surat_izin!='' and (a.nm_perusahaan like '%$cari%' or a.jenis_perusahaan like '%$cari%')
				order by a.id_perusahaan desc limit $rowperpage offset $rowno");
		}
		else{
			$query = $this->db->query("select * from tbl_perusahaan a 
			where a.surat_izin!=''
			order by a.nm_perusahaan desc limit $rowperpage offset $rowno");
		}
		return $query->result_array();
	}
	// Select total records
	public function getrecordCount($cari) {
		if (!empty($cari)) {
			$query = $this->db->query("select * from tbl_perusahaan a 
			where a.surat_izin!='' and (a.nm_perusahaan like '%$cari%' or a.jenis_perusahaan like '%$cari%')
				order by a.id_perusahaan desc");
		}
		else{
			$query = $this->db->query("select * from tbl_perusahaan 
			a where a.surat_izin!=''");
		}
		return $query->num_rows();
	}
	public function getDetail($id){
		$data = $this->db->query("select * from tbl_perusahaan where id_perusahaan='$id'");
		return $data->row();
	}

	public function get($id=null)
    {
        if ($id==null)
        {
            return $this->db->get('tbl_perusahaan')->result();
        }else{
            return $this->db->where('id_perusahaan',$id)->get('tbl_perusahaan')->row_object();
        }
    }

    public function save($data)
    {
        return $this->db->insert('tbl_perusahaan', $data);
    }
}

/* End of file Model_Perusahaan.php */
/* Location: ./application/models/Model_Perusahaan.php */