<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$this->load->model('Model_Event');
		$this->load->model(array(
		    'model_perusahaan'
        ));
	}
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Daftar Event";
		$data['event'] = $this->Model_Event->get();
		$data['halaman'] = 'perusahaan/event';
		$this->load->view('admin/template',$data);
	}
	public function tambah_data()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Tambah Event";
		$data['halaman'] = 'perusahaan/tambah_event';
        $data['perusahaan'] = $this->model_perusahaan->get();
		$this->load->view('admin/template',$data);
	}
	public function edit_data($id_event)
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Edit Event";
		$data['halaman'] = 'perusahaan/edit_event';
        $data['perusahaan'] = $this->model_perusahaan->get();
        $data['event'] = $this->Model_Event->tampil_edit($id_event);
		$this->load->view('admin/template',$data);
	}
	public function proses_tambah()
	{
		$this->load->model('Model_Perusahaan');
		$data['admin_a'] = 'Admin';
		$id_perusahaan = $this->input->post('id_perusahaan');
		$nm_event = $this->input->post('nm_event');
		$isi = $this->input->post('isi');
		$cover = $_FILES['cover']['name'];

		if (empty($cover)) {
			$cover = '';
		}
		$cover = str_ireplace("%20", "_",$cover);
		if (empty($id_perusahaan)||empty($nm_event)||empty($isi)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong');
			redirect(site_url('admin/event/tambah_data'));
		}else{
			$data = array(
				'id_perusahaan' => $id_perusahaan,
				'nm_event' => $nm_event,
				'isi' => $isi,
				'foto_cover' =>$cover
			);
        // config library upload
			$config['upload_path'] = 'assets/dist/img/event/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['file_name']  = $cover;
			$config['overwrite']  = true;
        // load library
			$this->load->library('upload', $config);  
			if (!empty($cover)) {
				if (!$this->upload->do_upload('cover')) {
					$this->session->set_flashdata('pesan',"");
					redirect(site_url('admin/event/'));
				}else{
					$res = $this->Model_Event->tambah_data($data);
					if ($res>=1) {
						$this->session->set_flashdata('pesan', 'Data event berhasil ditambah');
						redirect(site_url('admin/event/'));
					}else{
						$this->session->set_flashdata('pesan', 'Opss ada yang salah');
						redirect(site_url('admin/event/'));
					}
				}
			}else{
				$res = $this->Model_Event->tambah_data($data);
				if ($res>=1) {
					$this->session->set_flashdata('pesan', 'Data event berhasil ditambah');
					redirect(site_url('admin/event/'));
				}else{
					$this->session->set_flashdata('pesan', 'Opss ada yang salah');
					redirect(site_url('admin/event/'));
				}
			}
			
		}
	}
	public function proses_edit($id_event)
	{
		$this->load->model('Model_Perusahaan');
		$data['admin_a'] = 'Admin';
        $id_perusahaan = $this->input->post('id_perusahaan');
		$nm_event = $this->input->post('nama_event');
		$isi = $this->input->post('isi_event');
		$cover = $_FILES['cover']['name'];
		$foto = "";
		if (empty($cover)) {
			$foto = $this->input->post('temp_f');
		}else{
            $cover = str_ireplace("%20", "_",$cover);
			$foto=$cover;
		}
		if (empty($id_perusahaan)||empty($nm_event)||empty($isi)||empty($id_event)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong');
			redirect(site_url('admin/event/edit_data/'.$id_event));
		}else{
			$data = array(
				'nm_event' => $nm_event,
				'isi' => $isi,
				'foto_cover'=> $foto,
				'id_perusahaan'=> $id_perusahaan
			);
			// config library upload
			$config['upload_path'] = 'assets/dist/img/event/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['file_name']  = $foto;
			$config['overwrite']  = true;
        // load library
			if (!empty($cover)) {
				if (!$this->upload->do_upload('cover')) {
					$this->session->set_flashdata('pesan',"");
					redirect(site_url('admin/event/'));
				}else{
					$res = $this->Model_Event->edit_data(array('id_event' => $id_event),$data);
					if ($res>=1) {
						$this->session->set_flashdata('pesan', 'Data event berhasil diedit');
						redirect(site_url('admin/event/'));
					}else{
						$this->session->set_flashdata('pesan', 'Opss ada yang salah');
						redirect(site_url('admin/event/'));
					}
				}
			}else{
				$res = $this->Model_Event->edit_data(array('id_event' => $id_event),$data);
				if ($res>=1) {
					$this->session->set_flashdata('pesan', 'Data event berhasil diedit');
					redirect(site_url('admin/event/'));
				}else{
					$this->session->set_flashdata('pesan', 'Opss ada yang salah');
					redirect(site_url('admin/event/'));
				}
			}
			
		}
	}
	public function hapus_data($id_event)
	{
		$res = $this->Model_Event->hapus_data($id_event);
		if ($res>=1) {
			$this->session->set_flashdata('pesan', 'Data event berhasil dihapus');
			redirect(site_url('admin/event'));
		}
	}
}

/* End of file Event.php */
/* Location: ./application/controllers/perusahaan/Event.php */