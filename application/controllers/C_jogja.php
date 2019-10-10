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
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_jogja->selectplanejogja(),
				'timemarket' => $this->M_jogja->selecttimejogja(),
				'pjpcomply' => $this->M_jogja->selectpjpjogja(),
	 		);
			$this->load->view('Jogja/V_jogja',$data);
		}
	}

	public function efos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_jogja->selectplanejogja(),
				'timemarket' => $this->M_jogja->selecttimejogja(),
				'pjpcomply' => $this->M_jogja->selectpjpjogja(),
				'efosall' => $this->M_jogja->selectefosjogja()
			);
			$this->load->view('Jogja/V_efosjogja',$data);
		}
	}

	public function updatesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$btn = $this->input->post('update');

			if (!isset($id) AND !isset($btn)) {
				$data = array(
					'updatesales' => $this->M_jogja->selectupdateseles()
				);

				$this->load->view('Jogja/V_upsales_jogja',$data);
			} elseif (isset($id)) {
				$data = array(
					'sales' => $this->M_jogja->selectsales($id)
				);
				$this->load->view('Jogja/V_updatesalse',$data);
			} else {

				if (isset($btn)) {
					$empcode = $this->input->post('empcode');
					$nama = $this->input->post('nama');
					$status = $this->input->post('status');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$conces = $this->input->post('conces');

					var_dump($empcode);
					var_dump($nama);
					var_dump($status);
					var_dump($username);
					var_dump($password);
					var_dump($conces);

					$this->M_jogja->updatesales($empcode,$nama,$status,$username,$password,$conces);
					redirect('C_jogja/updatesales');
				}
			}
		}
	}

	public function hapussales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_jogja->hapussales($id);
			redirect('C_jogja/updatesales');
		}
	}

	public function savesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Jogja/V_savesales');
			} else {
				$empcode = $this->input->post("empcode");
				$nama = $this->input->post("nama");
				$status = $this->input->post("status");
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				$conces = $this->input->post("conces");

				var_dump($empcode);
					var_dump($nama);
					var_dump($status);
					var_dump($username);
					var_dump($password);
					var_dump($conces);

				
				$this->M_jogja->savesales($empcode,$nama,$status,$username,$password,$conces);
			}
		}
	}

	// Efoss
	public function efosall() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'efosall' => $this->M_jogja->selectefosjogja()
			);
			$this->load->view('Jogja/V_efosall',$data);
		}
	}

	public function efosallselect() {
		$btn = $this->input->post('cari');
		if (isset($btn)) {
			$bln = $this->input->post('bulan');
			$thn = $this->input->post('tahun');

			$data = array(
				'efosall' => $this->M_jogja->selecteonefosjogja($bln, $thn)
			);
			$this->load->view('Jogja/V_efosall',$data);
		}
	}
	// Efoss
	// Plane
	public function plane() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_jogja->selectplanejogja()
			);
			$this->load->view('Jogja/V_planejogja',$data);
		}
	}

	public function planeselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'plane' => $this->M_jogja->selectoneplanejogja($bln, $thn)
				);
				$this->load->view('Jogja/V_planejogja',$data);
			}
		}
	}

	// Plane

	// Time

	public function time() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'timemarket' => $this->M_jogja->selecttimejogja()
			);
			$this->load->view('Jogja/V_timejogja',$data);
		}
	}

	public function timeselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'timemarket' => $this->M_jogja->selectonetimejogja($bln, $thn)
				);
				$this->load->view('Jogja/V_timejogja',$data);
			}
		}
	}

	// Time

	// pjp

	public function pjp() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'pjpcomply' => $this->M_jogja->selectpjpjogja()
			);
			$this->load->view('Jogja/V_pjpjogja',$data);
		}
	}

	public function pjpselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'pjpcomply' => $this->M_jogja->selectonepjpjogja($bln, $thn)
				);
				$this->load->view('Jogja/V_pjpjogja',$data);
			}
		}
	}

	// pjp
}
?>