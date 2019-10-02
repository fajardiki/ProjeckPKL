<?php 
/**
 * 
 */
class M_jogja extends CI_Model {
	public function selectplanejogja() {
		$hsl = $this->db->query('SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos GROUP BY WEEK(Journey_Date)');
 			return $hsl->result_array();
	}

	public function selecttimejogja() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) AS Week, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos GROUP BY WEEK(Journey_Date)");

 			return $hsl->result_array();
	}

	public function selectpjpjogja() {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos GROUP BY WEEK(Journey_Date);");
 			return $hsl->result_array();
	}

	public function selectefosjogja() {
 		$hsl = $this->db->query("SELECT  WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos GROUP BY WEEK(Journey_Date);");
 			return $hsl->result_array();
 	}

 	public function selectupdateseles() {
 		$hsl = $this->db->query("SELECT Emp_Code, Salesman, Status, Username, Password FROM m_selesman");
 			return $hsl->result_array();
 	}

 	public function hapussales($id) {
		$query = $this->db->query("DELETE FROM m_selesman WHERE Emp_Code='$id'");
			return $query;
	}

	public function savesales($Emp_Code, $Salesman, $Status, $Username, $Password) {
		$query = $this->db->query("INSERT INTO m_selesman VALUES ('$Emp_Code', '$Salesman', '$Status', '$Username', '$Password')");
	}
}
?>