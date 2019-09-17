<?php 
	/**
	 * 
	 */
	class Data extends CI_Controller {
		
		public function __construct() {
			parent:: __construct();
			$this->load->helper('url');
		}

		public function index() {
			$data = array(
				'variabel1'=>'Data dari variabel 1',
				'variabel2'=>'Data dari variabel 2'
			);
			$data1['pesan']='isi dari pesan';
			$this->load->view('bebename',$data1);
		}
	}
?>