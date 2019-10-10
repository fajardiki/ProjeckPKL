<?php 
/**
 * 
 */
class C_sleman extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_sleman');
	}

	public function index() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_sleman->selectplanesleman(),
				'timemarket' => $this->M_sleman->selecttimesleman(),
				'pjpcomply' => $this->M_sleman->selectpjpsleman()
	 		);
			$this->load->view('Sleman/V_sleman',$data);
		}
	}

	public function efos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_sleman->selectplanesleman(),
				'timemarket' => $this->M_sleman->selecttimesleman(),
				'pjpcomply' => $this->M_sleman->selectpjpsleman(),
				'efosall' => $this->M_sleman->selectefossleman()
			);
			$this->load->view('Sleman/V_efossleman',$data);
		}
	}

	public function updatesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'updatesales' => $this->M_sleman->selectupdateseles()
			);

			$this->load->view('Sleman/V_upsales_sleman',$data);
		}
	}

	public function hapussales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_sleman->hapussales($id);
			redirect('Sleman/V_upsales_sleman');
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
				
				$this->M_sleman->savesales($Emp_Code, $Salesman, $Status, $Username, $Password);
			}
		}
	}
	// Efoss
	public function efosall() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'efosall' => $this->M_sleman->selectefossleman()
			);
			$this->load->view('Sleman/V_efosall',$data);
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
					'efosall' => $this->M_sleman->selecteonefossleman($bln, $thn)
				);
				$this->load->view('Sleman/V_efosall',$data);
			}
		}
	}

	// Efosss

	// Plane

	public function plane() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_sleman->selectplanesleman()
			);
			$this->load->view('Sleman/V_planesleman',$data);
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
					'plane' => $this->M_sleman->selectoneplanesleman($bln, $thn)
				);
				$this->load->view('Sleman/V_planesleman',$data);
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
				'timemarket' => $this->M_sleman->selecttimesleman()
			);
			$this->load->view('Sleman/V_timesleman',$data);
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
					'timemarket' => $this->M_sleman->selectonetimesleman($bln, $thn)
				);
				$this->load->view('Sleman/V_timesleman',$data);
			}
		}
	}

	// Time

	// pjp

	public function pjp() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'pjpcomply' => $this->M_sleman->selectpjpsleman()
			);
			$this->load->view('Sleman/V_pjpsleman',$data);
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
					'pjpcomply' => $this->M_sleman->selectonepjpsleman($bln, $thn)
				);
				$this->load->view('Sleman/V_pjpsleman',$data);
			}
		}
	}

	// pjp
}
?>