<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

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
		$this->load->model('Model_Alumni');
		$this->load->model('Model_Pengumuman');
		$data['alumni'] = $this->Model_Alumni->getWhere($this->user);
		$data['daftar'] = $this->Model_Alumni->getP($data['alumni']->nim);
		$data['judul'] = "Dashboard Alumni";
		$data['halaman'] = 'alumni/pengumuman';
		$this->load->view('alumni/template',$data);
    }

}

/* End of file Pemberitahuan.php */
/* Location: ./application/controllers/alumni/Pemberitahuan.php */