<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

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
		$this->load->model('Model_Pengumuman');
	}
	public function index()
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$this->load->model('Model_Lowongan');
		$data['judul'] = "Daftar Pengumuman";
		$data['pengumuman'] = $this->Model_Pengumuman->tampil_data($data['perusahaan']->id_perusahaan);
		$data['lowongan'] = $this->Model_Lowongan->tampil_lowongan($data['perusahaan']->id_perusahaan);
		$data['halaman'] = 'perusahaan/pengumuman';
		$this->load->view('perusahaan/template',$data);
	}
	public function tambah_pengumuman($id_lowongan='')
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$this->load->model('Model_Lowongan');
		$data['judul'] = "Daftar Pengumuman";
		$data['lowongan'] = $id_lowongan;
		$data['halaman'] = 'perusahaan/tambah_pengumuman';
		$this->load->view('perusahaan/template',$data);
	}
	public function edit_pengumuman($id_pengumuman='')
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$this->load->model('Model_Lowongan');
		$data['judul'] = "Daftar Pengumuman";
		$data['pengumuman'] = $this->Model_Pengumuman->tampil_edit($id_pengumuman);
		$data['halaman'] = 'perusahaan/edit_pengumuman';
		$this->load->view('perusahaan/template',$data);
	}
	public function proses_tambah($id_lowongan='') 
	{
		$nm_pengumuman = $this->input->post('nmPengumuman');
		$isi = $this->input->post('isi_pengumuman');
		if (empty($id_lowongan)||empty($nm_pengumuman)||empty($isi)) {
			$this->session->set_flashdata('pesan','Data tidak boleh kosong !');
			redirect(site_url('perusahaan/pengumuman/tambah_pengumuman/'.$id_lowongan));
		}else{
			$data = array(
				'id_lowongan' => $id_lowongan,
				'nm_pengumuman' => $nm_pengumuman,
				'isi_pengumuman' => $isi
			);
			$res = $this->Model_Pengumuman->tambah_data($data);
			if ($res>=1) {
				$this->session->set_flashdata('pesan', 'Pengumuman berhasil dibuat');
				redirect(site_url('perusahaan/pengumuman'));
			}
		}
	}
	public function proses_edit($id_pengumuman='') 
	{
		$nm_pengumuman = $this->input->post('nmPengumuman');
		$isi = $this->input->post('isi_pengumuman');
		if (empty($id_pengumuman)||empty($nm_pengumuman)||empty($isi)) {
			$this->session->set_flashdata('pesan','Data tidak boleh kosong !');
			redirect(site_url('perusahaan/pengumuman/edit_pengumuman/'.$id_pengumuman));
		}else{
			$data = array(
				'nm_pengumuman' => $nm_pengumuman,
				'isi_pengumuman' => $isi
			);
			$res = $this->Model_Pengumuman->edit_data(array('id_pengumuman' => $id_pengumuman ),$data);
			if ($res>=1) {
				$this->session->set_flashdata('pesan', 'Pengumuman berhasil diupdate');
				redirect(site_url('perusahaan/pengumuman/'));
			}
		}
	}
	public function hapus_data($id_lowongan)
	{
		$res = $this->Model_Lowongan->hapus_data($id_lowongan);
		if ($res>=1) {
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus !');
			redirect(site_url('perusahaan/pengumuman'));
		}
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/perusahaan/Test.php */