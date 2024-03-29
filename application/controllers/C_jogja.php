<?php 
/**
 * 
 */
class C_jogja extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_jogja');
		$this->load->model('M_user');
		$this->load->model('M_diagram');
	}

	public function index() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['id_conces']=='2') {
				redirect('C_magelang');
			} elseif ($nama[0]['id_conces']=='3') {
				redirect('C_bantul');
			} elseif ($nama[0]['id_conces']=='4') {
				redirect('C_klaten');
			} else {
				$week = $this->input->post('tanggal');
				$empcode = $this->uri->segment(3);
				$jd = $this->uri->segment(4);

				
				if (empty($week) AND empty($empcode) AND empty($jd)) {
					$data = array(
						'plane' => $this->M_jogja->selectplanejogja(),
						'timemarket' => $this->M_jogja->selecttimejogja(),
						'pjpcomply' => $this->M_jogja->selectpjpjogja(),
						'summary' => $this->M_jogja->selectsummaryjogja()
				 	);
					$this->load->view('Jogja/V_jogja',$data);
				} elseif (isset($empcode) AND isset($jd)) {
					$data = array(
						// 'info' => $this->M_diagram->infosales($empcode,$jd),
						'infoplush' => $this->M_diagram->infosalesplush($empcode,$jd),
						'summary' => $this->M_jogja->selectsummaryjogjabln($jd)
				 	);
					$this->load->view('Jogja/V_jogja',$data);
				} else {
					$th = substr($week, 0,4);
					$wk = substr($week, 6,7);
					$data = array(
						'plane' => $this->M_jogja->selectplanejogjawk($th,$wk),
						'timemarket' => $this->M_jogja->selecttimejogjawk($th,$wk),
						'pjpcomply' => $this->M_jogja->selectpjpjogjawk($th,$wk),
						'summary' => $this->M_jogja->selectsummaryjogjawk($th,$wk)
				 	);
					$this->load->view('Jogja/V_jogja',$data);
				}
				
			}
		}
	}

	public function efos() {
		$nama = $this->session->userdata('user');
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['id_conces']=='2') {
				redirect('C_magelang/efos');
			} elseif ($nama[0]['id_conces']=='3') {
				redirect('C_bantul/efos');
			} elseif ($nama[0]['id_conces']=='4') {
				redirect('C_klaten/efos');
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
	}

	// Sales

	public function diagramsales() {
		$nama = $this->session->userdata('user');
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);

			if (!isset($id)) {
				redirect('C_jogja/updatesales');
			} else {
				if ($nama[0]['id_conces']=='2') {
					redirect('C_magelang/updatesales');
				} elseif ($nama[0]['id_conces']=='3') {
					redirect('C_bantul/updatesales');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten/updatesales');
				} else {
					$data = array(
						'sales' => $this->M_jogja->digsales($id),
						'plane' => $this->M_jogja->selectonefost($id),
						'timemarket' => $this->M_jogja->selectonetime($id),
						'pjpcomply' => $this->M_jogja->selectonepjp($id),
						'back' => 'C_jogja/updatesales',
						'judul' => 'Jogja'
					);
					$this->load->view('Diagram/V_diagramsales',$data);
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
				if ($nama[0]['id_conces']=='2') {
					redirect('C_magelang/updatesales');
				} elseif ($nama[0]['id_conces']=='3') {
					redirect('C_bantul/updatesales');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten/updatesales');
				} else {
					$data = array(
						'updatesales' => $this->M_jogja->selectupdateseles(),
						'rank' => $this->M_user->ranked('1')
					);

					$this->load->view('Jogja/V_upsales_jogja',$data);
				}
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

					// $ceknama = $this->M_jogja->selectnamesales($nama);
					// $cekuname = $this->M_jogja->selectunamesales($username);
					// $cekpword = $this->M_jogja->selectpwordsales($password);

					// if ($ceknama == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Nama yang anda inputkan sudah ada, silahkan input dengan Nama yang berbeda',
					// 		'updatesales' => $this->M_jogja->selectupdateseles()
					// 	);
					// 	$this->load->view('Jogja/V_upsales_jogja',$data);
					// } elseif ($cekuname == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Username yang anda inputkan sudah ada, silahkan input dengan Username yang berbeda',
					// 		'updatesales' => $this->M_jogja->selectupdateseles()
					// 	);
					// 	$this->load->view('Jogja/V_upsales_jogja',$data);
					// } elseif ($cekpword == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Password yang anda inputkan sudah ada, silahkan input dengan Password yang berbeda',
					// 		'updatesales' => $this->M_jogja->selectupdateseles()
					// 	);
					// 	$this->load->view('Jogja/V_upsales_jogja',$data);
					// } else {
						
					// }
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

				if (empty($empcode) && empty($nama) && empty($status) && empty($username) && empty($password) && empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Semua kolom harus di isi'
					);
					$this->load->view('Jogja/V_savesales', $data);
				} elseif (empty($empcode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Emp Code Code tidak boleh kosong'
					);
					$this->load->view('Jogja/V_savesales', $data);
				} elseif (empty($nama)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Nama tidak boleh kosong'
					);
					$this->load->view('Jogja/V_savesales', $data);
				} elseif (empty($status)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Jogja/V_savesales', $data);
				} elseif (empty($username)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Jogja/V_savesales', $data);
				} elseif (empty($password)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Jogja/V_savesales', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Jogja/V_savesales', $data);
				}  else {
					$cek = $this->M_jogja->selectonesales($empcode);
					$ceknama = $this->M_jogja->selectnamesales($nama);
					$cekuname = $this->M_jogja->selectunamesales($username);
					$cekpword = $this->M_jogja->selectpwordsales($password);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Emp_Code yang anda inputkan sudah ada, silahkan input dengan Emp_Code yang berbeda'
						);
						$this->load->view('Jogja/V_savesales', $data);
					} elseif ($ceknama == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Nama yang anda inputkan sudah ada, silahkan input dengan Nama yang berbeda'
						);
						$this->load->view('Jogja/V_savesales', $data);
					} elseif ($cekuname == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Username yang anda inputkan sudah ada, silahkan input dengan Username yang berbeda'
						);
						$this->load->view('Jogja/V_savesales', $data);
					} elseif ($cekpword == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Password yang anda inputkan sudah ada, silahkan input dengan Password yang berbeda'
						);
						$this->load->view('Jogja/V_savesales', $data);
					} else {
						$this->M_jogja->savesales($empcode,$nama,$status,$username,$password,$conces);
						redirect('C_jogja/updatesales');
					}
				}
			}
		}
	}

	// Efoss
	// public function efosall() {
	// 	if (!$this->session->userdata('username')) {
	// 		redirect('C_login');
	// 	} else {
	// 		$data = array(
	// 			'efosall' => $this->M_jogja->selectefosjogja()
	// 		);
	// 		$this->load->view('Jogja/V_efosall',$data);
	// 	}
	// }

	public function efosallselect() {
		$btn = $this->input->post('cari');
		if (isset($btn)) {
			$bulan = $this->input->post('tanggal');
			if (empty($bulan)) {
				redirect('C_jogja/efos');
			} else {
				$thn = substr($bulan, 0,4);
				$bln = substr($bulan, 5,6);
				$data = array(
					'efosall' => $this->M_jogja->selecteonefosjogja($bln, $thn)
				);
				$this->load->view('Jogja/V_efosjogja',$data);

			}
		} else {
			redirect('efos');
		}
	}
	// Efoss
	// Plane
	public function plane() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_jogja->selectplane()
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_jogja/plane');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);

					$data = array(
						'plane' => $this->M_jogja->selectoneplanejogja($bln, $thn)
					);
					$this->load->view('Jogja/V_planejogja',$data);

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
				'timemarket' => $this->M_jogja->selecttime()
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_jogja/time');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);

					$data = array(
					'timemarket' => $this->M_jogja->selectonetimejogja($bln, $thn)
					);
					$this->load->view('Jogja/V_timejogja',$data);

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
				'pjpcomply' => $this->M_jogja->selectpjp()
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_jogja/pjp');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);

					$data = array(
						'pjpcomply' => $this->M_jogja->selectonepjpjogja($bln, $thn)
					);
					$this->load->view('Jogja/V_pjpjogja',$data);
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
					'updatedistrict' => $this->M_jogja->selectupdatedistrict()
				);

				$this->load->view('Jogja/V_distrikjogja',$data);
			} elseif (isset($discode)) {
				$data = array(
					'distrik' => $this->M_jogja->selectdistrict($discode)
				);

				$this->load->view('Jogja/V_updatedistrict',$data);
			} else {

				if (isset($btn)) {
					$discode = $this->input->post("district_code");
					$district = $this->input->post("district");
					$conces = $this->input->post("conces");

					$this->M_jogja->updatedistrict($discode, $district, $conces);
					redirect('C_jogja/updatedistrict');
				}
			}
		}
	}

	public function hapusdistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$discod = $this->uri->segment(3);
			$this->M_jogja->hapusdistrict($discod);
			redirect('C_jogja/updatedistrict');
		}
	}

	public function savedistrict() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('Jogja/V_tambahdistrict');
			} else {
				$discode = $this->input->post("district_code");
				$district = $this->input->post("district");
				$conces = $this->input->post("conces");

				if (empty($discode) && empty($district) && empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Semua kolom harus di isi'
					);
					$this->load->view('Jogja/V_tambahdistrict', $data);
				} elseif (empty($discode)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District Code tidak boleh kosong'
					);
					$this->load->view('Jogja/V_tambahdistrict', $data);
				} elseif (empty($district)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'District tidak boleh kosong'
					);
					$this->load->view('Jogja/V_tambahdistrict', $data);
				} elseif (empty($conces)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Concess tidak boleh kosong'
					);
					$this->load->view('Jogja/V_tambahdistrict', $data);
				} else {
					$cek = $this->M_jogja->selectonedistrict($discode);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Id yang anda inputkan sudah ada, silahkan inputkan dengan id lain'
						);
						$this->load->view('Jogja/V_tambahdistrict', $data);
					} else {
						$this->M_jogja->savedistrict($discode, $district, $conces);
						redirect('C_jogja/updatedistrict');
					}					
				}
			}
		}
	}
	
}
?>