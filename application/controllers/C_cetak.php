<?php 
/**
 * 
 */


class C_cetak extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_bantul');
		$this->load->model('M_user');
	}

	public function efos() {
		
	}

}
?>