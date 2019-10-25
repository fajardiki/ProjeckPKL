<?php 
/**
* 
*/
class C_login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_admin');
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

				if (empty($username) && empty($password)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Username dan Password tidak boleh kosong!'
					);
					$this->load->view('V_login',$data);
				} elseif (empty($username)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Username tidak boleh kosong!'
					);
					$this->load->view('V_login',$data);
				} elseif (empty($password)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Password tidak boleh kosong!'
					);
					$this->load->view('V_login',$data);
				} else {
					$cekk = $this->M_user->login_seles($username, $password);
					if (!empty($cekk)) {
						$dt= array(
							'username' => $username,
							'password' => $password,
							'user' => $this->M_user->selectoneseles($username, $password)
						);
						$ses = $this->session->set_userdata($dt);
						redirect('C_dasbord');
					} else {
						$cekuser = $this->M_user->login_user($username, $password);
						if (!empty($cekuser)) {
							$dt= array(
								'username' => $username,
								'password' => $password,
								'user' => $this->M_user->selectoneuser($username, $password)
							);
							$ses = $this->session->set_userdata($dt);
							redirect('C_dasbord');
						} else {
							$data = array(
								'statuspesan' => 'gagal',
								'isipesan' => 'Login Gagal'
							);
							$this->load->view('V_login',$data);
						}
						
					}
				
				} 
			}
	}
}

?>