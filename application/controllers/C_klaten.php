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
		$data = array(
			'plane' => $this->M_klaten->selectplaneklaten(),
			'timemarket' => $this->M_klaten->selecttimeklaten(),
			'pjpcomply' => $this->M_klaten->selectpjpklaten()
 		);
		$this->load->view('Klaten/V_klaten',$data);
	}

	public function efos() {
		$data = array(
			'plane' => $this->M_klaten->selectplaneklaten(),
			'timemarket' => $this->M_klaten->selecttimeklaten(),
			'pjpcomply' => $this->M_klaten->selectpjpklaten(),
			'efosall' => $this->M_klaten->selectefosklaten()
		);
		$this->load->view('Klaten/V_efosklaten',$data);
	}

	public function updatesales(){
		$data = array(
			'updatesales' => $this->M_klaten->selectupdateseles()
		);

		$this->load->view('Klaten/V_upsales_klaten',$data);
	}

	public function hapussales(){
		$id = $this->uri->segment(3);
		$this->M_klaten->hapussales($id);
		redirect('Klaten/V_upsales_klaten');
	}

	public function savesales(){
		$btn = $this->input->post('save');
		
		if (isset($btn)) {
			$Emp_Code = $this->input->post("Emp_Code");
			$Salesman = $this->input->post("Salesman");
			$Status = $this->input->post("Status");
			$Username = $this->input->post("Username");
			$Password = $this->input->post("Password");
			
			$this->M_klaten->savesales($Emp_Code, $Salesman, $Status, $Username, $Password);
		}
	}

	public function efosall() {
		$data = array(
			'efosall' => $this->M_klaten->selectefosklaten()
		);
		$this->load->view('Klaten/V_efosall',$data);
	}

	public function plane() {
		$data = array(
			'plane' => $this->M_klaten->selectplaneklaten()
		);
		$this->load->view('Klaten/V_planeklaten',$data);
	}

	public function time() {
		$data = array(
			'timemarket' => $this->M_klaten->selecttimeklaten()
		);
		$this->load->view('Klaten/V_timeklaten',$data);
	}

	public function pjp() {
		$data = array(
			'pjpcomply' => $this->M_klaten->selectpjpklaten()
		);
		$this->load->view('Klaten/V_planeklaten',$data);
	}
}
?>