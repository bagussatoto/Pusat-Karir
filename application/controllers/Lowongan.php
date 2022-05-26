<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Lowongan');
	}
	public function index()
	{
		$this->load->model('Model_Event');
		$this->load->model('Model_Pendidikan');
		$this->load->model('Model_Posisi');
		$data['slide'] = false;
		$data['judul'] = "LOWONGAN PEKERJAAN";
		// daftar pendidikan
		$data['pendidikan'] = $this->Model_Pendidikan->tampil_data();
		// daftar posisi
		$data['posisi'] = $this->Model_Posisi->tampil_data();
		$data['lowongan'] = $this->Model_Lowongan->get();
      	// Get  records
		$users_record = $this->Model_Lowongan->tampil_data_f();

		$data['halaman'] = 'loker';
		// print_r($users_record);exit;
		$this->load->view('template',$data);
	}

	function getAll($rowno=0){
		$kategori = $this->input->get('kategori');
		$pendidikan = $this->input->get('pendidikan');
		$posisi = $this->input->get('posisi');
		$cari = $this->input->get('cari');
		if (empty($pendidikan)&& empty($kategori)&& empty($posisi)) {
			$filter = '';
		}else{
			$filter = array(
				'k1' => $pendidikan,
				'k2' => $kategori,
				'k3' => $posisi 
			);
		}
		// Row per page
		$rowperpage = 3;

		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		} 	
      	// All records count
		$allcount = $this->Model_Lowongan->getrecordCount($filter,$cari);
      	// Get  records
		$users_record = $this->Model_Lowongan->getData($rowno,$rowperpage,$filter,$cari);

      	// Pagination Configuration
		$config['base_url'] = site_url('Lowongan/getAll');
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;
		echo json_encode($data);
	}
	public function detail_loker($id='')
	{
		$data['user_alumni'] = false;
		$sts = $this->session->userdata('user_a');
		if (!empty($sts)) {
			$data['user_alumni'] = true;
		}

		$this->load->model('Model_Event');
		$this->load->model('Model_Pendidikan');
		$this->load->model('Model_Posisi');
		$data['slide'] = false;
		$data['judul'] = "DETAIL LOWONGAN PEKERJAAN";
		// daftar pendidikan
		$data['detail'] = $this->Model_Lowongan->detail($id);
		$data['halaman'] = 'detail_loker';
		// print_r($users_record);exit;
		$this->load->view('template',$data);
	}

}

/* End of file Lowongan.php */
/* Location: ./application/controllers/Lowongan.php */