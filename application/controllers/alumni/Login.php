<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login_A');
	}
	public function index()
	{
		$data['judul'] = "Login Alumni";
		$data['halaman'] = 'login';
		$this->load->view('alumni/login',$data);
	}
	public function registrasi()
	{
		$data['judul'] = "Registrasi Alumni";
		$data['halaman'] = 'registrasi';
		$this->load->view('alumni/registrasi',$data);
	}
	public function proses_login()
	{
		$this->load->model('Model_Alumni');
		$username = $this->input->post('nim_a');
		$password = $this->input->post('pass_a');
		$ver =  $this->Model_Alumni->cekAlumni($username);

		if ($ver->status_v=="B") {
			$this->session->set_flashdata('pesan', 'Mohon menunggu, data anda belum diverifikasi admin');
			redirect(site_url('alumni/login'));
		}else if($ver->status_v=="T"){
			$this->session->set_flashdata('pesan', 'Data anda ditolak, karena data yang anda masukan tidak sesuai dengan data kampus');
			redirect(site_url('alumni/login'));
		}else{
			$terdaftar = $this->Model_Login_A->cek_user($username,$password);
			if ($terdaftar) {
				$data_session = array(
					'id_alumni' => $terdaftar->nim,
					'user_a' => $username,
					'pass_a' => $password,
					'status' => 'alumni'
				); 
				$this->session->set_userdata($data_session);
				redirect(site_url('alumni/home'));
			}else{
				redirect(site_url('alumni/login'));
			}
		}
	}
	public function proses_registrasi()
	{
		$nama = $this->input->post('ta_nama');
		$alamat = $this->input->post('ta_alamat');
		$telp = $this->input->post('ta_telp');
		$jurusan = $this->input->post('ta_jurusan');
		$nim = $this->input->post('ta_nim');
		$ipk = $this->input->post('ipk');
		$angkatan = $this->input->post('ta_angkatan');
		$lulus = $this->input->post('ta_lulus');
		$keahlian = $this->input->post('keahlian');
		$password = $this->input->post('ta_password');
		$email = $this->input->post('ta_email');
		$ing = $this->input->post('ta_ing');
		$tpa = $this->input->post('ta_tpa');
		$pk = $this->input->post('ta_pk');
		$foto = $_FILES['ta_foto']['name'];
		$lk = $lulus-$angkatan;
		if (empty($nama)||empty($alamat)||empty($telp)||empty($email)||empty($jurusan)||empty($password)||empty($nim)||empty($ipk)||empty($angkatan)||empty($lulus)||empty($keahlian)|| empty($ing)|| empty($tpa)||empty($pk)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong');print_r($this->input->post());exit;
			redirect(site_url('alumni/login/registrasi'));
		}else{
			// config library upload
			$config['upload_path'] = 'assets/dist/img/alumni/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['file_name']  = $foto;
			$config['overwritten']  = true;
			$config['remove_spaces']  = true;
        	// load library
			$this->load->library('upload', $config); 

			$data2 = array(
				'nim'=>$nim,
				'status_v'=>'B'
			);
			if (!$this->upload->do_upload('ta_foto')) {
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect(site_url('alumni/login/registrasi'));
			}else{
                $nama_file = $this->upload->data('file_name');
                $data = array(
                    'nim' => $nim,
                    'nm_alumni' => $nama,
                    'thn_angkatan' => $angkatan,
                    'thn_kelulusan' => $lulus,
                    'alamat' => $alamat,
                    'noTelp' => $telp,
                    'email' => $email,
                    'jurusan' => $jurusan,
                    'keahlian' => $keahlian,
                    'foto' =>$nama_file,
                    'lk' => $lk,
                    'pk' => $pk,
                    'tpa' => $tpa,
                    'kba' => $ing,
                    'ipk'=>$ipk
                );
				$this->load->model('Model_Alumni');
				$this->load->model('Model_Verifikasi_a');
				$this->load->model('Model_Nilai');
				$res = $this->Model_Alumni->tambah_data($data);
				$res2 = $this->Model_Verifikasi_a->tambah_data($data2);
				for ($i=1; $i <= 5 ; $i++) { 
					if ($i == 1) {
						$sk = $this->lk($lk);
					}else if ($i == 2) {
						$sk = $this->pk($pk);
					}else if ($i == 3) {
						$sk = $this->tpa($tpa);
					}else if ($i == 4) {
						$sk = $this->kba($ing);
					}else{
						$sk = $this->ipk($ipk);
					}
					echo $sk;
					$dnilai = array(
						'nim' => $nim,
						'idKriteria' => $i,
						'idSubKriteria' => $sk
					);
					$res3 = $this->Model_Nilai->tambah_data($dnilai);
				}

				if ($res>=1 && $res2>=1) {
					$data = array(
						'nim' =>$nim,
						'password' =>$password
					);
					$res = $this->Model_Login_A->tambah_data($data);
				}else{
					$this->session->set_flashdata('pesan', 'Registrasi gagal');
					redirect(site_url('alumni/login/registrasi'));
				}
				$this->session->set_flashdata('pesan', 'Registrasi berhasil, mohon menunggu data akan diverifikasi terlebih dahulu oleh admin kemudian hasil verifikasi akan dikirimkan ke email anda. Terimakasih');
				redirect(site_url('alumni/login'));
			}
		}
	}
	public function lk($nl)
	{
		if ($nl<4) {
			$nilai = "1";
		}else if ($nl==4) {
			$nilai = "2";
		}else if ($nl>4 && $nl < 5) {
			$nilai = "3";
		}else if ($nl==5) {
			$nilai = "4";
		}else{
			$nilai = "5";
		}
		return $nilai;
	}
	public function pk($nl)
	{
		if ($nl>3) {
			$nilai = "6";
		}else if ($nl == 3) {
			$nilai = "7";
		}else if ($nl < 3 && $nl >= 2) {
			$nilai = "8";
		}else if ($nl > 1 && $nl < 2) {
			$nilai = "9";
		}else {
			$nilai = "10";
		}
		return $nilai;
	}
	public function tpa($nl)
	{
		if($nl=="86–100") {
			$nilai = "11";
		}else if ($nl == "76–85") {
			$nilai = "12";
		}else if ($nl == "66–75") {
			$nilai = "13";
		}else if ($nl == "51–65") {
			$nilai = "14";
		}else {
			$nilai = "15";
		}
		return $nilai;
	}
	public function kba($nl)
	{
		if ($nl=="Sangat Baik") {
			$nilai = "16";
		}else if ($nl == "Baik") {
			$nilai = "17";
		}else if ($nl == "Cukup") {
			$nilai = "18";
		}else if ($nl == "Kurang") {
			$nilai = "19";
		}else {
			$nilai = "20";
		}
		return $nilai;
	}
	public function ipk($nl)
	{
		if ($nl>=3.5 && $nl<= 4) {
			$nilai = "21";
		}else if ($nl >= 3.26 && $nl< 3.5) {
			$nilai = "22";
		}else if ($nl >= 3 && $nl <3.26) {
			$nilai = "23";
		}else if ($nl >=2.76 && $nl < 3) {
			$nilai = "24";
		}else {
			$nilai = "25";
		}
		return $nilai;
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('user_a');
		$this->session->unset_userdata('pass_a');
		$this->session->unset_userdata('status');
		redirect(site_url('alumni/login'));
	}
}
