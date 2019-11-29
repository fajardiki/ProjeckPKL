<?php 
class M_diagram extends CI_Model {
	// Informasi Sales
	public function infosales($empcode,$jd) {
		$hsl = $this->db->query("SELECT Journey_Date, a.Emp_Code as Emp_Code, Salesman, YEAR(Journey_Date) AS Year, MONTH(Journey_Date) AS Month, DAYNAME(Journey_Date) AS Day, SUM(Planned) AS Planned, SUM(Un_planed) AS Un_planed, SUM(Visited) AS Visited, TIME_FORMAT(SEC_TO_TIME(avg(hour(Start_Time) * 3600 + (minute(Start_Time) * 60) + second(Start_Time))),'%H:%i:%s') as Start_Time, TIME_FORMAT(SEC_TO_TIME(avg(hour(End_Time) * 3600 + (minute(End_Time) * 60) + second(End_Time))),'%H:%i:%s') as End_Time, SUM(Nosale) as Nosale, AVG(((Visited-Un_planed)/Planned)*100) as pjp_comply, AVG((Nosale/Visited)*100) as NosalePersen, AVG(((Productive)/(Planned+Un_planed))*100) AS Productive_Call, SUM(Total_Sale) as Total_Sale FROM m_efos a LEFT JOIN m_selesman b ON a.Emp_Code = b.Emp_Code WHERE a.Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = WEEK('$jd',1) GROUP BY DAY(Journey_Date)");
 		return $hsl->result_array();
	}

	public function infosalesplush($empcode,$jd) {
		$hsl = $this->db->query("SELECT MONTHNAME(Journey_Date) as Month, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, Salesman, District, AVG(Nosale) as Nosale, AVG(Visited) as Visited, AVG((Planned) - (Visited-Un_planed)) as Unvisited, AVG(Productive) as Productive, AVG(Planned) as Planned FROM m_efos a LEFT JOIN m_selesman b ON a.Emp_Code = b.Emp_Code LEFT JOIN m_ruote c ON a.District_Code = c.District_Code WHERE a.Emp_Code = '$empcode' AND MONTH(Journey_Date) = MONTH('$jd') GROUP BY DAYNAME(Journey_Date) ORDER BY DAYOFWEEK(Journey_Date)");
 		return $hsl->result_array();
	}
}
?>