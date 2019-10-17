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

	// Sales

	public function diagramsales() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);

			if (!isset($id)) {
				redirect('C_magelang/updatesales');
			} else {
				$data = array(
					'sales' => $this->M_magelang->digsales($id),
					'plane' => $this->M_magelang->selectonefost($id),
					'timemarket' => $this->M_magelang->selectonetime($id),
					'pjpcomply' => $this->M_magelang->selectonepjp($id)
				);
				$this->load->view('Magelang/V_diagramsales',$data);
			}
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

				if (empty($empcode) && empty($nama) && empty($status) && empty($username) && empty($password) && empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Semua kolom harus di isi'
					);
					$this->load->view('Magelang/V_savesales', $data);
				} elseif (empty($empcode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Emp Code Code tidak boleh kosong'
					);
					$this->load->view('Magelang/V_savesales', $data);
				} elseif (empty($nama)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Nama tidak boleh kosong'
					);
					$this->load->view('Magelang/V_savesales', $data);
				} elseif (empty($status)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Magelang/V_savesales', $data);
				} elseif (empty($username)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Magelang/V_savesales', $data);
				} elseif (empty($password)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Magelang/V_savesales', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Magelang/V_savesales', $data);
				} else {
					$cek = $this->M_magelang->selectonesales($empcode);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Emp_Code yang anda inputkan sudah ada, silahkan input dengan Emp_Code yang berbeda'
						);
						$this->load->view('Magelang/V_savesales', $data);
					} else {
						$this->M_magelang->savesales($empcode,$nama,$status,$username,$password,$conces);
						redirect('C_magelang/updatesales');
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
				'plane' => $this->M_magelang->selectplane()
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
				'timemarket' => $this->M_magelang->selecttime()
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
				'pjpcomply' => $this->M_magelang->selectpjp()
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
			$discode = $this->uri->segment(3);
			$btn = $this->input->post('update');

			if (!isset($discode) AND !isset($btn)) {
				$data = array(
					'updatedistrict' => $this->M_magelang->selectupdatedistrict()
				);

				$this->load->view('Magelang/V_distrikmagelang',$data);
			} elseif (isset($discode)) {
				$data = array(
					'distrik' => $this->M_magelang->selectdistrict($discode)
				);
				$this->load->view('Magelang/V_updatedistrict',$data);
			} else {

				if (isset($btn)) {
					$discode = $this->input->post("district_code");
					$district = $this->input->post("district");
					$conces = $this->input->post("conces");

					$this->M_magelang->updatedistrict($discode, $district, $conces);
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

				if (empty($discode) && empty($district) && empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Semua kolom harus di isi'
					);
					$this->load->view('Magelang/V_tambahdistrict', $data);
				} elseif (empty($discode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District Code tidak boleh kosong'
					);
					$this->load->view('Magelang/V_tambahdistrict', $data);
				} elseif (empty($district)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District tidak boleh kosong'
					);
					$this->load->view('Magelang/V_tambahdistrict', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Magelang/V_tambahdistrict', $data);
				} else {
					$cek = $this->M_magelang->selectonedistrict($discode);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Id yang anda inputkan sudah ada, silahkan inputkan dengan id lain'
						);
						$this->load->view('Magelang/V_tambahdistrict', $data);
					} else {
						$this->M_magelang->savedistrict($discode, $district, $conces);
						redirect('C_magelang/updatedistrict');
					}
				}
			}
		}
	}
}
?>