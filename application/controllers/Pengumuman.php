<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Pengumuman');
	}
	public function index()
	{
		$data['slide'] = false;
		$data['judul'] = "PENGUMUMAN TEST & HASIL";

		$data['halaman'] = 'pengumuman';
		// print_r($users_record);exit;
		$this->load->view('template',$data);
	}
	function getAll($rowno=0){
		$cari = $this->input->get('cari');
		// Row per page
		$rowperpage = 9;

		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		} 	
      	// All records count
		$allcount = $this->Model_Pengumuman->getrecordCount($cari);
      	// Get  records
		$users_record = $this->Model_Pengumuman->getData($rowno,$rowperpage,$cari);

      	// Pagination Configuration
		$config['base_url'] = site_url('Pengumuman/getAll');
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
	public function detail_pengumuman($id='')
	{
		$data['slide'] = false;
		$data['judul'] = "DETAIL PENGUMUMAN TEST & HASIL";
		// daftar pendidikan
		$data['detail'] = $this->Model_Pengumuman->detail($id);
		$data['halaman'] = 'detail_pengumuman';
		// print_r($users_record);exit;
		$this->load->view('template',$data);
	}

}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/Pengumuman.php */