<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

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
		$this->load->model('Model_Pengumuman');
	}
	public function index()
	{
		$data['admin_a'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$this->load->model('Model_Lowongan');
		$data['judul'] = "Daftar Pengumuman";
		$data['pengumuman'] = $this->Model_Pengumuman->get();
		$data['halaman'] = 'perusahaan/pengumuman';
		$this->load->view('admin/template',$data);
	}
	public function tambah_pengumuman()
	{
		$data['admin_a'] = $this->user;
		$this->load->model('Model_Lowongan');
		$data['lowongan'] = $this->Model_Lowongan->get();
		$data['judul'] = "Tambah Pengumuman";
		$data['halaman'] = 'perusahaan/tambah_pengumuman';
		$this->load->view('admin/template',$data);
	}
	public function edit_pengumuman($id_pengumuman)
	{
		$data['admin_a'] = $this->user;
		$this->load->model('Model_Lowongan');
		$data['judul'] = "Edit Pengumuman";
        $data['lowongan'] = $this->Model_Lowongan->get();
		$data['pengumuman'] = $this->Model_Pengumuman->get($id_pengumuman);
		$data['halaman'] = 'perusahaan/edit_pengumuman';
		$this->load->view('admin/template',$data);
	}
	public function proses_tambah($id_lowongan='') 
	{
		$nm_pengumuman = $this->input->post('nmPengumuman');
		$isi = $this->input->post('isi_pengumuman');
		if (empty($id_lowongan)||empty($nm_pengumuman)||empty($isi)) {
			$this->session->set_flashdata('pesan','Data tidak boleh kosong !');
			redirect(site_url('admin/pengumuman/tambah_pengumuman/'.$id_lowongan));
		}else{
			$data = array(
				'id_lowongan' => $id_lowongan,
				'nm_pengumuman' => $nm_pengumuman,
				'isi_pengumuman' => $isi
			);
			$res = $this->Model_Pengumuman->tambah_data($data);
			if ($res>=1) {
				$this->session->set_flashdata('pesan', 'Data pengumuman berhasil ditambah');
				redirect(site_url('admin/pengumuman'));
			}
		}
	}

	public function save()
    {
        $data_save = $this->input->post();
        $simpan = $this->Model_Pengumuman->tambah_data($data_save);
        if ($simpan) {
            $this->session->set_flashdata('pesan', 'Data pengumuman berhasil ditambah');
            redirect(site_url('admin/pengumuman'));
        }else{
            $this->session->set_flashdata('pesan', 'Data pengumuman gagal ditambah');
            redirect(site_url('admin/pengumuman'));
        }
    }
	public function update($id_pengumuman)
	{
		$data_update = $this->input->post();
			$res = $this->Model_Pengumuman->edit_data(array('id_pengumuman' => $id_pengumuman ),$data_update);
			if ($res) {
				$this->session->set_flashdata('pesan', 'Data pengumuman berhasil diedit');
				redirect(site_url('admin/pengumuman'));
			}else{
                $this->session->set_flashdata('pesan', 'Data pengumuman gagal diedit');
                redirect(site_url('admin/pengumuman'));
            }

	}
	public function hapus_data($id_pengumuman)
	{
		$res = $this->Model_Pengumuman->del($id_pengumuman);
		if ($res) {
			$this->session->set_flashdata('pesan', 'Data pengumuman berhasil dihapus');
			redirect(site_url('admin/pengumuman'));
		}else{
            $this->session->set_flashdata('pesan', 'Data pengumuman gagal dihapus');
            redirect(site_url('admin/pengumuman'));
        }
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/perusahaan/Test.php */