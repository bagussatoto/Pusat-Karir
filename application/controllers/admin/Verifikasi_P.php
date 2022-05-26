<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_P extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Admin');
        // mengecek apakah sudah login atau belum
        $this->Model_Admin->cek_session();
        // untuk mengambil data user yang login
        $username = $this->session->userdata('user_ad');
        $password = $this->session->userdata('pass_ad');
        $this->user = $this->Model_Admin->cek_user($username,$password);
        $this->load->model('Model_Verifikasi_P');
        $this->load->model('Model_Perusahaan');
    }
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Dashboard Admin";
		$data['halaman'] = 'admin/verifikasi_P';
		$data['daftar'] = $this->Model_Perusahaan->getVerifikasi();
		$this->load->view('admin/template',$data);
	}
	public function proses_verifikasi($id,$sts)
	{
		if ($sts=='valid') {
			$sts ='L';
		}
		if ($sts=='unvalid') {
			$sts ='T';
		}
		$res = $this->Model_Verifikasi_P->update_data(array('id_perusahaan'=>$id),array('status_v'=>$sts));
		if ($res>=1) {
			$this->session->set_flashdata('pesan', 'Data pelamar berhasil diverifikasi');
			redirect(site_url('admin/verifikasi_p'));
		}else{
			redirect(site_url('admin/verifikasi_p'));
		}
	}
	public function getPerusahaan($id)
	{
		$res = $this->Model_Perusahaan->getPerusahaan($id);
		$data = $res;
		echo json_encode($data);
	}

}

/* End of file Verifikasi_P.php */
/* Location: ./application/controllers/admin/Verifikasi_P.php */