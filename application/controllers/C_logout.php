<?php 
/**
* 
*/
class C_logout extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_user');
	}

	public function logoutadmin() {
		$this->session->sess_destroy();
		redirect('C_login');
	}
}
?>