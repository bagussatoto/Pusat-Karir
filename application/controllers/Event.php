<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Event');
	}
	public function index()
	{
		$this->load->model('Model_Event');
		$data['slide'] = false;
		$data['judul'] = "EVENT & CARIER NEWS";
      	// Get  records
		$users_record = $this->Model_Event->tampil_data_f();

		$data['halaman'] = 'event';
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
		$allcount = $this->Model_Event->getrecordCount($cari);
      	// Get  records
		$users_record = $this->Model_Event->getData($rowno,$rowperpage,$cari);

      	// Pagination Configuration
		$config['base_url'] = site_url('Event/getAll');
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
	public function detail_event($id='')
	{
		$this->load->model('Model_Event');;
		$data['slide'] = false;
		$data['judul'] = "DETAIL EVENT & CARIER NEWS";
		// daftar pendidikan
		$data['detail'] = $this->Model_Event->detail($id);
		$data['halaman'] = 'detail_event';
		// print_r($users_record);exit;
		$this->load->view('template',$data);
	}

}

/* End of file Event.php */
/* Location: ./application/controllers/Event.php */