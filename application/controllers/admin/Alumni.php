<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {
	private $user = '';
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
		$this->user = $username;
		$this->load->model('Model_Alumni');
		$this->load->model('Model_Pelamar');
	}
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Dashboard Admin";
		$data['halaman'] = 'admin/alumni';
		$data['daftar'] = $this->Model_Alumni->tampil_data();
		$this->load->view('admin/template',$data);
	}
	public function verifikasi()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Dashboard Admin";
		$data['halaman'] = 'admin/verifikasi_a';
		$data['daftar'] = $this->Model_Alumni->tampil_data_v();
		$this->load->view('admin/template',$data);
	}
	public function proses_verifikasi($nim='',$sts)
	{
		if ($sts=='valid') {
			$sts='Y';
		}else if($sts=='unvalid'){
			$sts='T';
		}else{
			$this->session->set_flashdata('pesan', 'Opss ada yang salah');
			redirect('admin/alumni/verifikasi');
		}
		if (empty($nim)||empty($sts)) {
			$this->session->set_flashdata('pesan', 'Opss ada yang salah');
			redirect('admin/alumni/verifikasi');
		}else{
			$data = array(
				'status_v'=> $sts
			);
			$where = array('nim'=>$nim);
			$this->load->model('Model_Verifikasi_A');
			$res = $this->Model_Verifikasi_A->update_data($where,$data);
			if ($res>=1) {
				$this->session->set_flashdata('pesan', 'Data alumni berhasil diverifikasi');
				redirect('admin/alumni/verifikasi');
			}else{
				$this->session->set_flashdata('pesan', 'Data alumni gagal diverifikasi');
				redirect('admin/alumni/verifikasi');
			}
		}
	}
	public function getAlumni($nim)
	{
		$res = $this->Model_Alumni->getWhere($nim);
		echo json_encode($res);
	}
	public function hapus_data($id)
	{
		$res = $this->Model_Alumni->hapus_data($id);
		if ($res>=1) {
			$this->session->set_flashdata('pesan', 'Data alumni berhasil dihapus');
			redirect(site_url('admin/alumni'));
		}
	}

    public function detail($nim)
    {
        $data['data'] = $this->Model_Alumni->getWhere($nim);
        $this->load->view('admin/alumni/Modal_detail_alumni',$data);
    }
    public function getBerkas($nim)
    {
        $res['data'] = $this->Model_Pelamar->getBerkas($nim);
        $this->load->view('admin/alumni/Modal_berkas',$res);
    }
}