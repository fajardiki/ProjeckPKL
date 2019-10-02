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
		$data = array(
			'plane' => $this->M_sleman->selectplanesleman(),
			'timemarket' => $this->M_sleman->selecttimesleman(),
			'pjpcomply' => $this->M_sleman->selectpjpsleman()
 		);
		$this->load->view('Sleman/V_sleman',$data);
	}

	public function efos() {
		$data = array(
			'plane' => $this->M_sleman->selectplanesleman(),
			'timemarket' => $this->M_sleman->selecttimesleman(),
			'pjpcomply' => $this->M_sleman->selectpjpsleman(),
			'efosall' => $this->M_sleman->selectefossleman()
		);
		$this->load->view('Sleman/V_efossleman',$data);
	}

	public function updatesales(){
		$data = array(
			'updatesales' => $this->M_sleman->selectupdateseles()
		);

		$this->load->view('Sleman/V_upsales_sleman',$data);
	}

	public function hapussales(){
		$id = $this->uri->segment(3);
		$this->M_sleman->hapussales($id);
		redirect('Sleman/V_upsales_sleman');
	}

	public function savesales(){
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

	public function efosall() {
		$data = array(
			'efosall' => $this->M_sleman->selectefossleman()
		);
		$this->load->view('Sleman/V_efosall',$data);
	}

	public function plane() {
		$data = array(
			'plane' => $this->M_sleman->selectplanesleman()
		);
		$this->load->view('Sleman/V_planesleman',$data);
	}

	public function time() {
		$data = array(
			'timemarket' => $this->M_sleman->selecttimesleman()
		);
		$this->load->view('Sleman/V_timesleman',$data);
	}

	public function pjp() {
		$data = array(
			'pjpcomply' => $this->M_sleman->selectpjpsleman()
		);
		$this->load->view('Sleman/V_planesleman',$data);
	}
}
?>