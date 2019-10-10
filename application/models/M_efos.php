<?php 
/**
 * 
 */
 class M_efos extends CI_Model {
 	
 	public function insertimport($data) {
 		foreach ($data as $data_item) {
		    $insert_query = $this->db->insert_string('m_efos', $data_item);
		    $insert_query = str_replace('/INSERT INTO/', 'INSERT IGNORE INTO', $insert_query);
		    $this->db->query($insert_query);
		}
 	}

 	public function district_code($RouteName) {
 		$hsl = $this->db->query("SELECT District_Code FROM m_ruote WHERE District = '$RouteName'");
 		$h = $hsl->row_array();
 		return $h['District_Code'];
 	}

 	public function emp_code($SalesmanName) {
 		$hsl = $this->db->query("SELECT Emp_Code FROM m_selesman WHERE Salesman = '$SalesmanName'");
 		$h = $hsl->row_array();
 		return $h['Emp_Code'];
 	}
 } 

 ?>