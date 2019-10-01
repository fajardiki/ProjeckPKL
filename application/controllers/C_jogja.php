<?php 
/**
 * 
 */
class C_jogja extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_jogja');
	}

	public function index() {
		$data = array(
			'plane' => $this->M_jogja->selectplanejogja(),
			'timemarket' => $this->M_jogja->selecttimejogja(),
			'pjpcomply' => $this->M_jogja->selectpjpjogja(),
 		);
		$this->load->view('Jogja/V_jogja',$data);
	}

	public function efos() {
		$data = array(
			'plane' => $this->M_jogja->selectplanejogja(),
			'timemarket' => $this->M_jogja->selecttimejogja(),
			'pjpcomply' => $this->M_jogja->selectpjpjogja(),
			'efosall' => $this->M_jogja->selectefosjogja()
		);
		$this->load->view('Jogja/V_efosjogja',$data);
	}

	public function updatesales(){
		$data = array(
			'updatesales' => $this->M_jogja->selectupdateseles()
		);

		$this->load->view('Jogja/V_upsales_jogja',$data);
	}

	public function hapussales(){
		$id = $this->uri->segment(3);
		$this->M_jogja->hapussales($id);
		redirect('Jogja/V_upsales_jogja');
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
}
?>