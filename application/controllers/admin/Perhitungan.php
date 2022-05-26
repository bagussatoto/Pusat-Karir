<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	private $matrix; 
	private $matrixT; 
	private $kriteria;
	private $alternatif;
	private $R;
	private $nim;
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Admin');
		$this->load->model('model_pelamar');
        // mengecek apakah sudah login atau belum
        $this->Model_Admin->cek_session();
        // untuk mengambil data user yang login
        $username = $this->session->userdata('user_ad');
        $password = $this->session->userdata('pass_ad');
        $this->user = $this->Model_Admin->cek_user($username,$password);
        $this->kriteria = array(
			0 => 15,
			1 => 10,
			2 => 30,
			3 => 20,
			4 => 25,
		);
    }
	public function index()
	{
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Perhitungan";
		$data['halaman'] = 'admin/perhitunganDL';
        $this->load->model('Model_Lowongan');
		$data['daftar'] = $this->Model_Lowongan->lowongan_perhitungan();
		$this->load->view('admin/template',$data);
	}
	public function proses_hitung($id='')
	{
		$this->load->model('Model_Lowongan');
		$this->load->model('Model_Nilai');
		$pelamar = $this->Model_Lowongan->tampil_pelamar($id);
		$tot_Pel = count($pelamar);
		$nim = array();
		$i = 0;
		foreach ($pelamar as $pel) {
			$nim[$i] = $pel['nim'];
			$i++;
		}
		$this->nim = $nim;
		$in = 0;
		$this->matrix = array();
		for ($k=0; $k < $i; $k++) { 
			$al = $this->Model_Nilai->tampil_nilai($nim[$k]);
			foreach ($al as $key) {
				$this->matrix[$k][$in] = $al[$in]['nilaiBobot'];
				$in++;
			}
			$in = 0;
		}
		// echo "</br> #### Nilai </br>";

		$this->cetakMatrix($this->matrix);
		$this->normalisasi();
		$this->alternatif();
		$data['admin_a'] = 'Admin';
		$data['judul'] = "Perhitungan";
		$data['halaman'] = 'admin/hasil';
		$data['hasil'] = $this->alternatif;
		$this->load->view('admin/template',$data);
	}
	function normalisasi(){
		if ($this->matrix==null || empty($this->matrix)) {
			//end
		}else{ 
			$this->matrixT();
			$this->R  = array();
			$cR = count($this->matrix);
			$cC = count($this->matrix[0]);
			$tb = 0;
			$tb2 = 0;
			$Rr = 0;
			
			for ($i=0; $i < $cR; $i++) { 
				for ($j=0; $j < $cC ; $j++) { 
					$R = ($this->matrix[$i][$j])/(max($this->matrixT[$tb2]));
					$this->R[$i][$j] = $R ;
					$tb2++;
				}
				$tb2 = 0;
			}
		}
		// echo "</br> #### Nilai Normalisasi </br>";
		// $this->cetakMatrix($this->R);
	}
	// nilai terbesar alternatif
	function alternatif()
	{
		$this->alternatif = array();
		$cR = count($this->R);
		$cC = count($this->R[0]);
		$h = 0;
		for ($i=0; $i < $cR; $i++) { 
			for ($j=0; $j < $cC; $j++) { 
				$h +=  $this->R[$i][$j]*$this->kriteria[$j];
				$this->alternatif[$i][0] = $this->nim[$i];
				$this->alternatif[$i][1] = $h;
			}
			$h = 0;
		}
		// echo "</br> #### Nilai Alternatif </br>";
		// $this->cetakMatrix($this->alternatif);
	}
	function matrixT(){
		$cR = count($this->matrix);
		$cC = count($this->matrix[0]);
		$this->matrixT = array();
		for ($i=0; $i < $cC ; $i++) { 
			for ($j=0; $j < $cR ; $j++) { 
				$this->matrixT[$i][$j] = $this->matrix[$j][$i];			
			}
		}
	}
	function cetakMatrix($matrix)
	{
		$cR = count($matrix);
		$cC = count($matrix[0]);
		for ($i=0; $i < $cR; $i++) { 
			echo "[";
			for ($j=0; $j < $cC ; $j++) { 
				echo $matrix[$i][$j]." ";
			}
			echo "]";
			
		}
	}
	public function getDetail($id)
	{
		$this->load->model('Model_Pelamar');
		$res = $this->Model_Pelamar->detail_pelamar2($id);
		echo json_encode($res);
	}

    public function detail($id)
    {
        $data['data'] = $this->model_pelamar->detail_pelamar2($id);
        $this->load->view('admin/perhitungan/Modal_detail_pelamar',$data);
    }
    public function getBerkas($nim)
    {
        $res['data'] = $this->model_pelamar->getBerkas($nim);
        $this->load->view('admin/perhitungan/Modal_berkas',$res);
    }
}