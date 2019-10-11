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
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_magelang->selectplanemagelang(),
				'timemarket' => $this->M_magelang->selecttimemagelang(),
				'pjpcomply' => $this->M_magelang->selectpjpmagelang()
	 		);
			$this->load->view('Magelang/V_magelang',$data);
		}
	}

	public function efos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_magelang->selectplanemagelang(),
				'timemarket' => $this->M_magelang->selectplanemagelang(),
				'pjpcomply' => $this->M_magelang->selectplanemagelang(),
				'efosall' => $this->M_magelang->selectefosmagelang()
			);
			$this->load->view('Magelang/V_efosmagelang',$data);
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
					'updatesales' => $this->M_magelang->selectupdateseles()
				);

				$this->load->view('Magelang/V_upsales_magelang',$data);
			} elseif (isset($id)) {
				$data = array(
					'sales' => $this->M_magelang->selectsales($id)
				);
				$this->load->view('Magelang/V_updatesalse',$data);
			} else {
				if (isset($btn)) {
					$empcode = $this->input->post('empcode');
					$nama = $this->input->post('nama');
					$status = $this->input->post('status');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$conces = $this->input->post('conces');

					$this->M_magelang->updatesales($empcode,$nama,$status,$username,$password,$conces);
					redirect('C_magelang/updatesales');
				}
			}
		}
	}

	public function hapussales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_magelang->hapussales($id);
			redirect('C_magelang/updatesales');
		}
	}

	public function savesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Magelang/V_savesales');
			} else {
				$empcode = $this->input->post("empcode");
				$nama = $this->input->post("nama");
				$status = $this->input->post("status");
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				$conces = $this->input->post("conces");
				
				$this->M_magelang->savesales($empcode,$nama,$status,$username,$password,$conces);
				redirect('C_magelang/updatesales');
			}
		}
	}

	// Efoss
	public function efosall() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'efosall' => $this->M_magelang->selectefosmagelang()
			);
			$this->load->view('Magelang/V_efosall',$data);
		}
	}

	public function efosallselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'efosall' => $this->M_magelang->selecteonefosmagelang($bln, $thn)
				);
				$this->load->view('Magelang/V_efosall',$data);
			}
		}
	}

	// Efoss

	// Plane

	public function plane() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_magelang->selectplanemagelang()
			);
			$this->load->view('Magelang/V_planemagelang',$data);
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
					'plane' => $this->M_magelang->selectoneplanemagelang($bln, $thn)
				);
				$this->load->view('Magelang/V_planemagelang',$data);
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
				'timemarket' => $this->M_magelang->selecttimemagelang()
			);
			$this->load->view('Magelang/V_timemagelang',$data);
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
					'timemarket' => $this->M_magelang->selectonetimemagelang($bln, $thn)
				);
				$this->load->view('Magelang/V_timemagelang',$data);
			}
		}
	}

	// Time

	// PJP

	public function pjp() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'pjpcomply' => $this->M_magelang->selectpjpmagelang()
			);
			$this->load->view('Magelang/V_pjpmagelang',$data);
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
					'pjpcomply' => $this->M_magelang->selectonepjpmagelang($bln, $thn)
				);
				$this->load->view('Magelang/V_pjpmagelang',$data);
			}
		}
	}

	// pjp

	// District
	public function updatedistrict(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$btn = $this->input->post('update');

			if (!isset($id) AND !isset($btn)) {
				$data = array(
					'updatedistrict' => $this->M_magelang->selectupdatedistrict()
				);

				$this->load->view('Magelang/V_distrikmagelang',$data);
			} elseif (isset($id)) {
				$data = array(
					'sales' => $this->M_magelang->selectdistrict($id)
				);
				$this->load->view('Magelang/V_updatedistrict',$data);
			} else {

				if (isset($btn)) {
					$empcode = $this->input->post('empcode');
					$nama = $this->input->post('nama');
					$status = $this->input->post('status');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$conces = $this->input->post('conces');

					$this->M_magelang->updatesales($empcode,$nama,$status,$username,$password,$conces);
					redirect('C_magelang/updatedistrict');
				}
			}
		}
	}

	public function hapusdistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$discod = $this->uri->segment(3);
			$this->M_magelang->hapusdistrict($discod);
			redirect('C_magelang/updatedistrict');
		}
	}

	public function savedistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Magelang/V_tambahdistrict');
			} else {
				$discode = $this->input->post("district_code");
				$district = $this->input->post("district");
				$conces = $this->input->post("conces");

				$this->M_magelang->savedistrict($discode, $district, $conces);
				redirect('C_magelang/updatedistrict');
			}
		}
	}
}
?>