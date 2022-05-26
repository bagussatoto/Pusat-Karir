<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
	}
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Dashboard Admin";
		$data['halaman'] = 'admin/V_admin';
		$data['admin'] = $this->Model_Admin->get();
		$this->load->view('admin/template',$data);
	}

	public function add()
    {
        $data_add = $this->input->post();
        $simpan = $this->Model_Admin->save($data_add);
        if ($simpan)
        {
            $this->session->set_flashdata('pesan', 'Data admin berhasil ditambah');
            redirect(site_url('admin/admin'));
        }else{
            $this->session->set_flashdata('pesan', 'Data admin gagal ditambah');
            redirect(site_url('admin/admin'));
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->Model_Admin->get($id);
        $data['id'] = $id;

        $this->load->view('admin/Modal_edit_admin',$data);
    }

    public function update($id)
    {
        $data_add = $this->input->post();
        $simpan = $this->Model_Admin->update($id, $data_add);
        if ($simpan)
        {
            $this->session->set_flashdata('pesan', 'Data admin berhasil diedit');
            redirect(site_url('admin/admin'));
        }else{
            $this->session->set_flashdata('pesan', 'Data admin gagal diedit');
            redirect(site_url('admin/admin'));
        }
    }

    public function hapus($id)
    {
        $del = $this->Model_Admin->delete($id);
        if ($del)
        {
            $this->session->set_flashdata('pesan', 'Data admin berhasil dihapus');
            redirect(site_url('admin/admin'));
        }else{
            $this->session->set_flashdata('pesan', 'Data admin gagal dihapus');
            redirect(site_url('admin/admin'));
        }
    }

}