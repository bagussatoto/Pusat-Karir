<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	}
	public function index()
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Dashboard Perusahaan";
		$data['halaman'] = 'perusahaan/home';
		$this->load->view('perusahaan/template',$data);
	}
}
