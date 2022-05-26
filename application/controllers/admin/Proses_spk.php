<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_spk extends CI_Controller {

	private $matrix; 
	private $matrixT; 
	private $kriteria;
	private $alternatif;
	private $R;

	function __construct()
	{
		parent::__construct();
		$this->matrix = array(
			0 => array( 0 => 5, 1 => 4, 2 => 4, 3 => 4, 4 => 4 ), 
			1 => array( 0 => 4, 1 => 4, 2 => 3, 3 => 4, 4 => 3 ),
			2 => array( 0 => 5, 1 => 3, 2 => 5, 3 => 4, 4 => 3 ),
		);
		$this->kriteria = array(
			0 => 15,
			1 => 10,
			2 => 30,
			3 => 20,
			4 => 25,
		);
	}
	function index(){
		$this->normalisasi();
		$this->alternatif();
	}
	// normalisasi matrix
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
					// echo $this->matrix[$i][$j]."/".max($this->matrixT[$tb2])." = ".$R;
					$this->R[$i][$j] = $R ;
					$tb2++;
					// echo "</br>";
				}
				$tb2 = 0;
				// echo "</br>";
			}
		}
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
				$this->alternatif[$i] = $h;
				// echo $this->R[$i][$j]."*".$this->kriteria[$j]." ";
			}
			// echo "</br>";
			$h = 0;
		}
		print_r($this->alternatif);
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
			for ($j=0; $j < $cC ; $j++) { 
				echo $matrix[$i][$j];
			}
			echo "</br>";
		}
	}
}