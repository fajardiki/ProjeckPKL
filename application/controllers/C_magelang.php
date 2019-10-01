<?php 
/**
 * 
 */
class C_magelang extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_magelang');
	}

	public function index() {
		$data = array(
			'plane' => $this->M_magelang->selectplanemagelang(),
			'timemarket' => $this->M_magelang->selecttimemagelang(),
			'pjpcomply' => $this->M_magelang->selectpjpmagelang()
 		);
		$this->load->view('Magelang/V_magelang',$data);
	}

	public function efos() {
		$data = array(
			'plane' => $this->M_magelang->selectplanemagelang(),
			'timemarket' => $this->M_magelang->selectplanemagelang(),
			'pjpcomply' => $this->M_magelang->selectplanemagelang(),
			'efosall' => $this->M_magelang->selectefosmagelang()
		);
		$this->load->view('Magelang/V_efosmagelang',$data);
	}

	public function updatesales(){
		$data = array(
			'updatesales' => $this->M_magelang->selectupdateseles()
		);

		$this->load->view('Magelang/V_upsales_magelang',$data);
	}

	public function hapussales(){
		$id = $this->uri->segment(3);
		$this->M_magelang->hapussales($id);
		redirect('Magelang/V_upsales_magelang');
	}

	public function savesales(){
		$btn = $this->input->post('save');
		
		if (isset($btn)) {
			$Emp_Code = $this->input->post("Emp_Code");
			$Salesman = $this->input->post("Salesman");
			$Status = $this->input->post("Status");
			$Username = $this->input->post("Username");
			$Password = $this->input->post("Password");
			
			$this->M_magelang->savesales($Emp_Code, $Salesman, $Status, $Username, $Password);
		}
	}
}
?>