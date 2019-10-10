<?php 
/**
 * 
 */
class M_bantul extends CI_Model {

	// plane

	public function selectplanebantul() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectoneplanebantul($bln, $thn) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// plane

	// time

	public function selecttimebantul() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");

 			return $hsl->result_array();
	}

	public function selectonetimebantul($bln, $thn) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");

 			return $hsl->result_array();
	}

	// time

	// pjp

	public function selectpjpbantul() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectonepjpbantul($bln, $thn) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// pjp
	
	// Efoss

	public function selectefosbantul() {
		$hsl = $this->db->query("SELECT  WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos WHERE id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selecteonefosbantul($bln, $thn) {
 		$hsl = $this->db->query("SELECT  WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND id_conces = 3 GROUP BY WEEK(Journey_Date) DESC LIMIT 4");
 			return $hsl->result_array();
 	}

 	// Efoss

 	//  Update sales
 	public function selectupdateseles() {
 		$hsl = $this->db->query("SELECT Emp_Code, Salesman, Status, Username, Password FROM m_selesman");
 			return $hsl->result_array();
 	}

 	public function selectsales($id) {
 		$hsl = $this->db->query("SELECT Emp_Code, Salesman, Status, Username, Password, id_conces FROM m_selesman WHERE Emp_Code = '$id'");
 		return $hsl->result_array();
 	}
 	// Update sales

 	// Hapus sales

 	public function hapussales($id) {
		$query = $this->db->query("DELETE FROM m_selesman WHERE Emp_Code='$id'");
			return $query;
	}

	// Hapus sales

	// Save sales

	public function savesales($Emp_Code, $Salesman, $Status, $Username, $Password) {
		$query = $this->db->query("INSERT INTO m_selesman VALUES ('$Emp_Code', '$Salesman', '$Status', '$Username', '$Password')");
			return $query;
	}

	// Save sales
}
?>