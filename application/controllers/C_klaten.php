<?php 
/**
 * 
 */
class C_klaten extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_klaten');
	}

	public function index() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_klaten->selectplaneklaten(),
				'timemarket' => $this->M_klaten->selecttimeklaten(),
				'pjpcomply' => $this->M_klaten->selectpjpklaten()
	 		);
			$this->load->view('Klaten/V_klaten',$data);
		}
	}

	public function efos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_klaten->selectplaneklaten(),
				'timemarket' => $this->M_klaten->selecttimeklaten(),
				'pjpcomply' => $this->M_klaten->selectpjpklaten(),
				'efosall' => $this->M_klaten->selectefosklaten()
			);
			$this->load->view('Klaten/V_efosklaten',$data);
		}
	}

	public function updatesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			if (!isset($id)) {
				$data = array(
					'updatesales' => $this->M_klaten->selectupdateseles()
				);

				$this->load->view('Klaten/V_upsales_klaten',$data);
			} elseif (isset($id)) {
				$data = array(
					'sales' => $this->M_klaten->selectsales($id)
				);
				$this->load->view('Klaten/V_updatesalse',$data);
			} else {
				$btn = $this->input->post('update');
			}
		}
	}

	public function hapussales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_klaten->hapussales($id);
			redirect('C_klaten/updatesales');
		}
	}

	public function savesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Klaten/V_savesales');
			} else {
				$Emp_Code = $this->input->post("Emp_Code");
				$Salesman = $this->input->post("Salesman");
				$Status = $this->input->post("Status");
				$Username = $this->input->post("Username");
				$Password = $this->input->post("Password");
				
				$this->M_klaten->savesales($Emp_Code, $Salesman, $Status, $Username, $Password);
			}
		}
	}
	// Efoss
	public function efosall() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'efosall' => $this->M_klaten->selectefosklaten()
			);
			$this->load->view('Klaten/V_efosall',$data);
		}
	}

	public function efosallselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'efosall' => $this->M_klaten->selecteonefosklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_efosall',$data);
			}
		}
	}

	// Efoss

	// Planee

	public function plane() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_klaten->selectplaneklaten()
			);
			$this->load->view('Klaten/V_planeklaten',$data);
		}
	}

	public function planeselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'plane' => $this->M_klaten->selectoneplaneklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_planeklaten',$data);
			}
		}
	}

	// Plane

	// Time

	public function time() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'timemarket' => $this->M_klaten->selecttimeklaten()
			);
			$this->load->view('Klaten/V_timeklaten',$data);
		}
	}

	public function timeselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'timemarket' => $this->M_klaten->selectonetimeklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_timeklaten',$data);
			}
		}
	}

	// Time

	// PJP

	public function pjp() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'pjpcomply' => $this->M_klaten->selectpjpklaten()
			);
			$this->load->view('Klaten/V_pjpklaten',$data);
		}
	}

	public function pjpselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'pjpcomply' => $this->M_klaten->selectonepjpklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_pjpklaten',$data);
			}
		}
	}

	// pjp
}
?>