<?php 
/**
 * 
 */
 class M_efos extends CI_Model {
 	
 	public function insertimport($data) {
 		$this->db->insert_batch('m_efos',$data);
 		return $this->db->insert_id();
 	}
 } 

 ?>