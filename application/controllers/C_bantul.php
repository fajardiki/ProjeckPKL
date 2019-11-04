<?php 
/**
 * 
 */


class C_bantul extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_bantul');
		$this->load->model('M_user');
	}

	public function index() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['id_conces']=='1') {
				redirect('C_jogja');
			} elseif ($nama[0]['id_conces']=='2') {
				redirect('C_magelang');
			} elseif ($nama[0]['id_conces']=='4') {
				redirect('C_klaten');
			} else {
				$week = $this->input->post('tanggal');
				if (empty($week)) {
					$data = array(
						'plane' => $this->M_bantul->selectplanebantul(),
						'timemarket' => $this->M_bantul->selecttimebantul(),
						'pjpcomply' => $this->M_bantul->selectpjpbantul(),
						'summary' => $this->M_bantul->selectsummarybantul()
			 		);
					$this->load->view('Bantul/V_bantul',$data);
				} else {
					$th = substr($week, 0,4);
					$wk = substr($week, 6,7);
					$data = array(
						'plane' => $this->M_bantul->selectplanebantulwk($th,$wk),
						'timemarket' => $this->M_bantul->selecttimebantulwk($th,$wk),
						'pjpcomply' => $this->M_bantul->selectpjpbantulwk($th,$wk),
						'summary' => $this->M_bantul->selectsummarybantulwk($th,$wk)
			 		);
					$this->load->view('Bantul/V_bantul',$data);
				}
			}
		}
	}

	public function efos() {
		$nama = $this->session->userdata('user');
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['id_conces']=='1') {
				redirect('C_jogja/efos');
			} elseif ($nama[0]['id_conces']=='2') {
				redirect('C_magelang/efos');
			} elseif ($nama[0]['id_conces']=='4') {
				redirect('C_klaten/efos');
			} else {
				$data = array(
					'plane' => $this->M_bantul->selectplanebantul(),
					'timemarket' => $this->M_bantul->selectplanebantul(),
					'pjpcomply' => $this->M_bantul->selectplanebantul(),
					'efosall' => $this->M_bantul->selectefosbantul()
				);
				$this->load->view('Bantul/V_efosbantul',$data);
			}
		}
	}

	// Sales

	public function diagramsales() {
		$nama = $this->session->userdata('user');
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);

			if (!isset($id)) {
				redirect('C_bantul/updatesales');
			} else {
				if ($nama[0]['id_conces']=='1') {
					redirect('C_jogja/updatesales');
				} elseif ($nama[0]['id_conces']=='2') {
					redirect('C_magelang/updatesales');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten/updatesales');
				} else {
					$data = array(
						'sales' => $this->M_bantul->digsales($id),
						'plane' => $this->M_bantul->selectonefost($id),
						'timemarket' => $this->M_bantul->selectonetime($id),
						'pjpcomply' => $this->M_bantul->selectonepjp($id)
					);
					$this->load->view('Bantul/V_diagramsales',$data);
				}
			}
		}
	}

	public function updatesales(){
		$nama = $this->session->userdata('user');
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$btn = $this->input->post('update');

			if (!isset($id) AND !isset($btn)) {
				if ($nama[0]['id_conces']=='1') {
					redirect('C_jogja/updatesales');
				} elseif ($nama[0]['id_conces']=='2') {
					redirect('C_magelang/updatesales');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten/updatesales');
				} else {
					$data = array(
						'updatesales' => $this->M_bantul->selectupdateseles()
					);

					$this->load->view('Bantul/V_upsales_bantul',$data);
				}
			} elseif (isset($id)) {
				$data = array(
					'sales' => $this->M_bantul->selectsales($id)
				);
				$this->load->view('Bantul/V_updatesalse',$data);
			} else {
				if (isset($btn)) {
					$empcode = $this->input->post('empcode');
					$nama = $this->input->post('nama');
					$status = $this->input->post('status');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$conces = $this->input->post('conces');

					// $ceknama = $this->M_bantul->selectnamesales($nama);
					// $cekuname = $this->M_bantul->selectunamesales($username);
					// $cekpword = $this->M_bantul->selectpwordsales($password);

					// if ($ceknama == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Nama yang anda inputkan sudah ada, silahkan input dengan Nama yang berbeda',
					// 		'updatesales' => $this->M_bantul->selectupdateseles()
					// 	);
					// 	$this->load->view('Bantul/V_upsales_bantul',$data);
					// } elseif ($cekuname == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Username yang anda inputkan sudah ada, silahkan input dengan Username yang berbeda',
					// 		'updatesales' => $this->M_bantul->selectupdateseles()
					// 	);
					// 	$this->load->view('Bantul/V_upsales_bantul',$data);
					// } elseif ($cekpword == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Password yang anda inputkan sudah ada, silahkan input dengan Password yang berbeda',
					// 		'updatesales' => $this->M_bantul->selectupdateseles()
					// 	);
					// 	$this->load->view('Bantul/V_upsales_bantul',$data);
					// } else {
						
					// }
					$this->M_bantul->updatesales($empcode,$nama,$status,$username,$password,$conces);
					redirect('C_bantul/updatesales');
				}
			}
		}
	}

	public function hapussales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);
			$this->M_bantul->hapussales($id);
			redirect('C_bantul/updatesales');
		}
	}

	public function savesales(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Bantul/V_savesales');
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
					$this->load->view('Bantul/V_savesales', $data);
				} elseif (empty($empcode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Emp Code Code tidak boleh kosong'
					);
					$this->load->view('Bantul/V_savesales', $data);
				} elseif (empty($nama)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Nama tidak boleh kosong'
					);
					$this->load->view('Bantul/V_savesales', $data);
				} elseif (empty($status)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Bantul/V_savesales', $data);
				} elseif (empty($username)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Bantul/V_savesales', $data);
				} elseif (empty($password)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Bantul/V_savesales', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Bantul/V_savesales', $data);
				} else {
					$cek = $this->M_bantul->selectonesales($empcode);
					$ceknama = $this->M_bantul->selectnamesales($nama);
					$cekuname = $this->M_bantul->selectunamesales($username);
					$cekpword = $this->M_bantul->selectpwordsales($password);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Emp_Code yang anda inputkan sudah ada, silahkan input dengan Emp_Code yang berbeda'
						);
						$this->load->view('Bantul/V_savesales', $data);
					} elseif ($ceknama == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Nama yang anda inputkan sudah ada, silahkan input dengan Nama yang berbeda'
						);
						$this->load->view('Bantul/V_savesales', $data);
					} elseif ($cekuname == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Username yang anda inputkan sudah ada, silahkan input dengan Username yang berbeda'
						);
						$this->load->view('Bantul/V_savesales', $data);
					} elseif ($cekpword == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Password yang anda inputkan sudah ada, silahkan input dengan Password yang berbeda'
						);
						$this->load->view('Bantul/V_savesales', $data);
					} else {
						$this->M_bantul->savesales($empcode,$nama,$status,$username,$password,$conces);
						redirect('C_bantul/updatesales');
					}
				}
			}
		}
	}

	// Sales

	// Efoss
	public function efosall() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'efosall' => $this->M_bantul->selectefosbantul()
			);
			$this->load->view('Bantul/V_efosall',$data);
		}
	}

	public function efosallselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_bantul/efos');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'efosall' => $this->M_bantul->selecteonefosbantul($bln, $thn)
					);
					$this->load->view('Bantul/V_efosbantul',$data);
				}
				
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
				'plane' => $this->M_bantul->selectplane()
			);
			$this->load->view('Bantul/V_planebantul',$data);
		}
	}

	public function planeselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_bantul/plane');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'plane' => $this->M_bantul->selectoneplanebantul($bln, $thn)
					);
					$this->load->view('Bantul/V_planebantul',$data);
				}			
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
				'timemarket' => $this->M_bantul->selecttime()
			);
			$this->load->view('Bantul/V_timebantul',$data);
		}
	}

	public function timeselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_bantul/time');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'timemarket' => $this->M_bantul->selectonetimebantul($bln, $thn)
					);
					$this->load->view('Bantul/V_timebantul',$data);
				}			
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
				'pjpcomply' => $this->M_bantul->selectpjp()
			);
			$this->load->view('Bantul/V_pjpbantul',$data);
		}
	}

	public function pjpselect() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_bantul/pjp');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'pjpcomply' => $this->M_bantul->selectonepjpbantul($bln, $thn)
					);
					$this->load->view('Bantul/V_pjpbantul',$data);
				}

				
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
					'updatedistrict' => $this->M_bantul->selectupdatedistrict()
				);

				$this->load->view('Bantul/V_distrikbantul',$data);
			} elseif (isset($discode)) {
				$data = array(
					'distrik' => $this->M_bantul->selectdistrict($discode)
				);
				$this->load->view('Bantul/V_updatedistrict',$data);
			} else {

				if (isset($btn)) {
					$discode = $this->input->post("district_code");
					$district = $this->input->post("district");
					$conces = $this->input->post("conces");

					$this->M_bantul->updatedistrict($discode, $district, $conces);
					redirect('C_bantul/updatedistrict');
				}
			}
		}
	}

	public function hapusdistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$discod = $this->uri->segment(3);
			$this->M_bantul->hapusdistrict($discod);
			redirect('C_bantul/updatedistrict');
		}
	}

	public function savedistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Bantul/V_tambahdistrict');
			} else {

				$discode = $this->input->post("district_code");
				$district = $this->input->post("district");
				$conces = $this->input->post("conces");

				if (empty($discode) && empty($district) && empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Semua kolom harus di isi'
					);
					$this->load->view('Bantul/V_tambahdistrict', $data);
				} elseif (empty($discode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District Code tidak boleh kosong'
					);
					$this->load->view('Bantul/V_tambahdistrict', $data);
				} elseif (empty($district)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District tidak boleh kosong'
					);
					$this->load->view('Bantul/V_tambahdistrict', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Bantul/V_tambahdistrict', $data);
				} else {
					$cek = $this->M_bantul->selectonedistrict($discode);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Id yang anda inputkan sudah ada, silahkan inputkan dengan id lain'
						);
						$this->load->view('Bantul/V_tambahdistrict', $data);
					} else {
						$query = $this->M_bantul->savedistrict($discode, $district, $conces);
						redirect('C_bantul/updatedistrict');
					}
				}
			}
		}
	}

}
?>