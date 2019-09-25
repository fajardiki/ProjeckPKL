<?php 
/**
* 
*/
class C_dasbord extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_user');
	}
	
	public function index() {

		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			$this->load->view('V_login');
		} else {
			if ($nama[0]['status']=='admin') {
				$data = array(
					'side2' => 'V_home',
					'plane' => $this->M_admin->selectallfost(),
					'timemarket' => $this->M_admin->selectalltime()
				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='sales') {
				$data = array(
					'laman1' => 'V_home',
					'plane' => $this->M_user->selectonefost($nama[0]['Emp_Code'])
				);
				$this->load->view('V_dasbord',$data);
			}

		}

	}

	public function home() {
		$data = array(
			'side2' => 'V_home',
			'plane' => $this->M_admin->selectallfost()
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