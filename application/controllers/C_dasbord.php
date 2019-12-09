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
		$this->load->model('M_diagram');
		$this->load->library('pagination');
	}
	
	public function index() {

		$nama = $this->session->userdata('user');

		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			if ($nama[0]['status']=='Admin') {
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					$data = array(
						'plane' => $this->M_admin->selectallplane(),
						'timemarket' => $this->M_admin->selectalltime(),
						'pjpcomply' => $this->M_admin->selectallpjp(),
						'summaryj' => $this->M_admin->selectsummaryconcesjogja(),
						'summarym' => $this->M_admin->selectsummaryconcesmagelang(),
						'summaryb' => $this->M_admin->selectsummaryconcesbantul(),
						'summaryk' => $this->M_admin->selectsummaryconcesklaten()
	 				);
	 				$this->load->view('V_dasbord',$data);
				} else {
					$th = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'plane' => $this->M_admin->selectallplaneconcesth($bln, $th),
						'timemarket' => $this->M_admin->selectalltimeconcesth($bln, $th),
						'pjpcomply' => $this->M_admin->selectallpjpconcesth($bln, $th),
						'summary' => $this->M_admin->selectsummaryconcesth($bln, $th)
	 				); 
					$this->load->view('V_dasbord',$data);
				}
			} elseif ($nama[0]['status']=='sales') {
				$week = $this->input->post('tanggal');

				if (empty($week)) {
					$data = array(
						'plane' => $this->M_user->selectonefost($nama[0]['Emp_Code']),
						'plane1' => $this->M_user->selectonefostnow($nama[0]['Emp_Code']),
						'timemarket' => $this->M_user->selectonetime($nama[0]['Emp_Code']),
						'timemarket1' => $this->M_user->selectonetimenow($nama[0]['Emp_Code']),
						'pjpcomply' => $this->M_user->selectonepjp($nama[0]['Emp_Code']),
						'pjpcomply1' => $this->M_user->selectonepjpnow($nama[0]['Emp_Code']),
						'summary' => $this->M_user->selectsummary($nama[0]['Emp_Code'])
					);

					$this->load->view('V_dasbord',$data);
				} else {

					$th = substr($week, 0,4);
					$wk = substr($week, 6,7);
					$data = array(
						'plane' => $this->M_user->selectonefostweek($nama[0]['Emp_Code'], $th,$wk),
						'plane1' => $this->M_user->selectonefostnowweek($nama[0]['Emp_Code'], $th,$wk),
						'timemarket' => $this->M_user->selectonetimeweek($nama[0]['Emp_Code'], $th,$wk),
						'timemarket1' => $this->M_user->selectonetimenowweek($nama[0]['Emp_Code'], $th,$wk),
						'pjpcomply' => $this->M_user->selectonepjpweek($nama[0]['Emp_Code'], $th,$wk),
						'pjpcomply1' => $this->M_user->selectonepjpnowweek($nama[0]['Emp_Code'], $th,$wk),
						'summary' => $this->M_user->selectsummaryweek($nama[0]['Emp_Code'], $th,$wk)
					);

					$this->load->view('V_dasbord',$data);
				}
			} elseif ($nama[0]['status']=='HRD') {
				$data = array(
					'plane' => $this->M_admin->selectallplane(),
					'timemarket' => $this->M_admin->selectalltime(),
					'pjpcomply' => $this->M_admin->selectallpjp(),
					'summaryj' => $this->M_admin->selectsummaryconcesjogja(),
					'summarym' => $this->M_admin->selectsummaryconcesmagelang(),
					'summaryb' => $this->M_admin->selectsummaryconcesbantul(),
					'summaryk' => $this->M_admin->selectsummaryconcesklaten()
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
					'pjpcomply' => $this->M_admin->selectallpjp(),
					'summaryj' => $this->M_admin->selectsummaryconcesjogja(),
					'summarym' => $this->M_admin->selectsummaryconcesmagelang(),
					'summaryb' => $this->M_admin->selectsummaryconcesbantul(),
					'summaryk' => $this->M_admin->selectsummaryconcesklaten()
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_dasbord/efos');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'efossales' => $this->M_user->selecteonefossales($bln, $thn, $nama[0]['Emp_Code'])
					);
					$this->load->view('V_efossales',$data);
				}	
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_dasbord/plane');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'plane' => $this->M_user->selectoneplanesales($bln, $thn, $nama[0]['Emp_Code'])
					);
					$this->load->view('V_planesales',$data);
				}		
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_dasbord/time');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'timemarket' => $this->M_user->selectonetimesales($bln, $thn, $nama[0]['Emp_Code'])
					);
					$this->load->view('V_timesales',$data);
				}
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
				$bulan = $this->input->post('tanggal');
				if (empty($bulan)) {
					redirect('C_dasbord/pjp');
				} else {
					$thn = substr($bulan, 0,4);
					$bln = substr($bulan, 5,6);
					$data = array(
						'pjpcomply' => $this->M_user->selectonepjpsales($bln, $thn, $nama[0]['Emp_Code'])
					);
					$this->load->view('V_pjpsales',$data);
				}				
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
						//konfigurasi pagination
	        $config['base_url'] = site_url('C_dasbord/dataefos'); //site url
	        $config['total_rows'] = $this->db->count_all('m_efos'); //total row
	        $config['per_page'] = 10;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        // $config["num_links"] = floor($choice);
	        $config['num_links'] = 2;
	 
	        // Membuat Style pagination untuk BootStrap v4
	      	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	 
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 
	        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
	        $data['data'] = $this->M_efos->data($config["per_page"], $data['page']);           
	 
	        $data['pagination'] = $this->pagination->create_links();
	 
	        //load view mahasiswa view
	        $this->load->view('V_dataallefos',$data);
		}
	}

	// Hapus efos

	public function editdataefos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			//konfigurasi pagination
	        $config['base_url'] = site_url('C_dasbord/editdataefos'); //site url
	        $config['total_rows'] = $this->db->count_all('upload'); //total row
	        $config['per_page'] = 10;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config['num_links'] = 2;
	 
	        // Membuat Style pagination untuk BootStrap v4
	      	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	 
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 
	        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
	        $data['data'] = $this->M_efos->dataupload($config["per_page"], $data['page']);           
	 
	        $data['pagination'] = $this->pagination->create_links();
	 
	        //load view mahasiswa view
	        $this->load->view('V_dataupload',$data);

		}
	}

	public function hapudatasefos() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$idfile = $this->uri->segment(3);
			$this->M_efos->deleteefos($idfile);
			$this->M_efos->deleteupload($idfile);

			redirect('C_dasbord/editdataefos');
		}
	}

	// Ranking

	public function ranking() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$tanggal = $this->input->post('tanggal');

			if (empty($tanggal)) {
				$user = $this->session->userdata('user');
				$empcode = $user[0]['Emp_Code'];
				$jd = $this->M_user->salesmaxjd($empcode);

				$data['rank'] = $this->M_user->ranked($user[0]['id_conces']);
				$data['infoplush'] = $this->M_diagram->infosalesplush($empcode,$jd[0]['jd']);
				$this->load->view('V_ranking',$data);
			} else {
				$bln = substr($tanggal, 5,6);
				$user = $this->session->userdata('user');
				$empcode = $user[0]['Emp_Code'];
				$jd = $this->M_user->salesmaxjd($empcode);

				$data['rank'] = $this->M_user->rankedbln($user[0]['id_conces'],$bln);
				$data['infoplush'] = $this->M_diagram->infosalesplushmore($empcode,$bln);
				$this->load->view('V_ranking',$data);
			}
			
		}
	}

	// CRUD USER

	public function user() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$data['adduser'] = $this->M_admin->user();
			$this->load->view('V_user',$data);
		}
	}

	public function hapususer() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$iduser = $this->uri->segment(3);
			$this->M_admin->hapususer($iduser);
			redirect('C_dasbord/user');
		}
	}

	public function updateuser(){
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$iduser = $this->uri->segment(3);
			$btn = $this->input->post('update');

			if (isset($iduser)) {
				$data = array(
					'upuser' => $this->M_admin->selectoneuser($iduser)
				);
				$this->load->view('V_updateuser',$data);
			} elseif (isset($btn)) {
				$iduser = $this->input->post("iduser");
				$nama = $this->input->post("nama");
				$status = $this->input->post("status");
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				$conces = $this->input->post("conces");

				$this->M_admin->updateuser($iduser, $nama, $status, $username, $password, $conces);
				redirect('C_dasbord/user');
			} else {
				redirect('C_dasbord/user');
			}
		}
	}

	public function tambahuser() {
		if (!$this->session->userdata('username')) {
			redirect('C_login');
		} else {
			$btn = $this->input->post('save');
			if (!isset($btn)) {
				$this->load->view('V_saveuser');
			} else {
				$iduser = $this->input->post("iduser");
				$nama = $this->input->post("nama");
				$status = $this->input->post("status");
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				$conces = $this->input->post("conces");
				
				if (empty($iduser)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Id user tidak boleh kosong'
					);
					$this->load->view('V_saveuser', $data);
				} elseif (empty($nama)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Nama tidak boleh kosong'
					);
					$this->load->view('V_saveuser', $data);
				} elseif (empty($status)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Status tidak boleh kosong'
					);
					$this->load->view('V_saveuser', $data);
				} elseif (empty($username)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Username tidak boleh kosong'
					);
					$this->load->view('V_saveuser', $data);
				} elseif (empty($password)) {
					$data = array(
						'statuspesan' => 'gagal',
						'isipesan' => 'Password tidak boleh kosong'
					);
					$this->load->view('V_saveuser', $data);
				} else {
					$cek = $this->M_admin->cekuser($iduser);
					if ($cek->num_rows() > 0) {
						$data = array(
							'statuspesan' => 'gagal',
							'isipesan' => 'Id user yang anda inputkan sudah ada, silahkan input dengan Emp_Code yang berbeda'
						);
						$this->load->view('V_saveuser', $data);
					}  else {
						$this->M_admin->saveuser($iduser,$nama,$status,$username,$password,$conces);
						redirect('C_dasbord/user');
					}
				}
			}
		}
	}

	// Akhir

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