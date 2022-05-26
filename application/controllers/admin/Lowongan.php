<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

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
            'Model_Lowongan',
            'model_pendidikan',
            'model_posisi',
            'model_perusahaan',
        ));
	}
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Daftar Lowongan";
		$data['daftar'] = $this->Model_Lowongan->tampil_lowongan();
		$data['halaman'] = 'admin/daftarLowongan';
		$this->load->view('admin/template',$data);
	}
	public function tambah_lowongan()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Tambah Lowongan";
		$this->load->model('Model_Pendidikan');
		$this->load->model('Model_Posisi');
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->get();
		$data['pendidikan'] = $this->Model_Pendidikan->tampil_data();
		$data['posisi'] = $this->Model_Posisi->tampil_data();

		$data['halaman'] = 'admin/tambahLowongan';
		$this->load->view('admin/template',$data);
	}
	public function proses_tambah()
	{
		$nm_lowongan = $this->input->post('nm_lowongan');
		$deskripsi = $this->input->post('deskripsi_lowongan');
		$jmlh = $this->input->post('jml_orang');
		$tglDeadline = $this->input->post('tgl_deadline');
		$jenis = $this->input->post('jenis_pekerjaan');
		$id_perusahaan = $this->input->post('id_perusahaan');
		$id_posisi_jabatan = $this->input->post('id_posisi_jabatan');
		$id_pendidikan = $this->input->post('id_pendidikan');
		if (empty($nm_lowongan)||empty($jmlh)||empty($id_pendidikan)||empty($id_posisi_jabatan)||empty($jenis)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong');
			redirect(site_url('admin/lowongan/tambah_lowongan'));
		}else{
			$data = array(
				'id_perusahaan' => $id_perusahaan,
				'nm_lowongan' => $nm_lowongan,
				'jumlah_orang' => $jmlh,
				'deskripsi_lowongan' => $deskripsi,
				'tgl_deadline' => $tglDeadline,
				'id_pendidikan' => $id_pendidikan,
				'id_posisi_jabatan' => $id_posisi_jabatan,
				'jenis_pekerjaan' => $jenis,
				'status' => 'Dibuka'
			);
			$res = $this->Model_Lowongan->tambah_data($data);
			if ($res>=1) {

				$this->session->set_flashdata('pesan', 'Data lowongan berhasil ditambah');
				redirect(site_url('admin/lowongan'));
			}else{
                $this->session->set_flashdata('pesan', 'Data lowongan gagal ditambah');
                redirect(site_url('admin/lowongan/tambah_lowongan'));
            }
		}
	}
    public function edit($id_lowongan)
    {
        $data['admin_a'] = 'Admin';
        $data['judul'] = "Edit Lowongan";
        $data['perusahaan'] = $this->model_perusahaan->get();
        $data['pendidikan'] = $this->model_pendidikan->tampil_data();
        $data['posisi'] = $this->model_posisi->tampil_data();
        $data['lowongan'] = $this->Model_Lowongan->get($id_lowongan);
        $data['id_lowongan'] = $id_lowongan;
        $data['halaman'] = 'admin/V_edit_lowongan';
        $this->load->view('admin/template',$data);
    }

    public function proses_edit($id_lowongan)
    {
        $nm_lowongan = $this->input->post('nm_lowongan');
        $deskripsi = $this->input->post('deskripsi_lowongan');
        $jmlh = $this->input->post('jml_orang');
        $tglDeadline = $this->input->post('tgl_deadline');
        $jenis = $this->input->post('jenis_pekerjaan');
        $id_perusahaan = $this->input->post('id_perusahaan');
        $id_posisi_jabatan = $this->input->post('id_posisi_jabatan');
        $id_pendidikan = $this->input->post('id_pendidikan');
        if (empty($nm_lowongan)||empty($jmlh)||empty($id_pendidikan)||empty($id_posisi_jabatan)||empty($jenis)) {
            $this->session->set_flashdata('pesan', 'Data tidak boleh kosong');
            redirect(site_url('admin/lowongan/edit/'.$id_lowongan));
        }else{
            $data = array(
                'id_perusahaan' => $id_perusahaan,
                'nm_lowongan' => $nm_lowongan,
                'jumlah_orang' => $jmlh,
                'deskripsi_lowongan' => $deskripsi,
                'tgl_deadline' => $tglDeadline,
                'id_pendidikan' => $id_pendidikan,
                'id_posisi_jabatan' => $id_posisi_jabatan,
                'jenis_pekerjaan' => $jenis,
                'status' => 'Dibuka'
            );
            $res = $this->Model_Lowongan->update($id_lowongan,$data);
            if ($res) {

                $this->session->set_flashdata('pesan', 'Data lowongan berhasil diedit');
                redirect(site_url('admin/lowongan'));
            }else{
                $this->session->set_flashdata('pesan', 'Data lowongan gagal diedit');
                redirect(site_url('admin/lowongan'));
            }
        }
    }

    public function hapus($id_lowongan)
    {
        $hapus = $this->db->where('id_lowongan',$id_lowongan)->delete('tbl_lowongan');
        if ($hapus) {

            $this->session->set_flashdata('pesan', 'Data lowongan berhasil dihapus');
            redirect(site_url('admin/lowongan'));
        }else{
            $this->session->set_flashdata('pesan', 'Data lowongan gagal dihapus');
            redirect(site_url('admin/lowongan'));
        }
    }

}