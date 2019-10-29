<?php 
/**
* 
*/
class C_dasbord extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_user');
		$this->load->model('M_efos');
	}
	
	public function index() {

		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['status']=='Admin') {
				$data = array(
					'plane' => $this->M_admin->selectallplane(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp()
 				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='sales') {
				$data = array(
					'plane' => $this->M_user->selectonefost($nama[0]['Emp_Code']),
					'timemarket' => $this->M_user->selectonetime($nama[0]['Emp_Code']),
					'pjpcomply' => $this->M_user->selectonepjp($nama[0]['Emp_Code']),
					'plane1' => $this->M_user->selectonefostnow($nama[0]['Emp_Code']),
					'timemarket1' => $this->M_user->selectonetimenow($nama[0]['Emp_Code']),
					'pjpcomply1' => $this->M_user->selectonepjpnow($nama[0]['Emp_Code'])
				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='HRD') {
				$data = array(
					'plane' => $this->M_admin->selectallplane(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp()
				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='Supervisor') {
				if ($nama[0]['id_conces']=='1') {
					redirect('C_jogja');
				} elseif ($nama[0]['id_conces']=='2') {
					redirect('C_magelang');
				} elseif ($nama[0]['id_conces']=='3') {
					redirect('C_bantul');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten');
				} else {
					redirect('C_logout');
				}
			} elseif ($nama[0]['status']=='Owner') {
				$data = array(
					'plane' => $this->M_admin->selectallplane(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp()
				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='Oprational Manager') {
				if ($nama[0]['id_conces']=='1') {
					redirect('C_jogja');
				} elseif ($nama[0]['id_conces']=='2') {
					redirect('C_magelang');
				} elseif ($nama[0]['id_conces']=='3') {
					redirect('C_bantul');
				} elseif ($nama[0]['id_conces']=='4') {
					redirect('C_klaten');
				} else {
					redirect('C_logout');
				}
			}

		}

	}

	// public function home() {
	// 	$nama = $this->session->userdata('user');

	// 	if (!$this->session->userdata('username')) {
	// 		redirect('C_login');
	// 	} else {
	// 		if ($nama[0]['status']=='admin') {
	// 			$data = array(
	// 				'side2' => 'V_home',
	// 				'plane' => $this->M_admin->selectallplane(),
	// 				'timemarket' => $this->M_admin->selectalltime(),
	// 				'pjpcomply' => $this->M_admin->selectallpjp()
	// 			);
	// 			$this->load->view('V_dasbord',$data);
	// 		} elseif ($nama[0]['status']=='sales') {
	// 			$data = array(
	// 				'laman1' => 'V_home',
	// 				'plane' => $this->M_user->selectonefost($nama[0]['Emp_Code']),
	// 				'timemarket' => $this->M_user->selectonetime($nama[0]['Emp_Code']),
	// 				'pjpcomply' => $this->M_user->selectonepjp($nama[0]['Emp_Code'])
	// 			);
	// 			$this->load->view('V_dasbord',$data);
	// 		}
	// 	}
	// }

	// Efoss

	public function efosall() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['status']=='admin') {
				$data = array(
					'plane' => $this->M_admin->selectallfost(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp(),
					'efosall' => $this->M_admin->selectefos()
				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='sales') {
				$data = array(
					'efossales' => $this->M_user->selectefosall($nama[0]['Emp_Code'])
				);
				$this->load->view('V_efossales',$data);
			}
		}
	}

	public function efos() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['status']=='admin') {
				$data = array(
					'plane' => $this->M_admin->selectallfost(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp(),
					'efosall' => $this->M_admin->selectefos()
				);
				$this->load->view('V_dasbord',$data);
			} elseif ($nama[0]['status']=='sales') {
				$data = array(
					'efossales' => $this->M_user->selectefosall($nama[0]['Emp_Code'])
				);
				$this->load->view('V_efossales',$data);
			}
		}
	}

	public function efosallselect()	{
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'efossales' => $this->M_user->selecteonefossales($bln, $thn, $nama[0]['Emp_Code'])
				);
				$this->load->view('V_efossales',$data);
			}
		}
	}

	// Plane


	public function plane() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'plane' => $this->M_user->selectplanesales($nama[0]['Emp_Code'])
			);
			$this->load->view('/V_planesales',$data);
		}
	}

	public function planeselect() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'plane' => $this->M_user->selectoneplanebantul($bln, $thn, $nama[0]['Emp_Code'])
				);
				$this->load->view('V_planesales',$data);
			}
		}
	}

	// Time

	public function time() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'timemarket' => $this->M_user->selecttimesales($nama[0]['Emp_Code'])
			);
			$this->load->view('V_timesales',$data);
		}
	}

	public function timeselect() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'timemarket' => $this->M_user->selectonetimesales($bln, $thn, $nama[0]['Emp_Code'])
				);
				$this->load->view('V_timesales',$data);
			}
		}
	}

	// PJP

	public function pjp() {
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data = array(
				'pjpcomply' => $this->M_user->selectpjpsales($nama[0]['Emp_Code'])
			);
			$this->load->view('V_pjpsales',$data);
		}
	}

	public function pjpselect()	{
		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('cari');
			if (isset($btn)) {
				$bln = $this->input->post('bulan');
				$thn = $this->input->post('tahun');

				$data = array(
					'pjpcomply' => $this->M_user->selectonepjpbantul($bln, $thn, $nama[0]['Emp_Code'])
				);
				$this->load->view('V_pjpsales',$data);
			}
		}
	}

	// Importttt


	public function importexcel() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$date = date('Y-m-d');
			$data = array(
				'efos' => $this->M_admin->getefos($date)
			);

			$this->load->view('V_import',$data);
		}
	}

	public function dataefos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$this->load->database();
			$jumlah_data = $this->m_efos->dataefos();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'C_dasbord/dataefos/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);		
			$data['dataefos'] = $this->m_efos->data($config['per_page'],$from);
			$this->load->view('V_dataallefos',$data);
		}
	}

	// Akhir import

	// public function updatesales(){
	// 	if (!$this->session->userdata('username')) {
	// 		redirect('C_login');
	// 	} else {
	// 		$data = array(
	// 			'side4' => 'V_update_sales',
	// 			'updatesales' => $this->M_admin->selectupdateseles()
	// 		);

	// 		$this->load->view('V_dasbord',$data);
	// 	}
	// }
	// public function hapussales(){
	// 	if (!$this->session->userdata('username')) {
	// 		redirect('C_login');
	// 	} else {
	// 		$id = $this->uri->segment(3);
	// 		$this->M_admin->hapussales($id);
	// 		redirect('http://[::1]/ProjeckPKL/C_dasbord/updatesales');
	// 	}
	// }
	// public function editsales(){
	// 	if (!$this->session->userdata('username')) {
	// 		redirect('C_login');
	// 	} else {
	// 		$id = $this->uri->segment(3);
	// 		$this->M_admin->editsales($id);
	// 		redirect('http://[::1]/ProjeckPKL/C_dasbord/updatesales');
	// 	}
	// }

	// public function savesales(){
	// 	if (!$this->session->userdata('username')) {
	// 		redirect('C_login');
	// 	} else {
	// 		$btn = $this->input->post('save');
			
	// 		if (isset($btn)) {
	// 			$Emp_Code = $this->input->post("Emp_Code");
	// 			$Salesman = $this->input->post("Salesman");
	// 			$Status = $this->input->post("Status");
	// 			$Username = $this->input->post("Username");
	// 			$Password = $this->input->post("Password");
				
	// 			$this->M_admin->savesales($Emp_Code, $Salesman, $Status, $Username, $Password);
	// 		}
	// 	}
	// }
}

?>