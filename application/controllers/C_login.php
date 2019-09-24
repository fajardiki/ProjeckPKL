<?php 
/**
* 
*/
class C_login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_user');
	}
	
	public function index() {
		if (!$this->session->userdata('username')) {
			$this->load->view('V_login');
		} else {
			redirect('C_dasbord');
		}
	}

	public function login() {
		$btn = $this->input->post('btnlogin');
			if (isset($btn)) {
				$username = $this->input->post("username");
				$password = $this->input->post("password");

				$cekk = $this->M_user->login_seles($username, $password);
				$jenis = 'seles';
				if ($cekk) {
					$dt= array(
						'username' => $username,
						'password' => $password,
						'user' => $this->M_user->selectoneseles($username, $password)
					);
					$ses = $this->session->set_userdata($dt);
					redirect('C_dasbord');
				} else {
					redirect('C_login');
				}
				
			} else {
				redirect('C_login');
			}
	}
}

?>