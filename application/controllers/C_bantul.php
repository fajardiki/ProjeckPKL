<?php 
/**
 * 
 */
class C_bantul extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_bantul');
	}

	public function index() {
		$data = array(
			'plane' => $this->M_bantul->selectplanebantul(),
			'timemarket' => $this->M_bantul->selecttimebantul(),
			'pjpcomply' => $this->M_bantul->selectpjpbantul()
 		);
		$this->load->view('Bantul/V_bantul',$data);
	}

	public function efos() {
		$data = array(
			'plane' => $this->M_bantul->selectplanebantul(),
			'timemarket' => $this->M_bantul->selectplanebantul(),
			'pjpcomply' => $this->M_bantul->selectplanebantul(),
			'efosall' => $this->M_bantul->selectefosbantul()
		);
		$this->load->view('Bantul/V_efosbantul',$data);
	}

	public function updatesales(){
		$data = array(
			'updatesales' => $this->M_bantul->selectupdateseles()
		);

		$this->load->view('Bantul/V_upsales_bantul',$data);
	}

	public function hapussales(){
		$id = $this->uri->segment(3);
		$this->M_bantul->hapussales($id);
		redirect('Bantul/V_upsales_bantul');
	}

	public function savesales(){
		$btn = $this->input->post('save');
		
		if (isset($btn)) {
			$Emp_Code = $this->input->post("Emp_Code");
			$Salesman = $this->input->post("Salesman");
			$Status = $this->input->post("Status");
			$Username = $this->input->post("Username");
			$Password = $this->input->post("Password");
			
			$this->M_jogja->savesales($Emp_Code, $Salesman, $Status, $Username, $Password);
		}
	}

	public function efosall() {
		$data = array(
			'efosall' => $this->M_bantul->selectefosbantul()
		);
		$this->load->view('Bantul/V_efosall',$data);
	}

	public function plane() {
		$data = array(
			'plane' => $this->M_bantul->selectplanebantul()
		);
		$this->load->view('Bantul/V_planebantul',$data);
	}

	public function time() {
		$data = array(
			'timemarket' => $this->M_bantul->selecttimebantul()
		);
		$this->load->view('Bantul/V_timebantul',$data);
	}

	public function pjp() {
		$data = array(
			'pjpcomply' => $this->M_bantul->selectpjpbantul()
		);
		$this->load->view('Bantul/V_planebantul',$data);
	}
}
?>