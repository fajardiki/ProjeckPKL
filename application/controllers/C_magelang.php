<?php 
/**
 * 
 */
class C_magelang extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_magelang');
		$this->load->model('M_user');
		$this->load->model('M_diagram');
	}

	public function index() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['id_conces']=='1') {
				redirect('C_jogja');
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
						'plane' => $this->M_magelang->selectplanemagelang(),
						'timemarket' => $this->M_magelang->selecttimemagelang(),
						'pjpcomply' => $this->M_magelang->selectpjpmagelang(),
						'summary' => $this->M_magelang->selectsummarymagelang()
			 		);
					$this->load->view('Magelang/V_magelang',$data);
				} elseif (isset($empcode) AND isset($jd)) {
					$data = array(
						// 'info' => $this->M_diagram->infosales($empcode,$jd),
						'infoplush' => $this->M_diagram->infosalesplush($empcode,$jd),
						'summary' => $this->M_magelang->selectsummarymagelangbln($jd)
				 	);
					$this->load->view('Magelang/V_magelang',$data);
				} else {
					$th = substr($week, 0,4);
					$wk = substr($week, 6,7);
					$data = array(
						'plane' => $this->M_magelang->selectplanemagelangwk($th,$wk),
						'timemarket' => $this->M_magelang->selecttimemagelangwk($th,$wk),
						'pjpcomply' => $this->M_magelang->selectpjpmagelangwk($th,$wk),
						'summary' => $this->M_magelang->selectsummarymagelangwk($th,$wk)
			 		);
					$this->load->view('Magelang/V_magelang',$data);
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
			} elseif ($nama[0]['id_conces']=='3') {
				redirect('C_bantul/efos');
			} elseif ($nama[0]['id_conces']=='4') {
				redirect('C_klaten/efos');
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
	}

	// Sales

	public function diagramsales() {
		$nama = $this->session->userdata('user');
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$id = $this->uri->segment(3);

			if (!isset($id)) {
				redirect('C_magelang/updatesales');
			} else {
				if ($nama[0]['id_conces']=='1') {
					redirect('C_jogja/updatesales');
				} elseif ($nama[0]['id_conces']=='3') {
					redirect('C_bantul/updatesales');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten/updatesales');
				} else {
					$data = array(
						'sales' => $this->M_magelang->digsales($id),
						'plane' => $this->M_magelang->selectonefost($id),
						'timemarket' => $this->M_magelang->selectonetime($id),
						'pjpcomply' => $this->M_magelang->selectonepjp($id),
						'back' => 'C_magelang/updatesales',
						'judul' => 'Magelang'
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
				if ($nama[0]['id_conces']=='1') {
					redirect('C_jogja/updatesales');
				} elseif ($nama[0]['id_conces']=='3') {
					redirect('C_bantul/updatesales');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten/updatesales');
				} else {
					$data = array(
						'updatesales' => $this->M_magelang->selectupdateseles(),
						'rank' => $this->M_user->ranked('2')
					);

					$this->load->view('Magelang/V_upsales_magelang',$data);
				}
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

					// $ceknama = $this->M_magelang->selectnamesales($nama);
					// $cekuname = $this->M_magelang->selectunamesales($username);
					// $cekpword = $this->M_magelang->selectpwordsales($password);

					// if ($ceknama == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Nama yang anda inputkan sudah ada, silahkan input dengan Nama yang berbeda',
					// 		'updatesales' => $this->M_magelang->selectupdateseles()
					// 	);
					// 	$this->load->view('Magelang/V_upsales_magelang',$data);
					// } elseif ($cekuname == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Username yang anda inputkan sudah ada, silahkan input dengan Username yang berbeda',
					// 		'updatesales' => $this->M_magelang->selectupdateseles()
					// 	);
					// 	$this->load->view('Magelang/V_upsales_magelang',$data);
					// } elseif ($cekpword == 1) {
					// 	$data = array(
					// 		'statuspesan' => 'gagal',
					// 		'isipesan' => 'Password yang anda inputkan sudah ada, silahkan input dengan Password yang berbeda',
					// 		'updatesales' => $this->M_magelang->selectupdateseles()
					// 	);
					// 	$this->load->view('Magelang/V_upsales_magelang',$data);
					// } else {
						
					// }

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
					$ceknama = $this->M_magelang->selectnamesales($nama);
					$cekuname = $this->M_magelang->selectunamesales($username);
					$cekpword = $this->M_magelang->selectpwordsales($password);
					if ($cek == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Emp_Code yang anda inputkan sudah ada, silahkan input dengan Emp_Code yang berbeda'
						);
						$this->load->view('Magelang/V_savesales', $data);
					} elseif ($ceknama == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Nama yang anda inputkan sudah ada, silahkan input dengan Nama yang berbeda'
						);
						$this->load->view('Magelang/V_savesales', $data);
					} elseif ($cekuname == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Username yang anda inputkan sudah ada, silahkan input dengan Username yang berbeda'
						);
						$this->load->view('Magelang/V_savesales', $data);
					} elseif ($cekpword == 1) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Password yang anda inputkan sudah ada, silahkan input dengan Password yang berbeda'
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_magelang/efos');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'efosall' => $this->M_magelang->selecteonefosmagelang($bln, $thn)
					);
					$this->load->view('Magelang/V_efosmagelang',$data);
				}
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_magelang/plane');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'plane' => $this->M_magelang->selectoneplanemagelang($bln, $thn)
					);
					$this->load->view('Magelang/V_planemagelang',$data);
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_magelang/time');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'timemarket' => $this->M_magelang->selectonetimemagelang($bln, $thn)
					);
					$this->load->view('Magelang/V_timemagelang',$data);
				}
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_magelang/pjp');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'pjpcomply' => $this->M_magelang->selectonepjpmagelang($bln, $thn)
					);
					$this->load->view('Magelang/V_pjpmagelang',$data);
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