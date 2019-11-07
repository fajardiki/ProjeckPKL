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

 	public function idupload($FileName) {
 		$hsl = $this->db->query("SELECT id_upload FROM upload WHERE name_upload = '$FileName'");
 		$h = $hsl->row_array();
 		return $h['id_upload'];
 	}

 	public function selectefos($nama) {
 		$periksa = $this->db->query("SELECT * FROM upload WHERE name_upload = '$nama'");

 		if ($periksa->num_rows()>0) {
			return 1;
		} else {
			return 0;
		}
 	}

 	public function insertname($nama) {
 		$query = $this->db->query("INSERT INTO upload VALUES ('',now(),'$nama')");
 	}

 	public function dataefos() {
 		$hsl = $this->db->query("SELECT * FROM m_efos a LEFT JOIN m_selesman b ON a.Emp_Code = b.Emp_Code LEFT JOIN m_ruote c ON a.District_Code = c.District_Code");
		return $hsl->num_rows();
 	}

 	public function data($number,$offset) {
 		return $query = $this->db->get('m_efos',$number,$offset)->result_array();
 	}

 	// Delete efos
 	public function datauploadcount() {
 		$hsl = $this->db->query("SELECT * FROM upload");
		return $hsl->num_rows();
 	}

 	public function dataupload($number,$offset) {
 		return $query = $this->db->get('upload',$number,$offset)->result_array();
 	}

 	public function deleteefos($idfile) {
 		$this->db->query("DELETE FROM m_efos WHERE File_Name = '$idfile'");
 	}

 	public function deleteupload($idfile) {
 		$this->db->query("DELETE FROM upload WHERE id_upload = '$idfile'");
 	}

 	// Akhir
 } 

 ?>