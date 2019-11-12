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
 		$tanggal = date('l, d-m-Y');
 		$query = $this->db->query("INSERT INTO upload(date_upload, name_upload) VALUES (now(),'$nama')");
 	}

 	public function data($number,$offset) {
 		$this->db->select('*');
                $this->db->from('m_efos a');
                $this->db->join('upload b', 'a.File_Name=b.id_upload', 'left');
                $this->db->join('m_conces c ', 'a.id_conces=c.id_conces', 'left');
                $this->db->join('m_ruote d ', 'a.District_Code=d.District_Code', 'left');
                $this->db->join('m_selesman e ', 'a.Emp_Code=e.Emp_Code', 'left');
                $this->db->limit($number);
                $this->db->offset($offset);
                $this->db->order_by("File_Name", "asc");
                return $query=$this->db->get()->result_array();
 		// return $query = $this->db->get('m_efos',$number,$offset)->result_array();
 	}

 	// Delete efos

 	public function dataupload($number,$offset) {
 		$this->db->select('*');
 		$this->db->from('upload');
 		$this->db->limit($number);
                $this->db->offset($offset);
                $this->db->group_by("name_upload");
                $this->db->order_by("name_upload", "asc");
                return $query=$this->db->get()->result_array();
 		// return $query = $this->db->get('upload',$number,$offset)->result_array();
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