<?php 
/**
* 
*/
class C_login_admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}
	
	public function index() {
		if (!$this->session->userdata('username')) {
			$this->load->view('admin/V_login_admin');
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

					$cekk = $this->M_admin->login_admin($username, $password);
					$jenis = 'seles';
					if ($cekk == 1) {
						$dt= array(
							'username' => $username,
							'password' => $password,
							'user' => $this->M_admin->selectoneadmin($username, $password)
						);
						$ses = $this->session->set_userdata($dt);
						redirect('C_dasbord');
					} else {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Login gagal'
						);
						$this->load->view('admin/V_login_admin', $data);
					}
				
				}	 
		}
	}

}
?>