<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {

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
        $this->load->model('Model_Pelamar');
    }
    public function index()
	{
		$this->load->model('Model_Perusahaan');
		$this->load->model('Model_Lowongan');
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Daftar Lowongan";
		$data['daftar'] = $this->Model_Lowongan->tampil_lowongan();
		// $data['daftar2'] = $this->Model_Pelamar->tampil_pelamar4();
		$data['halaman'] = 'perusahaan/pelamar';
		$this->load->view('admin/template',$data);
	}
	public function daftar_pelamar($id_lowongan)
	{
		$this->load->model('Model_Perusahaan');
		$this->load->model('Model_Lowongan');
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Daftar Pelamar";
		$data['daftar'] = $this->Model_Lowongan->tampil_lowongan();
		$data['halaman'] = 'perusahaan/daftar_pelamar';
		$this->load->view('admin/template',$data);
	}
	public function daftar($id_lowongan)
	{
		$this->load->model('Model_Perusahaan');
		$this->load->model('Model_Lowongan');
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Daftar Pelamar";
		$data['daftar'] = $this->Model_Pelamar->daftar_pelamar($id_lowongan);
		$data['halaman'] = 'perusahaan/detail_pelamar';
		$this->load->view('admin/template',$data);
	}
	public function status_pelamar($sts,$id)
	{
		if (empty($sts)||empty($id)) {
			$this->session->set_flashdata('pesan', 'Opss ada kesalahan');
			redirect(site_url('admin/pelamar'));
		}else{
			$this->load->model('Model_Detail_Pelamar');
			$data = array(
				'id_pelamar' => $id,
				'status_p' => $sts
			);
			$res = $this->Model_Detail_Pelamar->update_data(array('id_pelamar'=>$id),$data);
			if ($res>=1) {
				$this->session->set_flashdata('pesan', 'Pelamar '.$sts);
				redirect(site_url('admin/pelamar'));
			}
		}
	}
	public function getDetail($id)
	{
		$res = $this->Model_Pelamar->detail_pelamar($id);
		echo json_encode($res);
	}

	public function detail($id)
	{
		$data['data'] = $this->Model_Pelamar->detail_pelamar($id);
		$this->load->view('admin/pelamar/Modal_detail_pelamar',$data);
	}
	public function getBerkas($nim)
	{
		$res['data'] = $this->Model_Pelamar->getBerkas($nim);
		$this->load->view('admin/pelamar/Modal_berkas',$res);
	}

}

/* End of file Pelamar.php */
/* Location: ./application/controllers/perusahaan/Pelamar.php */