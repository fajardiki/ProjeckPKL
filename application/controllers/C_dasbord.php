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
			redirect('C_login');
		} else {
			if ($nama[0]['status']=='admin') {
				$data = array(
					'side2' => 'V_home',
					'plane' => $this->M_admin->selectallplane(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp()
 				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='sales') {
				$data = array(
					'laman1' => 'V_home',
					'plane' => $this->M_user->selectonefost($nama[0]['Emp_Code']),
					'timemarket' => $this->M_user->selectonetime($nama[0]['Emp_Code']),
					'pjpcomply' => $this->M_user->selectonepjp($nama[0]['Emp_Code'])
				);
				$this->load->view('V_dasbord',$data);
			}

		}

	}

	public function home() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['status']=='admin') {
				$data = array(
					'side2' => 'V_home',
					'plane' => $this->M_admin->selectallplane(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp()
				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='sales') {
				$data = array(
					'laman1' => 'V_home',
					'plane' => $this->M_user->selectonefost($nama[0]['Emp_Code']),
					'timemarket' => $this->M_user->selectonetime($nama[0]['Emp_Code']),
					'pjpcomply' => $this->M_user->selectonepjp($nama[0]['Emp_Code'])
				);
				$this->load->view('V_dasbord',$data);
			}
		}
	}

	public function efos() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['status']=='admin') {
				$data = array(
					'side3' => 'V_efos',
					'plane' => $this->M_admin->selectallfost(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp(),
					'efosall' => $this->M_admin->selectefos()
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

	public function importexcel() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$date = date('Y-m-d');
			$data = array(
				'side1' => 'V_import',
				'efos' => $this->M_admin->getefos($date)
			);

			$this->load->view('V_dasbord',$data);
		}
	}

	public function updatesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'side4' => 'V_update_sales',
				'updatesales' => $this->M_admin->selectupdateseles()
			);

			$this->load->view('V_dasbord',$data);
		}
	}
	public function hapussales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_admin->hapussales($id);
			redirect('http://[::1]/ProjeckPKL/C_dasbord/updatesales');
		}
	}
	public function editsales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_admin->editsales($id);
			redirect('http://[::1]/ProjeckPKL/C_dasbord/updatesales');
		}
	}

	public function savesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			
			if (isset($btn)) {
				$Emp_Code = $this->input->post("Emp_Code");
				$Salesman = $this->input->post("Salesman");
				$Status = $this->input->post("Status");
				$Username = $this->input->post("Username");
				$Password = $this->input->post("Password");
				
				$this->M_admin->savesales($Emp_Code, $Salesman, $Status, $Username, $Password);
			}
		}
	}
}

?>