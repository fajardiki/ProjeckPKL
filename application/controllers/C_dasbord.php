<?php 
/**
* 
*/
class C_dasbord extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}
	
	public function index() {

		if (!$this->session->userdata('username')) {
			$this->load->view('V_login');
		} else {

			$this->load->view('V_dasbord');

		}

	}

	public function home() {
		$data = array(
			'side2' => 'V_home'
		);
		$this->load->view('V_dasbord',$data);
	}

	public function importexcel() {
		$date = date('Y-m-d');
		$data = array(
			'side1' => 'V_import',
			'efos' => $this->M_admin->getefos($date)
		);

		$this->load->view('V_dasbord',$data);
	}
}

?>