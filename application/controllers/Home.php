<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('Model_Event');
		$this->load->model('Model_Lowongan');
		$data['slide'] = true;
		$data['judul'] = "KARIR UNIVERSITAS BUMIGORA MATARAM";
		$data['event'] = $this->Model_Event->tampil_data_f();
		$data['loker'] = $this->Model_Lowongan->tampil_data_f();
		$data['halaman'] = 'home';
		$this->load->view('template',$data);
	}
	public function perusahaan()
	{
		$this->load->model('Model_Perusahaan');
		$data['slide'] = false;
		$data['judul'] = "DAFTAR PERUSAHAAN";
		$data['perusahaan'] = $this->Model_Perusahaan->tampil_data();
		$data['halaman'] = 'perusahaan';
		$this->load->view('template',$data);
	}
	public function alumni()
	{
		$this->load->model('Model_Alumni');
		$data['slide'] = false;
		$data['judul'] = "JOBSEEKER/STUDENTS";
		$data['daftar'] = $this->Model_Alumni->tampil_data();
		$data['halaman'] = 'listAlumni';
		$this->load->view('template',$data);
	}
	function getAllP($rowno=0){
		$this->load->model('Model_Perusahaan');
		$cari = $this->input->get('cari');
		// Row per page
		$rowperpage = 9;
		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		} 	
      	// All records count
		$allcount = $this->Model_Perusahaan->getrecordCount($cari);
      	// Get  records
		$users_record = $this->Model_Perusahaan->getData($rowno,$rowperpage,$cari);

      	// Pagination Configuration
		$config['base_url'] = base_url().'index.php/Home/getAllP';
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

	public function detail_perusahaan($id){
		$this->load->model('Model_Perusahaan');
		$data['slide'] = false;
		$data['judul'] = "DETAIL PERUSAHAAN";
		$data['detail'] = $this->Model_Perusahaan->getDetail($id);
		$data['halaman'] = 'detail_perusahaan';
		$this->load->view('template',$data);
	}

	public function loker()
	{
		$data['slide'] = false;
		$data['judul'] = "LOWONGAN PEKERJAAN";
		$data['halaman'] = 'loker';
		$this->load->view('template',$data);
	}
	public function event()
	{
		$data['slide'] = false;
		$data['judul'] = "EVENTS";
		$data['halaman'] = 'event';
		$this->load->view('template',$data);
	}
}
