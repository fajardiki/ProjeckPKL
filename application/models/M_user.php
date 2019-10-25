<?php 
/**
* 
*/
class M_user extends CI_Model {
	
	public function login_seles($username, $password) {
		$periksa = $this->db->get_where('m_selesman',array('username'=>$username, 'password'=>$password));
		return $periksa->result_array();
	}

	public function login_user($username, $password) {
		$periksa = $this->db->get_where('user',array('username'=>$username, 'password'=>$password));
		return $periksa->result_array();

	}

	// Select user
	public function selectoneuser($username, $password) {
			$hsl = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
			return $hsl->result_array();
		}

	// Beranda
	public function selectoneseles($username, $password) {
		$hsl = $this->db->query("SELECT * FROM m_selesman WHERE username='$username' AND password='$password'");
		return $hsl->result_array();
	}

	public function selectonefost($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, DAYNAME(Journey_Date) AS Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$emp_code' AND WEEK(Journey_Date) = WEEK(CURDATE())-1");
		return $hsl->result_array();
	}

	public function selectonefostnow($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, DAYNAME(Journey_Date) AS Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$emp_code' AND WEEK(Journey_Date) = WEEK(CURDATE())");
		return $hsl->result_array();
	}

	public function selectonetime($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, DAYNAME(Journey_Date) as Day, TIME_TO_SEC(Time_in_Market) as TimeInMarket, TIME_TO_SEC(Spent) as Spent, TIME_TO_SEC(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date) = WEEK(CURDATE())-1");

		return $hsl->result_array();
	}

	public function selectonetimenow($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, DAYNAME(Journey_Date) as Day, TIME_TO_SEC(Time_in_Market) as TimeInMarket, TIME_TO_SEC(Spent) as Spent, TIME_TO_SEC(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date) = WEEK(CURDATE())");

		return $hsl->result_array();
	}

	public function selectonepjp($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, DAYNAME(Journey_Date) as Day, (((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, (((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, (((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date) = WEEK(CURDATE())-1");

		return $hsl->result_array();
	}

	public function selectonepjpnow($emp_code) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, DAYNAME(Journey_Date) as Day, (((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, (((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, (((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date) = WEEK(CURDATE())");

		return $hsl->result_array();
	}

	// BBB


	// plane

	public function selectplanesales($empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectoneplanebantul($bln, $thn, $empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// plane

	// time

	public function selecttimesales($empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 5");

 			return $hsl->result_array();
	}

	public function selectonetimesales($bln, $thn, $empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 4");

 			return $hsl->result_array();
	}

	// time

	// pjp

	public function selectpjpsales($empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectonepjpbantul($bln, $thn, $empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// pjp
	
	// Efoss

	public function selectefosall($empcode) {
		$hsl = $this->db->query("SELECT  WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos WHERE Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selecteonefossales($bln, $thn, $empcode) {
 		$hsl = $this->db->query("SELECT  WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
 	}

 	// Efos

}

?>