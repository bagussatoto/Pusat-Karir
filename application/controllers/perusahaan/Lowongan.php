<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

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
		$this->load->model('Model_Lowongan');
	}
	public function index()
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Daftar Lowongan";
		$data['daftar'] = $this->Model_Lowongan->tampil_lowongan($data['perusahaan']->id_perusahaan);
		$data['halaman'] = 'perusahaan/daftarLowongan';
		$this->load->view('perusahaan/template',$data);
	}
	public function tambah_lowongan()
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Tambah Lowongan";
		$this->load->model('Model_Pendidikan');
		$this->load->model('Model_Posisi');
		$data['pendidikan'] = $this->Model_Pendidikan->tampil_data();
		$data['posisi'] = $this->Model_Posisi->tampil_data();

		$data['halaman'] = 'perusahaan/tambah_lowongan';
		$this->load->view('perusahaan/template',$data);
	}
	public function edit_lowongan($id_lowongan='')
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Edit Lowongan";
		$this->load->model('Model_Pendidikan');
		$this->load->model('Model_Posisi');
		$this->load->model('Model_Tags');
		// data lowongan yang akan diedit
		$data['daftar'] = $this->Model_Lowongan->tampil_data($id_lowongan);
		// daftar pendidikan
		$data['pendidikan'] = $this->Model_Pendidikan->tampil_data();
		// daftar posisi
		$data['posisi'] = $this->Model_Posisi->tampil_data();
		// daftar pendidikan yang sebelumnya telah dipilih
		$data['pendidikan2'] = $this->Model_Tags->tampil_pendidikan($id_lowongan);
		// daftar posisi yang sebelumnya di pilih
		$data['posisi2'] = $this->Model_Tags->tampil_posisi($id_lowongan);
		// daftar jenis pekerjaan yang sebelumnya di pilih
		$data['jenis'] = $this->Model_Tags->tampil_jenis($id_lowongan);
		$data['halaman'] = 'perusahaan/edit_lowongan';
		$this->load->view('perusahaan/template',$data);
	}
	public function proses_tambah()
	{
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$nm_lowongan = $this->input->post('nm_lowongan');
		$deskripsi = $this->input->post('deskripsi_lowongan');
		$jmlh = $this->input->post('jml_orang');
		$tglDeadline = $this->input->post('tgl_deadline');
		$pendidikan = $this->input->post('pendidikan');
		$posisi = $this->input->post('posisi');
		$jenis = $this->input->post('jenis_pekerjaan');
		if (empty($nm_lowongan)||empty($deskripsi)||empty($jmlh)||empty($pendidikan)||empty($posisi)||empty($jenis)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong !');
			redirect(site_url('perusahaan/lowongan/tambah_lowongan'));
		}else{
			$id_lowongan = '1'.Date('dMYHHmmss');
			$data = array(
				'id_lowongan' => $id_lowongan,
				'id_perusahaan' => $data['perusahaan']->id_perusahaan,
				'nm_lowongan' => $nm_lowongan,
				'jumlah_orang' => $jmlh,
				'deskripsi_lowongan' => $deskripsi,
				'tgl_deadline' => $tglDeadline,
				'status' => 'Dibuka'
			);
			$res = $this->Model_Lowongan->tambah_data($data);
			if ($res>=1) {
				$this->load->model('Model_Tags');
				$no = 0;
				foreach ($pendidikan as $key) {
					$this->Model_Tags->tambah_data(array('id_lowongan'=>$id_lowongan,'tags' => $pendidikan[$no],'keterangan'=>'pendidikan'));
					$no++;
				}
				$no = 0;
				foreach ($posisi as $key) {
					$this->Model_Tags->tambah_data(array('id_lowongan'=>$id_lowongan,'tags' => $posisi[$no],'keterangan'=>'posisi'));
					$no++;
				}
				$no = 0;
				foreach ($jenis as $key) {
					$this->Model_Tags->tambah_data(array('id_lowongan'=>$id_lowongan,'tags' => $jenis[$no],'keterangan'=>'jenis'));
					$no++;
				}
				$this->session->set_flashdata('pesan', 'Data berhasil ditambah !');
				redirect(site_url('perusahaan/lowongan'));
			}
		}
	}
	public function proses_edit($id_lowongan)
	{
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		// mengambil dan menampung nilai post
		$nm_lowongan = $this->input->post('nm_lowongan');
		$deskripsi = $this->input->post('deskripsi_lowongan');
		$jmlh = $this->input->post('jml_orang');
		$tglDeadline = $this->input->post('tgl_deadline');
		$pendidikan = $this->input->post('pendidikan');
		$posisi = $this->input->post('posisi');
		$jenis = $this->input->post('jenis_pekerjaan');
		$status = $this->input->post('status');
		// echo $status;exit;
		// mengecek kosong atau tidaknya data
		if (empty($nm_lowongan)||empty($deskripsi)||empty($jmlh)||empty($pendidikan)||empty($posisi)||empty($jenis)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong !');
			redirect(site_url('perusahaan/lowongan/tambah_lowongan'));
		}else{
			$data = array(
				'id_lowongan' => $id_lowongan,
				'id_perusahaan' => $data['perusahaan']->id_perusahaan,
				'nm_lowongan' => $nm_lowongan,
				'jumlah_orang' => $jmlh,
				'deskripsi_lowongan' => $deskripsi,
				'tgl_deadline' => $tglDeadline,
				'status' => $status
			);
			$res = $this->Model_Lowongan->edit_data(array('id_lowongan' => $id_lowongan ),$data);
			if ($res>=1) {
				$this->load->model('Model_Tags');
				//menghapus tag sebeleumnya
				$this->Model_Tags->hapus_data($id_lowongan);
				//menambah tags
				$no = 0;
				foreach ($pendidikan as $key) {
					$this->Model_Tags->tambah_data(array('id_lowongan'=>$id_lowongan,'tags' => $pendidikan[$no],'keterangan'=>'pendidikan'));
					$no++;
				}
				$no = 0;
				foreach ($posisi as $key) {
					$this->Model_Tags->tambah_data(array('id_lowongan'=>$id_lowongan,'tags' => $posisi[$no],'keterangan'=>'posisi'));
					$no++;
				}
				$no = 0;
				foreach ($jenis as $key) {
					$this->Model_Tags->tambah_data(array('id_lowongan'=>$id_lowongan,'tags' => $jenis[$no],'keterangan'=>'jenis'));
					$no++;
				}
				$this->session->set_flashdata('pesan', 'Data berhasil diupdate !');
				redirect(site_url('perusahaan/lowongan'));

			}
		}
	}
	public function hapus_data($id_lowongan)
	{
		$res = $this->Model_Lowongan->hapus_data($id_lowongan);
		if ($res>=1) {
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus !');
			redirect(site_url('perusahaan/lowongan'));
		}
	}
}
