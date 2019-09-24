<?php 
/**
* 
*/
class M_user extends CI_Model {
	
	public function login_seles($username, $password) {
		$periksa = $this->db->get_where('m_selesman',array('username'=>$username, 'password'=>$password));

		if ($periksa->num_rows()>0) {
	 		return 1;
	 	} else {
	 		return 0;
	 	}
	}

	public function selectoneseles($username, $password) {
		$hsl = $this->db->query("SELECT * FROM m_selesman WHERE username='$username' AND password='$password'");
		return $hsl->result_array();
	}

	public function selectonefost($seles){
		$sls = str_replace("'","",$seles);

		$hsl = $this->db->query("SELECT * FROM efos_sept WHERE Salesman_Name='$sls'");
		return $hsl->result_array();
	}
}

?>