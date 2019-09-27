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
        $this->load->view('V_import');
    }

    public function saveimport() {
    if(isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);

             foreach($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++) {   
                    $JourneyDate = $worksheet->getCellByColumnAndRow(0, $row)->getFormattedValue();
                    $DistrikCode = $worksheet->getCellByColumnAndRow(1, $row)->getOldCalculatedValue();
     				$RouteName = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    				$EmpCode = $worksheet->getCellByColumnAndRow(3, $row)->getOldCalculatedValue();
    				$SalesmanName = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
    				$Planned = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
    				$Visited = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
    				$Unplaned = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
    				$StartTime = $worksheet->getCellByColumnAndRow(8, $row)->getFormattedValue();
    				$EndTime = $worksheet->getCellByColumnAndRow(9, $row)->getFormattedValue();
    				$TimeinMarket = json_decode(json_encode(PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(10, $row)->getOldCalculatedValue())), true)['date'];
    				$Spent = $worksheet->getCellByColumnAndRow(11, $row)->getFormattedValue();
    				$TimePerOutlet = json_decode(json_encode(PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(12, $row)->getOldCalculatedValue())), true)['date'];
    				$Nosale = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
    				$Productive = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
    				$Geomismatch = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
    				$Line = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
    				$TotalQty = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
    				$TotalSale = $worksheet->getCellByColumnAndRow(18, $row)->getValue();

    				$timemarket = [$TimeinMarket[11],$TimeinMarket[12],$TimeinMarket[13],$TimeinMarket[14],$TimeinMarket[15],$TimeinMarket[16],$TimeinMarket[17],$TimeinMarket[18]];
    				$timeoutlet = [$TimePerOutlet[11],$TimePerOutlet[12],$TimePerOutlet[13],$TimePerOutlet[14],$TimePerOutlet[15],$TimePerOutlet[16],$TimePerOutlet[17],$TimePerOutlet[18]];

                    $data[] = array(
                    	'Date_Update' => date('Y-m-d'),
                        'Journey_Date' => $JourneyDate,
    				    'Distrik_Code' => $DistrikCode,	
    				    'Emp_Code' => $EmpCode,
    				    'Planned' => $Planned,
    				    'Visited' => $Visited,
    				    'Un_planed' => $Unplaned,
    				    'Start_Time' => $StartTime,
    				    'End_Time' => $EndTime,
    				    'Time_in_Market' => implode("", $timemarket),
    				    'Spent' =>$Spent,
    				    'Time_Per_Outlet' => implode("", $timeoutlet),
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
            
        }                
    
    }
    
}