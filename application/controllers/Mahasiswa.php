<?php 
	/**
	 * 
	 */
	class Mahasiswa extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->helper('url');
		}
		
		public function index() {
			$data = array(
				'nama'=>"Fajar Siddiqi Putu Sa'ed",
				'nim'=>'E31171799',
				'alm'=>'Kp.Krajan',
				'title'=>'Halaman - Nama'
			);
			$this->load->view('Home',$data);
		}

		public function nama() {
			$data['title']="Halaman - Nama";
			$this->load->view('Nama');
		}

		public function gol() {
			$data['title']="Halaman - Golongan";
			$this->load->view('Golongan');
		}

		public function prodi() {
			$data['title']="Halaman - Prodi";
			$this->load->view('Prodi');
		}		
	}
?>