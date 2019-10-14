<?php 
/**
 * 
 */
class M_jogja extends CI_Model {
	// Planee
	public function selectplanejogja() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectoneplanejogja($bln, $thn) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// Planee

	// time

	public function selecttimejogja() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");

 			return $hsl->result_array();
	}

	public function selectonetimejogja($bln, $thn) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");

 			return $hsl->result_array();
	}

	// time

	// pjp

	public function selectpjpjogja() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectonepjpjogja($bln, $thn) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// pjp

	#EFOS ALL

	public function selectefosjogja() {
 		$hsl = $this->db->query("SELECT  WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos WHERE id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
 	}

 	public function selecteonefosjogja($bln, $thn) {
 		$hsl = $this->db->query("SELECT  WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 1 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
 	}

 	#AKHIR

 	// Update sales

 	public function selectupdateseles() {
 		$hsl = $this->db->query("SELECT Emp_Code, Salesman, Status, Username, Password FROM m_selesman WHERE id_conces = 1");
 			return $hsl->result_array();
 	}

 	public function selectsales($id) {
 		$hsl = $this->db->query("SELECT Emp_Code, Salesman, Status, Username, Password, id_conces FROM m_selesman WHERE Emp_Code = '$id'");
 		return $hsl->result_array();
 	}

 	public function updatesales($empcode,$nama,$status,$username,$password,$conces) {
 		$hsl = $this->db->query("UPDATE m_selesman SET Salesman = '$nama', status = '$status', username = '$username', password ='$password', id_conces = '$conces' WHERE Emp_Code = '$empcode'");
 	}

 	// Hapus salews

 	public function hapussales($id) {
		$query = $this->db->query("DELETE FROM m_selesman WHERE Emp_Code='$id'");
			return $query;
	}

	// Save sales

	public function selectonesales($empcode) {
		$periksa = $this->db->query("SELECT * FROM m_selesman WHERE Emp_Code = '$empcode'");

		if ($periksa->num_rows()>0) {
		 	return 1;
		} else {
		 	return 0;
		}
	}

	public function savesales($empcode,$nama,$status,$username,$password,$conces) {
		$query = $this->db->query("INSERT INTO m_selesman VALUES ('$empcode','$nama','$status','$username','$password','$conces')");
	}

	// District setiing
	public function selectupdatedistrict() {
		$hsl = $this->db->query("SELECT nama_conces as Conces, District_Code, District FROM m_ruote a LEFT JOIN m_conces b ON a.id_conces = b.id_conces WHERE a.id_conces = 1");
 		return $hsl->result_array();
	}

	public function hapusdistrict($discod) {
		$query = $this->db->query("DELETE FROM m_ruote WHERE District_Code='$discod'");
			return $query;
	}

	public function selectonedistrict($discode) {
		$periksa = $this->db->query("SELECT * FROM m_ruote WHERE District_Code = '$discode'");

		if ($periksa->num_rows()>0) {
		 	return 1;
		} else {
		 	return 0;
		}
	}

	public function savedistrict($discode, $district, $conces) {
		$query = $this->db->query("INSERT INTO m_ruote VALUES ('$discode','$district','$conces')");
	}

	public function selectdistrict($discode) {
		$hsl = $this->db->query("SELECT District_Code, District, nama_conces as Conces FROM m_ruote a LEFT JOIN m_conces b ON a.id_conces = b.id_conces WHERE District_Code = '$discode'");
 		return $hsl->result_array();
	}

	public function updatedistrict($discode, $district, $conces) {
		$hsl = $this->db->query("UPDATE m_ruote SET District = '$district', id_conces = '$conces' WHERE District_Code = '$discode'");
	}
}
?>