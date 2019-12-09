<?php 
/**
* 
*/
class M_user extends CI_Model {
	
	public function login_seles($username, $password) {
		$periksa = $this->db->query("SELECT * FROM m_selesman a LEFT JOIN status b ON a.status = b.id_status WHERE username='$username' AND password='$password'");
		return $periksa->result_array();
	}

	public function login_user($username, $password) {
		$periksa = $this->db->query("SELECT * FROM user a LEFT JOIN status b ON a.status = b.id_status WHERE username='$username' AND password='$password'");
		return $periksa->result_array();

	}

	// Select user
	public function selectoneuser($username, $password) {
			$hsl = $this->db->query("SELECT * FROM user a LEFT JOIN status b ON a.status = b.id_status WHERE username='$username' AND password='$password'");
			return $hsl->result_array();
		}

	// Beranda
	public function selectoneseles($username, $password) {
		$hsl = $this->db->query("SELECT * FROM m_selesman a LEFT JOIN status b ON a.status = b.id_status WHERE username='$username' AND password='$password'");
		return $hsl->result_array();
	}

	// BBB


	// plane
		// dasbord
		public function selectonefost($emp_code) {
			$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) AS Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$emp_code' AND WEEK(Journey_Date,1) = (SELECT WEEK(max(Journey_Date),1) FROM m_efos)-1 AND year(Journey_Date) = year(CURDATE())");
			return $hsl->result_array();
		}

		public function selectonefostweek($empcode,$th,$wk) {
			$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) AS Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = '$wk'-1 AND year(Journey_Date) = '$th'");
	 			return $hsl->result_array();
		}

		public function selectonefostnow($emp_code) {
			$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) AS Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$emp_code' AND WEEK(Journey_Date,1) = (SELECT WEEK(max(Journey_Date),1) FROM m_efos) AND year(Journey_Date) = year(CURDATE())");
			return $hsl->result_array();
		}

		public function selectonefostnowweek($empcode,$th,$wk) {
			$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) AS Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, Planned, Productive, Nosale FROM m_efos WHERE Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = '$wk' AND year(Journey_Date) = '$th'");
			return $hsl->result_array();
		}


		// 

	public function selectplanesales($empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE Emp_Code = '$empcode' AND year(Journey_Date) = year(CURDATE()) GROUP BY WEEK(Journey_Date,1) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectoneplanesales($bln, $thn, $empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date,1) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// plane

	// time

		// Dassboar
			public function selectonetime($emp_code) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, TIME_TO_SEC(End_Time)-TIME_TO_SEC(Start_Time) as TimeInMarket, TIME_TO_SEC(Spent) as Spent, TIME_TO_SEC(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date,1) = (SELECT WEEK(max(Journey_Date),1) FROM m_efos)-1 AND year(Journey_Date) = year(CURDATE())");

				return $hsl->result_array();
			}

			public function selectonetimeweek($empcode,$th,$wk) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, TIME_TO_SEC(End_Time)-TIME_TO_SEC(Start_Time) as TimeInMarket, TIME_TO_SEC(Spent) as Spent, TIME_TO_SEC(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = '$wk'-1 AND year(Journey_Date) = '$th'");

				return $hsl->result_array();
			}

			public function selectonetimenow($emp_code) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, TIME_TO_SEC(End_Time)-TIME_TO_SEC(Start_Time) as TimeInMarket, TIME_TO_SEC(Spent) as Spent, TIME_TO_SEC(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date,1) = (SELECT WEEK(max(Journey_Date),1) FROM m_efos) AND year(Journey_Date) = year(CURDATE())");

				return $hsl->result_array();
			}

			public function selectonetimenowweek($empcode,$th,$wk) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, TIME_TO_SEC(End_Time)-TIME_TO_SEC(Start_Time) as TimeInMarket, TIME_TO_SEC(Spent) as Spent, TIME_TO_SEC(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = '$wk' AND year(Journey_Date) = '$th'");

				return $hsl->result_array();
			}
		// 

	public function selecttimesales($empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) AS Week, avg(TIME_TO_SEC(End_Time)-TIME_TO_SEC(Start_Time)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE Emp_Code = '$empcode' AND year(Journey_Date) = year(CURDATE()) GROUP BY WEEK(Journey_Date,1) DESC LIMIT 5");

 			return $hsl->result_array();
	}

	public function selectonetimesales($bln, $thn, $empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) AS Week, avg(TIME_TO_SEC(End_Time)-TIME_TO_SEC(Start_Time)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date,1) DESC LIMIT 4");

 			return $hsl->result_array();
	}

	// time

	// pjp

		// Dasbord
			public function selectonepjp($emp_code) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, (((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, (((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, (((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date,1) = (SELECT WEEK(max(Journey_Date),1) FROM m_efos)-1 AND year(Journey_Date) = year(CURDATE())");

				return $hsl->result_array();
			}

			public function selectonepjpweek($empcode,$th,$wk) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, (((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, (((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, (((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = '$wk'-1 AND year(Journey_Date) = '$th'");

				return $hsl->result_array();
			}

			public function selectonepjpnow($emp_code) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, (((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, (((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, (((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = $emp_code AND WEEK(Journey_Date,1) = (SELECT WEEK(max(Journey_Date),1) FROM m_efos) AND year(Journey_Date) = year(CURDATE())");

				return $hsl->result_array();
			}

			public function selectonepjpnowweek($empcode,$th,$wk) {
				$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, CASE DAYOFWEEK(Journey_Date)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
          END as Day, (((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, (((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, (((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = '$wk' AND year(Journey_Date) = '$th'");

				return $hsl->result_array();
			}
		// 

	public function selectpjpsales($empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE Emp_Code = '$empcode' AND year(Journey_Date) = year(CURDATE()) GROUP BY WEEK(Journey_Date,1) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selectonepjpsales($bln, $thn, $empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date,1) DESC LIMIT 4");
 			return $hsl->result_array();
	}

	// pjp
	
	// Efoss

	public function selectefosall($empcode) {
		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, YEAR(Journey_Date) as Year, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(End_Time-Start_Time) * 3600 + (minute(End_Time-Start_Time) * 60) + second(End_Time-Start_Time))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale, SUM(Planned) As pjp_planned, SUM(Un_planed) As pjp_unplaned, SUM(Productive) AS pjp_productive FROM m_efos WHERE Emp_Code = '$empcode' AND year(Journey_Date) = year(CURDATE()) GROUP BY WEEK(Journey_Date,1) DESC LIMIT 5");
 			return $hsl->result_array();
	}

	public function selecteonefossales($bln, $thn, $empcode) {
 		$hsl = $this->db->query("SELECT  WEEK(Journey_Date,1) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(End_Time-Start_Time) * 3600 + (minute(End_Time-Start_Time) * 60) + second(End_Time-Start_Time))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale, SUM(Planned) As pjp_planned, SUM(Un_planed) As pjp_unplaned, SUM(Productive) AS pjp_productive FROM m_efos WHERE MONTH(Journey_Date)='$bln' AND year(Journey_Date)='$thn' AND Emp_Code = '$empcode' GROUP BY WEEK(Journey_Date,1) DESC LIMIT 4");
 			return $hsl->result_array();
 	}

 	// Efos

 	// Summary
 	public function selectsummary($empcode)	{
 		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, YEAR(Journey_Date) as Year, Journey_Date as Day, Planned, Un_planed, Visited, TIME_FORMAT(SEC_TO_TIME(avg(hour(Start_Time) * 3600 + (minute(Start_Time) * 60) + second(Start_Time))),'%H:%i:%s') as Start_Time, TIME_FORMAT(SEC_TO_TIME(avg(hour(End_Time) * 3600 + (minute(End_Time) * 60) + second(End_Time))),'%H:%i:%s') as End_Time, SUM(Nosale) as Nosale, AVG(((Visited-Un_planed)/Planned)*100) as pjp_comply, AVG((Nosale/Visited)*100) as NosalePersen, AVG(((Productive)/(Planned+Un_planed))*100) AS Productive_Call, SUM(Total_Sale) as Total_Sale FROM m_efos WHERE Emp_Code='$empcode' AND WEEK(Journey_Date,1)=(SELECT WEEK(max(Journey_Date),1) FROM m_efos) AND year(Journey_Date) = year(CURDATE()) GROUP BY DAY(Journey_Date) ORDER BY Journey_Date");
 		return $hsl->result_array();
 	}

 	public function selectsummaryweek($empcode,$th,$wk)	{
 		$hsl = $this->db->query("SELECT WEEK(Journey_Date,1) as Week, YEAR(Journey_Date) as Year, Journey_Date as Day, Planned, Un_planed, Visited, TIME_FORMAT(SEC_TO_TIME(avg(hour(Start_Time) * 3600 + (minute(Start_Time) * 60) + second(Start_Time))),'%H:%i:%s') as Start_Time, TIME_FORMAT(SEC_TO_TIME(avg(hour(End_Time) * 3600 + (minute(End_Time) * 60) + second(End_Time))),'%H:%i:%s') as End_Time, SUM(Nosale) as Nosale, AVG(((Visited-Un_planed)/Planned)*100) as pjp_comply, AVG((Nosale/Visited)*100) as NosalePersen, AVG(((Productive)/(Planned+Un_planed))*100) AS Productive_Call, SUM(Total_Sale) as Total_Sale FROM m_efos WHERE Emp_Code = '$empcode' AND WEEK(Journey_Date,1) = '$wk' AND year(Journey_Date) = '$th' GROUP BY DAY(Journey_Date) ORDER BY Journey_Date");
 		return $hsl->result_array();
 	}
 	// Summary

 	// Ranked salesman

 	public function ranked($conces) {
 		$hsl = $this->db->query("SELECT MONTHNAME(Journey_Date) AS Month, Salesman, AVG(((Visited-Un_planed)/Planned)*100) as pjp_comply, AVG((Nosale/Visited)*100) as NosalePersen, AVG(((Productive)/(Planned+Un_planed))*100) AS Productive_Call FROM m_efos a RIGHT JOIN m_selesman b ON a.Emp_Code = b.Emp_Code WHERE b.id_conces = $conces AND MONTH(Journey_Date) = (SELECT MONTH(MAX(Journey_Date)) FROM m_efos) GROUP BY salesman ORDER BY Productive_Call DESC");
 		return $hsl->result_array();
 	}

 	public function rankedbln($conces,$bln) {
 		$hsl = $this->db->query("SELECT MONTHNAME(Journey_Date) AS Month, Salesman, AVG(((Visited-Un_planed)/Planned)*100) as pjp_comply, AVG((Nosale/Visited)*100) as NosalePersen, AVG(((Productive)/(Planned+Un_planed))*100) AS Productive_Call FROM m_efos a RIGHT JOIN m_selesman b ON a.Emp_Code = b.Emp_Code WHERE b.id_conces = $conces AND MONTH(Journey_Date) = $bln GROUP BY salesman ORDER BY Productive_Call DESC");
 		return $hsl->result_array();
 	}

 	public function salesmaxjd($empcode) {
 		return $this->db->query("SELECT MAX(Journey_Date) AS jd FROM m_efos WHERE Emp_Code='$empcode'")->result_array();
 	}

}

?>