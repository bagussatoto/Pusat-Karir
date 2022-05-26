<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {

	private $user = '';
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login_P');
        // mengecek apakah sudah login atau belum
        $this->Model_Login_P->cek_session();
        // untuk mengambil data user yang login
        $username = $this->session->userdata('user_p');
        $password = $this->session->userdata('pass_p');
        $this->user = $this->Model_Login_P->cek_user($username,$password);
        $this->user = $username;
        $this->load->model('Model_Pelamar');
    }
    public function index()
	{
		$this->load->model('Model_Perusahaan');
		$this->load->model('Model_Lowongan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Daftar Event";
		$data['daftar'] = $this->Model_Lowongan->tampil_lowongan($data['perusahaan']->id_perusahaan);
		$data['daftar2'] = $this->Model_Pelamar->tampil_pelamar4($data['perusahaan']->id_perusahaan);
		$data['halaman'] = 'perusahaan/pelamar';
		$this->load->view('perusahaan/template',$data);
	}
	public function daftar_pelamar($id_lowongan)
	{
		$this->load->model('Model_Perusahaan');
		$this->load->model('Model_Lowongan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Daftar Event";
		$data['daftar'] = $this->Model_Pelamar->tampil_pelamar($id_lowongan);
		$data['daftar2'] = $this->Model_Pelamar->tampil_pelamar2($id_lowongan);
		$data['daftar3'] = $this->Model_Pelamar->tampil_pelamar3($id_lowongan);
		$data['halaman'] = 'perusahaan/daftar_pelamar';
		$this->load->view('perusahaan/template',$data);
	}
	public function status_pelamar($sts,$id)
	{
		if (empty($sts)||empty($id)) {
			$this->session->set_flashdata('pesan', 'Oopss ada kesalahan');
			redirect(site_url('perusahaan/pelamar'));
		}else{
			$this->load->model('Model_Detail_Pelamar');
			$data = array(
				'id_pelamar' => $id,
				'status_p' => $sts
			);
			$res = $this->Model_Detail_Pelamar->update_data(array('id_pelamar'=>$id),$data);
			if ($res>=1) {
				$this->session->set_flashdata('pesan', 'Pelamar '.$sts);
				redirect(site_url('perusahaan/pelamar'));
			}
		}
	}
	public function getDetail($id)
	{
		$res = $this->Model_Pelamar->detail_pelamar($id);
		echo json_encode($res);
	}
	public function getBerkas($nim)
	{
		$res = $this->Model_Pelamar->getBerkas($nim);
		echo json_encode($res);
	}

}

/* End of file Pelamar.php */
/* Location: ./application/controllers/perusahaan/Pelamar.php */