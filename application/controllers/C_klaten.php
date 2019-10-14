<?php 
/**
 * 
 */
class C_klaten extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_klaten');
	}

	public function index() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_klaten->selectplaneklaten(),
				'timemarket' => $this->M_klaten->selecttimeklaten(),
				'pjpcomply' => $this->M_klaten->selectpjpklaten()
	 		);
			$this->load->view('Klaten/V_klaten',$data);
		}
	}

	public function efos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_klaten->selectplaneklaten(),
				'timemarket' => $this->M_klaten->selecttimeklaten(),
				'pjpcomply' => $this->M_klaten->selectpjpklaten(),
				'efosall' => $this->M_klaten->selectefosklaten()
			);
			$this->load->view('Klaten/V_efosklaten',$data);
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
					'updatesales' => $this->M_klaten->selectupdateseles()
				);

				$this->load->view('Klaten/V_upsales_klaten',$data);
			} elseif (isset($id)) {
				$data = array(
					'sales' => $this->M_klaten->selectsales($id)
				);
				$this->load->view('Klaten/V_updatesalse',$data);
			} else {
				if (isset($btn)) {
					$empcode = $this->input->post('empcode');
					$nama = $this->input->post('nama');
					$status = $this->input->post('status');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$conces = $this->input->post('conces');

					$this->M_klaten->updatesales($empcode,$nama,$status,$username,$password,$conces);
					redirect('C_klaten/updatesales');
				}
			}
		}
	}

	public function hapussales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_klaten->hapussales($id);
			redirect('C_klaten/updatesales');
		}
	}

	public function savesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Klaten/V_savesales');
			} else {
				$empcode = $this->input->post("empcode");
				$nama = $this->input->post("nama");
				$status = $this->input->post("status");
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				$conces = $this->input->post("conces");

				if (empty($empcode) && empty($nama) && empty($status) && empty($username) && empty($password) && empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Semua kolom harus di isi'
					);
					$this->load->view('Klaten/V_savesales', $data);
				} elseif (empty($empcode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Emp Code Code tidak boleh kosong'
					);
					$this->load->view('Klaten/V_savesales', $data);
				} elseif (empty($nama)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Nama tidak boleh kosong'
					);
					$this->load->view('Klaten/V_savesales', $data);
				} elseif (empty($status)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Klaten/V_savesales', $data);
				} elseif (empty($username)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Klaten/V_savesales', $data);
				} elseif (empty($password)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Klaten/V_savesales', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Klaten/V_savesales', $data);
				} else {
					$cek = $this->M_klaten->selectonesales($empcode);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Emp_Code yang anda inputkan sudah ada, silahkan input dengan Emp_Code yang berbeda'
						);
						$this->load->view('Klaten/V_savesales', $data);
					} else {
						$this->M_klaten->savesales($empcode,$nama,$status,$username,$password,$conces);
						redirect('C_klaten/updatesales');
					}
				}
			}
		}
	}
	// Efoss
	public function efosall() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'efosall' => $this->M_klaten->selectefosklaten()
			);
			$this->load->view('Klaten/V_efosall',$data);
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
					'efosall' => $this->M_klaten->selecteonefosklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_efosall',$data);
			}
		}
	}

	// Efoss

	// Planee

	public function plane() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_klaten->selectplaneklaten()
			);
			$this->load->view('Klaten/V_planeklaten',$data);
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
					'plane' => $this->M_klaten->selectoneplaneklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_planeklaten',$data);
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
				'timemarket' => $this->M_klaten->selecttimeklaten()
			);
			$this->load->view('Klaten/V_timeklaten',$data);
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
					'timemarket' => $this->M_klaten->selectonetimeklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_timeklaten',$data);
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
				'pjpcomply' => $this->M_klaten->selectpjpklaten()
			);
			$this->load->view('Klaten/V_pjpklaten',$data);
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
					'pjpcomply' => $this->M_klaten->selectonepjpklaten($bln, $thn)
				);
				$this->load->view('Klaten/V_pjpklaten',$data);
			}
		}
	}

	// pjp

	// District
	public function updatedistrict(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$discode = $this->uri->segment(3);
			$btn = $this->input->post('update');

			if (!isset($discode) AND !isset($btn)) {
				$data = array(
					'updatedistrict' => $this->M_klaten->selectupdatedistrict()
				);

				$this->load->view('Klaten/V_distrikklaten',$data);
			} elseif (isset($discode)) {
				$data = array(
					'distrik' => $this->M_klaten->selectdistrict($discode)
				);
				$this->load->view('Klaten/V_updatedistrict',$data);
			} else {

				if (isset($btn)) {
					$discode = $this->input->post("district_code");
					$district = $this->input->post("district");
					$conces = $this->input->post("conces");

					$this->M_klaten->updatedistrict($discode, $district, $conces);
					redirect('C_klaten/updatedistrict');
				}
			}
		}
	}

	public function hapusdistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$discod = $this->uri->segment(3);
			$this->M_klaten->hapusdistrict($discod);
			redirect('C_klaten/updatedistrict');
		}
	}

	public function savedistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Klaten/V_tambahdistrict');
			} else {
				$discode = $this->input->post("district_code");
				$district = $this->input->post("district");
				$conces = $this->input->post("conces");

				if (empty($discode) && empty($district) && empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Semua kolom harus di isi'
					);
					$this->load->view('Klaten/V_tambahdistrict', $data);
				} elseif (empty($discode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District Code tidak boleh kosong'
					);
					$this->load->view('Klaten/V_tambahdistrict', $data);
				} elseif (empty($district)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District tidak boleh kosong'
					);
					$this->load->view('Klaten/V_tambahdistrict', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Klaten/V_tambahdistrict', $data);
				} else {
					$cek = $this->M_klaten->selectonedistrict($discode);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Id yang anda inputkan sudah ada, silahkan inputkan dengan id lain'
						);
						$this->load->view('Klaten/V_tambahdistrict', $data);
					} else {
						$this->M_klaten->savedistrict($discode, $district, $conces);
						redirect('C_klaten/updatedistrict');
					}
				}
			}
		}
	}
}
?>