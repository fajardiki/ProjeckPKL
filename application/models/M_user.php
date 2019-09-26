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
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, DAYNAME(Journey_Date) AS Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$emp_code' AND WEEK(Journey_Date) = WEEK(CURDATE())");
		return $hsl->result_array();
	}

	public function selectonetime($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, DAYNAME(Journey_Date) as Day, TIME_TO_SEC(Time_in_Market) as TimeInMarket, TIME_TO_SEC(Spent) as Spent, TIME_TO_SEC(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date) = WEEK(CURDATE())");

		return $hsl->result_array();
	}

	public function selectonepjp($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, DAYNAME(Journey_Date) as Day, (((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, (((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, (((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date) = WEEK(CURDATE())");

		return $hsl->result_array();
	}
}

?>