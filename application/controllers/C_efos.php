<?php 
/**
 * 
 */
class C_efos extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_efos');
	}

	public function efos() {
		$data = array(
			'hal1' => 'v_efos1'
		);

		$this->load->view('V_efos', $data);
	}
}
?>