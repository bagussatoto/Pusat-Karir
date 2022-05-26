<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {

	public function daftar($id_lowongan)
	{
		$this->load->model('Model_Detail_Pelamar');
		$this->load->model('Model_Pelamar');
		$nim = $this->session->userdata('id_alumni');
		// print_r($this->session->userdata());exit;
		$da = $this->Model_Pelamar->getPelamar2($nim,$id_lowongan);
		if (empty($da)) {
			$data = array(
				'id_lowongan'=>$id_lowongan,
				'nim'=>$nim
			);
			$res = $this->Model_Pelamar->tambah_data($data);
			if ($res>=1) {
				$da = $this->Model_Pelamar->getPelamar($nim);
				$data = array(
					'id_pelamar' =>$da->id_pelamar,
					'status_p' =>'belum_diperiksa'
				);
				$res = $this->Model_Detail_Pelamar->tambah_data($data);
				echo $res;
				redirect('lowongan/detail_loker/'.$id_lowongan);
			}
		}else{
			$this->session->set_flashdata('pesan', 'Maaf, anda sudah mendaftar pada lowongan ini');
			redirect('lowongan/detail_loker/'.$id_lowongan);
		}
	}

}

/* End of file Pelamar.php */
/* Location: ./application/controllers/Pelamar.php */