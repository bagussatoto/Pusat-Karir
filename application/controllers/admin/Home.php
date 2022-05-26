<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
        $this->load->model(array(
            'model_alumni',
            'model_perusahaan'
        ));
    }
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Dashboard Admin";
		$data['jum_alumni'] = count($this->model_alumni->tampil_data());
		$data['jum_perusahaan'] = count($this->model_perusahaan->get());
		$data['halaman'] = 'admin/home';
		$this->load->view('admin/template',$data);
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */