<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login_P');
	}
	public function index()
	{
		$data['judul'] = "Login Perusahaan";
		$data['halaman'] = 'login';
		$this->load->view('Perusahaan/login',$data);
	}
	public function registrasi()
	{
		$data['judul'] = "Login Perusahaan";
		$data['halaman'] = 'registrasi';
		$this->load->view('Perusahaan/registrasi',$data);
	}
	public function proses_login()
	{
		$this->load->model('Model_Login_P');
		$username = $this->input->post('user_mail');
		$password = $this->input->post('pass_l');
		$terdaftar = $this->Model_Login_P->cek_user($username,$password);
		if ($terdaftar) {
			$data_session = array(
				'id_user' => $terdaftar->id_user,
				'user_p' => $username,
				'pass_p' => $password,
				'status' => 'perusahaan'
			);

			$this->session->set_userdata($data_session);
			// print_r($this->session->userdata());
			redirect(site_url('perusahaan/home'));
		}else{
			redirect(site_url('perusahaan/login'));
		}
	}
	public function proses_registrasi()
	{
		$nama = $this->input->post('nmPerusahaan');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$jenis = $this->input->post('tj_perusahaan');
		$pass = $this->input->post('pass');
		$logo = $_FILES['logo']['name'];
		if (empty($nama)||empty($alamat)||empty($telp)||empty($email)||empty($jenis)||empty($pass)||empty($logo)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong');
			redirect(site_url('perusahaan/login/registrasi'));
		}else{
			// config library upload
			$config['upload_path'] = 'assets/dist/img/perusahaan/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['file_name']  = $logo;
			$config['overwrite']  = true;
        // load library
			$this->load->library('upload', $config); 
			$data = array(
				'nm_perusahaan' => $nama,
				'alamat_perusahaan' => $alamat,
				'email_perusahaan' => $email,
				'noTelp_perusahaan' => $telp,
				'jenis_perusahaan' => $jenis,
				'logo_perusahaan' => $logo 
			);
			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('pesan', 'Registrasi Gagal');
				redirect(site_url('perusahaan/login/registrasi'));
			}else{
				$this->load->model('Model_Perusahaan');
				$res = $this->Model_Perusahaan->tambah_data($data);
				if ($res>=1) {
					$data = array(
						'email' =>$email,
						'password' =>$pass
					);
					$res = $this->Model_Login_P->tambah_data($data);
					if ($res>=1) {
						$this->load->model('Model_Verifikasi_P');
						$pr = $this->Model_Perusahaan->getWhere($email);
						$data = array('id_perusahaan' => $pr->id_perusahaan,'status_v'=>'B' );
						$this->Model_Verifikasi_P->tambah_data($data);
					}
				}
				$this->session->set_flashdata('pesan', 'registrasi berhasil');
				redirect(site_url('perusahaan/login'));
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('user_p');
		$this->session->unset_userdata('pass_p');
		$this->session->unset_userdata('status');
		redirect(site_url('perusahaan/login'));
	}

}
