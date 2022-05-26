<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['judul'] = "Login Admin";
		$data['halaman'] = 'login';
		$this->load->view('admin/login',$data);
	}
	public function proses_login()
	{
		$this->load->model('Model_Admin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$terdaftar = $this->Model_Admin->cek_user($username,$password);
		if ($terdaftar) {
			$data_session = array(
				'id_ad' => $terdaftar->id_user_a,
				'user_ad' => $username,
				'pass_ad' => $password,
				'status' => 'admin'
				);

			$this->session->set_userdata($data_session);
			redirect(site_url('admin/home'));
			
		print_r($terdaftar);
		print_r($this->input->post());exit;
		}else{
			redirect(site_url('admin/login'));
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('user_ad');
		$this->session->unset_userdata('pass_ad');
		$this->session->unset_userdata('status');
		redirect(site_url('admin/login'));
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */