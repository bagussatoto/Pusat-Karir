<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$this->load->model('Model_Event');
	}
	public function index()
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Daftar Event";
		$data['event'] = $this->Model_Event->tampil_data($data['perusahaan'] ->id_perusahaan);
		$data['halaman'] = 'perusahaan/event';
		$this->load->view('perusahaan/template',$data);
	}
	public function tambah_data()
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Tambah Event";
		$data['halaman'] = 'perusahaan/tambah_event';
		$this->load->view('perusahaan/template',$data);
	}
	public function edit_data($id_event)
	{
		$data['user_l'] = $this->user;
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$data['judul'] = "Edit Event";
		$data['halaman'] = 'perusahaan/edit_event';
		$data['event'] = $this->Model_Event->tampil_edit($id_event);
		$this->load->view('perusahaan/template',$data);
	}
	public function proses_tambah()
	{
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$id_perusahaan = $data['perusahaan']->id_perusahaan;
		$nm_event = $this->input->post('nama_event');
		$isi = $this->input->post('isi_event');
		$cover = $_FILES['cover']['name'];

		if (empty($cover)) {
			$cover = '';
		}
		$cover = str_ireplace("%20", "_",$cover);
		if (empty($id_perusahaan)||empty($nm_event)||empty($isi)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong');
			redirect(site_url('perusahaan/event/tambah_data'));
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
					redirect(site_url('perusahaan/event/'));
				}else{
					$res = $this->Model_Event->tambah_data($data);
					if ($res>=1) {
						$this->session->set_flashdata('pesan', 'Event Berhasil dibuat');
						redirect(site_url('perusahaan/event/'));
					}else{
						$this->session->set_flashdata('pesan', 'Opps ada yang salah');
						redirect(site_url('perusahaan/event/'));
					}
				}
			}else{
				$res = $this->Model_Event->tambah_data($data);
				if ($res>=1) {
					$this->session->set_flashdata('pesan', 'Event Berhasil dibuat');
					redirect(site_url('perusahaan/event/'));
				}else{
					$this->session->set_flashdata('pesan', 'Opps ada yang salah');
					redirect(site_url('perusahaan/event/'));
				}
			}
			
		}
	}
	public function proses_edit($id_event)
	{
		$this->load->model('Model_Perusahaan');
		$data['perusahaan'] = $this->Model_Perusahaan->getWhere($this->user);
		$id_perusahaan = $data['perusahaan']->id_perusahaan;
		$nm_event = $this->input->post('nama_event');
		$isi = $this->input->post('isi_event');
		$cover = $_FILES['cover']['name'];
		$foto = "";
		if (empty($cover)) {
			$foto = $this->input->post('temp_f');
		}else{
			$foto=$cover;
		}
		if (empty($id_perusahaan)||empty($nm_event)||empty($isi)||empty($id_event)) {
			$this->session->set_flashdata('pesan', 'Data tidak boleh kosong');
			redirect(site_url('perusahaan/event/edit_data/'.$id_event));
		}else{
			$data = array(
				'nm_event' => $nm_event,
				'isi' => $isi,
				'foto_cover'=> $cover
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
					redirect(site_url('perusahaan/event/'));
				}else{
					$res = $this->Model_Event->edit_data(array('id_event' => $id_event),$data);
					if ($res>=1) {
						$this->session->set_flashdata('pesan', 'Event Berhasil diupdate');
						redirect(site_url('perusahaan/event/'));
					}else{
						$this->session->set_flashdata('pesan', 'Opps ada yang salah');
						redirect(site_url('perusahaan/event/'));
					}
				}
			}else{
				$res = $this->Model_Event->edit_data(array('id_event' => $id_event),$data);
				if ($res>=1) {
					$this->session->set_flashdata('pesan', 'Event Berhasil diupdate');
					redirect(site_url('perusahaan/event/'));
				}else{
					$this->session->set_flashdata('pesan', 'Opps ada yang salah');
					redirect(site_url('perusahaan/event/'));
				}
			}
			
		}
	}
	public function hapus_data($id_event)
	{
		$res = $this->Model_Event->hapus_data($id_event);
		if ($res>=1) {
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus !');
			redirect(site_url('perusahaan/event'));
		}
	}
}

/* End of file Event.php */
/* Location: ./application/controllers/perusahaan/Event.php */