​​​​<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_import extends CI_Controller {
    public $data;
    function __construct() {
        parent::__construct();
        $this->load->model('M_efos');
        $this->load->library('PHPExcel');
    }
    
    public function index() {
        $nama = $this->session->userdata('user');

        if (!$this->session->userdata('username')) {
            redirect('C_login');
        } else {
            if ($nama[0]['status']=='Admin') {
                $this->load->view('V_import');
            } else {
                redirect('C_logout/logoutadmin');
            }
            
        }   
    }

    public function saveimport() {

        if(isset($_FILES["file"]["name"])) {
            $nama = $_FILES["file"]["name"];

            $cek = $this->M_efos->selectefos($nama);
                
                if ($cek == 1) {
                   $data = array(
                        'statuspesan' => 'gagal',
                        'isipesan' => 'File yang kamu upload sudah ada'
                    );
                    $this->load->view('V_import', $data);
                } else {
                    
                    $conces = $this->input->post('conces');
                    $path = $_FILES["file"]["tmp_name"];
                    $object = PHPExcel_IOFactory::load($path);

                    if (empty($conces)) {
                        $data = array(
                            'statuspesan' => 'gagal',
                            'isipesan' => 'Concess tidak boleh kosong'
                        );

                        $this->load->view('V_import', $data);
                    } else {
                        if ($_FILES['file']['size'] <=25000) {
                            $this->M_efos->insertname($_FILES["file"]["name"]);

                            foreach($object->getWorksheetIterator() as $worksheet) {
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++) {   
                                    $JourneyDate = $worksheet->getCellByColumnAndRow(0, $row)->getFormattedValue();
                                    $RouteName = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                    $SalesmanName = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                    $Planned = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                    $Visited = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                    $Unplaned = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                    $StartTime = $worksheet->getCellByColumnAndRow(6, $row)->getFormattedValue();
                                    $EndTime = $worksheet->getCellByColumnAndRow(7, $row)->getFormattedValue();
                                    // $TimeinMarket = $worksheet->getCellByColumnAndRow(8, $row)->getFormattedValue();
                                    // $TimeinMarket = json_decode(json_encode(PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(8, $row)->getFormattedValue())), true)['date'];
                                    $Spent = $worksheet->getCellByColumnAndRow(8, $row)->getFormattedValue();
                                    $TimePerOutlet = $worksheet->getCellByColumnAndRow(9, $row)->getFormattedValue();
                                    // $TimePerOutlet = json_decode(json_encode(PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(10, $row)->getFormattedValue())), true)['date'];
                                    $Nosale = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                                    $Productive = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                                    $Geomismatch = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                                    $Line = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                                    $TotalQty = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                                    $TotalSale = $worksheet->getCellByColumnAndRow(15, $row)->getValue();

                                    // $timemarket = [$TimeinMarket[11],$TimeinMarket[12],$TimeinMarket[13],$TimeinMarket[14],$TimeinMarket[15],$TimeinMarket[16],$TimeinMarket[17],$TimeinMarket[18]];
                                    // $timeoutlet = [$TimePerOutlet[11],$TimePerOutlet[12],$TimePerOutlet[13],$TimePerOutlet[14],$TimePerOutlet[15],$TimePerOutlet[16],$TimePerOutlet[17],$TimePerOutlet[18]];

                                    $data[] = array(
                                        'File_Name' => $this->M_efos->idupload($_FILES["file"]["name"]),
                                        'Date_Update' => date('Y-m-d'),
                                        'id_conces' => $conces,

                                        'Journey_Date' => date('Y-m-d', strtotime($JourneyDate)),
                                        'District_Code' => $this->M_efos->district_code($RouteName),
                                        'Emp_Code' => $this->M_efos->emp_code($SalesmanName),
                                        'Planned' => $Planned,
                                        'Visited' => $Visited,
                                        'Un_planed' => $Unplaned,
                                        'Start_Time' => $StartTime,
                                        'End_Time' => $EndTime,
                                        // 'Time_in_Market' => $TimeinMarket,
                                        'Spent' =>$Spent,
                                        'Time_Per_Outlet' => $TimePerOutlet,
                                        'Nosale' => $Nosale,
                                        'Productive' => $Productive,
                                        'Geo_mismatch' => $Geomismatch,
                                        'Line' => $Line,
                                        'Total_Qty' => $TotalQty,
                                        'Total_Sale' => $TotalSale
                                    );
                                }
                            }

                            $this->M_efos->insertimport($data);
                            redirect('C_dasbord/importexcel');
                        } else {
                            $data = array(
                                'statuspesan' => 'gagal',
                                'isipesan' => 'Maximal file size 25k'
                            );

                            $this->load->view('V_import', $data);
                        }
                                                
                    }
                    
                }

                // $TimeinMarket = json_decode(json_encode(PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(8, $row)->getOldCalculatedValue())), true)['date'];
                
        }               
    
    }
    
}

            // if (empty($RouteName) && empty($SalesmanName) && empty($Planned) && empty($Visited) && empty($Unplaned) && empty($StartTime) && empty($EndTime) && empty($TimeinMarket) && empty($Spent) && empty($TimePerOutlet) && empty($Nosale) && empty($Productive) && empty($Geomismatch) && empty($Line) && empty($TotalQty) && empty($TotalSale)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Exel yang anda input kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($RouteName)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Route name kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($SalesmanName)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Salesman name kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Planned)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Planned kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Visited)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Visited kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Unplaned)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Un-planed kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($StartTime)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Start Time kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($EndTime)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'End Time kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($TimeinMarket)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Time in Market kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Spent)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Spent kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($TimePerOutlet)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Time per Outlet kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Nosale)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Nosale kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Productive)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Productive kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Geomismatch)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Geomismatch kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($Line)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Line kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($TotalQty)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Total Qty kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } elseif (empty($TotalSale)) {
            //     $data = array(
            //         'statuspesan' => 'gagal',
            //         'isipesan' => 'Total Sale kosong'
            //     );
            //     $this->load->view('V_import', $data);
            // } else {
                // $this->M_efos->insertimport($data);
                // redirect('C_dasbord/importexcel');
            // }
?>