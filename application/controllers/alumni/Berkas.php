<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

	private $user ='';
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Login_A');
        // mengecek apakah sudah login atau belum
        $this->Model_Login_A->cek_session();
        // untuk mengambil data user yang login
        $username = $this->session->userdata('user_a');
        $password = $this->session->userdata('pass_a');
        $this->user = $this->Model_Login_A->cek_user($username,$password);
        $this->user = $username;
        $this->load->model('Model_Berkas');
    }
    public function index()
    {
        $this->load->model('Model_Alumni');
        $data['alumni'] = $this->Model_Alumni->getWhere($this->user);
		$data['daftar'] = $this->Model_Berkas->tampil_data($this->user);
		$data['judul'] = "Berkas Alumni";
		$data['halaman'] = 'alumni/berkas';
		$this->load->view('alumni/template',$data);
    }
    public function edit($id='')
    {
        $data= $this->Model_Berkas->tampil_where($id);
        echo json_encode($data);
    }
    public function proses_upload()
    {
        $nim = $this->user;
        $ket = $this->input->post('ket');
        $file = $_FILES['berkas']['name'];
        if(empty($ket)|| empty($file)|| empty($nim)){
            $this->session->set_flashdata('pesan','Data tidak boleh kosong');
            redirect(site_url('alumni/berkas'));
        }else{
            // config library upload
			$config['upload_path'] = 'assets/dist/img/berkas/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['file_name']  = $file;
            $config['max-size']  = 2024;
            // load library
            $this->load->library('upload', $config);  
            if (!$this->upload->do_upload('berkas')) {
                $this->session->set_flashdata('pesan','Maaf, file yang anda upload tidak boleh lebih dari 2 MB atau ektensi file tidak diizinkan');
                redirect(site_url('alumni/berkas'));
            }else{
                $data = array(
                    'nim'=>$nim,
                    'nm_file'=>$file,
                    'keterangan'=>$ket
                );
                $res = $this->Model_Berkas->tambah_data($data);
                if($res>=1){
                    $this->session->set_flashdata('pesan','Data berkas berhasil diupload');
                    redirect(site_url('alumni/berkas'));
                }else{
                    redirect(site_url('alumni/berkas'));
                }
            }
        }
    }
     public function proses_edit($id)
    {
        $nim = $this->user;
        $ket = $this->input->post('ket');
        $file = $_FILES['berkas']['name'];
        echo $ket;
        if (empty($file)) {
             $data = array(
                    'keterangan'=>$ket
            );
          $res = $this->Model_Berkas->edit_data(array('id_berkas'=>$id),$data);
                if($res>=1){
                    $this->session->set_flashdata('pesan','Data berkas berhasil diedit');
                    redirect(site_url('alumni/berkas'));
                }else{
                    redirect(site_url('alumni/berkas'));
                }
        }else{
             if(empty($ket)|| empty($nim)){
                $this->session->set_flashdata('pesan','Data tidak boleh kosong');
                redirect(site_url('alumni/berkas'));
            }else{
                // config library upload
                $config['upload_path'] = 'assets/dist/img/berkas/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['file_name']  = $file;
                $config['max-size']  = 2024;
                // load library
                $this->load->library('upload', $config);  
                if (!$this->upload->do_upload('berkas')) {
                    $this->session->set_flashdata('pesan','Maaf, file yang anda upload tidak boleh lebih dari 2 MB atau ektensi file tidak diizinkan');
                    redirect(site_url('alumni/berkas'));
                }else{
                    $data = array(
                        'nm_file'=>$file,
                        'keterangan'=>$ket
                    );
                    $res = $this->Model_Berkas->edit_data(array('id_berkas'=>$id),$data);
                    if($res>=1){
                        $this->session->set_flashdata('pesan','Data berkas berhasil diedit');
                        redirect(site_url('alumni/berkas'));
                    }else{
                        redirect(site_url('alumni/berkas'));
                    }
                }
            }
        }
       
    }

    public function hapus($id_berkas)
    {
        $berkas = $this->db->where('id_berkas',$id_berkas)->get('tbl_berkas_alumni')->row();
        $hapus = $this->db->where('id_berkas',$id_berkas)->delete('tbl_berkas_alumni');
        if ($hapus) {
            unlink('assets/dist/img/berkas/'.$berkas->nm_file);
             $this->session->set_flashdata('pesan','Data berkas berhasil dihapus');
                    redirect(site_url('alumni/berkas'));
        }else{
             $this->session->set_flashdata('pesan','Data berkas gagal dihapus');
                    redirect(site_url('alumni/berkas'));
        }
       
    }

}

/* End of file Pemberitahuan.php */
/* Location: ./application/controllers/alumni/Pemberitahuan.php */