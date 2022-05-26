<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $user ='';
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login_A');
        // mengecek apakah sudah login atau belum
        $this->Model_Login_A->cek_session();
        // untuk mengambil data user yang login
        $username = $this->session->userdata('user_a');
        $password = $this->session->userdata('pass_a');
        $this->user = $this->Model_Login_A->cek_user($username,$password);
        $this->user = $username;
    }
    public function index()
    {
		$this->load->model(array('Model_Alumni','Model_Lowongan','Model_Pengumuman','Model_Detail_Pelamar'));
		$data['alumni'] = $this->Model_Alumni->getWhere($this->user);
		$data['judul'] = "Dashboard Alumni";
		$data['halaman'] = 'alumni/home';
        $data['tLowongan'] = $this->Model_Lowongan->getTotal();
        $data['tPengumuman'] = $this->Model_Pengumuman->getTotal();
        $data['tNotif'] = $this->Model_Detail_Pelamar->getTotal($data['alumni']->nim);
        $this->load->view('alumni/template',$data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/alumni/Home.php */