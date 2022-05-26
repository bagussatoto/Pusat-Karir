<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

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
        $this->load->model('Model_Perusahaan');
    }
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Dashboard Admin";
		$data['halaman'] = 'admin/perusahaan';
		$data['daftar'] = $this->Model_Perusahaan->tampil_dataP();
		$this->load->view('admin/template',$data);
	}
	public function getPerusahaan($id)
	{
		$res = $this->Model_Perusahaan->getPerusahaan($id);
		$data = $res;
		echo json_encode($data);
	}
	public function hapus_data($id_perusahaan)
	{
		$res = $this->Model_Perusahaan->hapus_data($id_perusahaan);
		if ($res>=1) {
			$this->session->set_flashdata('pesan', 'Data perusahaan berhasil dihapus');
			redirect(site_url('admin/perusahaan'));
		}
	}

	public function show($id_perusahaan)
    {
        $data['data'] = $this->Model_Perusahaan->get($id_perusahaan);
        $this->load->view('admin/perusahaan/Modal_detail_perusahaan',$data);
    }

    public function add()
    {
        $data['admin_a'] = 'Admin';
        $data['judul'] = "Tambah Perusahaan";
        $data['halaman'] = 'admin/add_perusahaan';

        $this->load->view('admin/template',$data);
    }

    public function save()
    {
        $config['upload_path']          = './assets/dist/img/perusahaan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2080;
        $config['remove_spaces']        = true;

        $this->load->library('upload', $config);
        $data_save = $this->input->post();
        if ( ! $this->upload->do_upload('logo_perusahaan'))
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
        else
        {
            $data_save['logo_perusahaan'] = $this->upload->data('file_name');
            $simpan = $this->Model_Perusahaan->save($data_save);
            if ($simpan) {
                $this->session->set_flashdata('pesan', 'Data perusahaan berhasil ditambah');
                redirect(site_url('admin/perusahaan/'));
            }else{
                $this->session->set_flashdata('pesan', 'Opss ada yang salah');
                redirect(site_url('admin/perusahaan/'));
            }
        }
    }

    public function edit($id_perusahaan)
    {
        $res = $this->Model_Perusahaan->get($id_perusahaan);
        $data['data'] = $res;
        $data['id_perusahaan'] = $id_perusahaan;

        $this->load->view('admin/perusahaan/Modal_edit_perusahaan',$data);
    }

    public function update($id_perusahaan)
    {
        $data_update = $this->input->post();
        $update = $this->db->where('id_perusahaan', $id_perusahaan)->update('tbl_perusahaan', $data_update);
        if ($update) {
            $this->session->set_flashdata('pesan', 'Data perusahaan berhasil diedit');
            redirect(site_url('admin/perusahaan/'));
        }else{
            $this->session->set_flashdata('pesan', 'Opss ada yang salah');
            redirect(site_url('admin/perusahaan/'));
        }
    }

}
