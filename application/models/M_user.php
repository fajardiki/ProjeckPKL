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

	public function selectonefost($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, DAYNAME(Journey_Date) AS Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$emp_code' AND WEEK(Journey_Date) = 36");
		return $hsl->result_array();
	}
}

?>