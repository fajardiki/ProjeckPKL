<?php 
	/**
	* 
	*/
	class M_admin extends CI_Model {
		
		public function login_admin($username, $password) {
		$periksa = $this->db->get_where('m_admin',array('username_admin'=>$username, 'password_admin'=>$password));

			if ($periksa->num_rows()>0) {
		 		return 1;
		 	} else {
		 		return 0;
		 	}
		}

		public function selectoneadmin($username, $password) {
			$hsl = $this->db->query("SELECT * FROM m_admin WHERE username_admin='$username' AND password_admin='$password'");
			return $hsl->result_array();
		}

		// Efos
		public function getefos($date) {
			$hsl = $this->db->query("SELECT * FROM m_efos a LEFT JOIN m_selesman b ON a.Emp_Code = b.Emp_Code LEFT JOIN m_ruote c ON a.District_Code = c.District_Code WHERE Date_Update='$date' GROUP BY Journey_Date DESC LIMIT 5");
			return $hsl->result_array();
		}

		public function selectefos() {
 			$hsl = $this->db->query("SELECT  WEEK(Journey_Date,1) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_in_Market) * 3600 + (minute(Time_in_Market) * 60) + second(Time_in_Market))),'%H:%i:%s') as TimeInMarket, TIME_FORMAT(SEC_TO_TIME(avg(hour(Spent) * 3600 + (minute(Spent) * 60) + second(Spent))),'%H:%i:%s') as Spent, TIME_FORMAT(SEC_TO_TIME(avg(hour(Time_Per_Outlet) * 3600 + (minute(Time_Per_Outlet) * 60) + second(Time_Per_Outlet))),'%H:%i:%s') as TimePerOutlet, SUM(Nosale) as Nosale, AVG((Nosale/Visited)*100) AS NosalePersen, (SUM(Total_Sale)/POW(10,3)) as TotalSale FROM m_efos GROUP BY WEEK(Journey_Date,1);");
 			return $hsl->result_array();
 		}
		// Efos


		// Plane
		public function selectallplane() {
 			$hsl = $this->db->query("SELECT nama_conces as Conces, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE year(CURDATE()) GROUP BY a.id_conces");
 			return $hsl->result_array();
 		}

 		public function selectallplaneconcesth($bln, $th) {
 			$hsl = $this->db->query("SELECT nama_conces as Conces, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE month(Journey_Date) = $bln AND year(Journey_Date)=$th GROUP BY a.id_conces");
 			return $hsl->result_array();
 		}
 		// Plane

 		// Time
 		public function selectalltime() {
 			$hsl = $this->db->query("SELECT nama_conces as Conces, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE year(CURDATE()) GROUP BY a.id_conces");

 			return $hsl->result_array();
 		}

 		public function selectalltimeconcesth($bln, $th) {
 			$hsl = $this->db->query("SELECT nama_conces as Conces, avg(TIME_TO_SEC(Time_in_Market)) as TimeInMarket, avg(TIME_TO_SEC(Spent)) as Spent, avg(TIME_TO_SEC(Time_Per_Outlet)) as TimePerOutlet FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE month(Journey_Date) = $bln AND year(Journey_Date)=$th GROUP BY a.id_conces");

 			return $hsl->result_array();
 		}
 		// Time

 		// Pjp
 		public function selectallpjp() {
 			$hoursl = $this->db->query("SELECT nama_conces as Conces, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE year(CURDATE()) GROUP BY a.id_conces;");
 			return $hoursl->result_array();
 		}

 		public function selectallpjpconcesth($bln, $th) {
 			$hoursl = $this->db->query("SELECT nama_conces as Conces, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE month(Journey_Date) = $bln AND year(Journey_Date)=$th GROUP BY a.id_conces;");
 			return $hoursl->result_array();
 		}
 		// Pjp

 		// Summary
 		public function selectsummaryconces() {
 			$hsl = $this->db->query("SELECT YEAR(Journey_Date) AS Year,nama_conces as Conces, SUM(Planned) AS Planned, SUM(Un_planed) AS Un_planed, SUM(Visited) AS Visited, TIME_FORMAT(SEC_TO_TIME(avg(hour(Start_Time) * 3600 + (minute(Start_Time) * 60) + second(Start_Time))),'%H:%i:%s') as Start_Time, TIME_FORMAT(SEC_TO_TIME(avg(hour(End_Time) * 3600 + (minute(End_Time) * 60) + second(End_Time))),'%H:%i:%s') as End_Time, SUM(Nosale) as Nosale, AVG(((Visited-Un_planed)/Planned)*100) as pjp_comply, AVG((Nosale/Visited)*100) as NosalePersen, AVG(((Productive)/(Planned+Un_planed))*100) AS Productive_Call, SUM(Total_Sale) as Total_Sale FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE year(Journey_Date)=year(CURDATE()) GROUP BY a.id_conces;");
 			return $hsl->result_array();
 		}

 		public function selectsummaryconcesth($bln,$th) {
 			$hsl = $this->db->query("SELECT MonthName(Journey_Date) AS Month, YEAR(Journey_Date) AS Year,nama_conces as Conces, SUM(Planned) AS Planned, SUM(Un_planed) AS Un_planed, SUM(Visited) AS Visited, TIME_FORMAT(SEC_TO_TIME(avg(hour(Start_Time) * 3600 + (minute(Start_Time) * 60) + second(Start_Time))),'%H:%i:%s') as Start_Time, TIME_FORMAT(SEC_TO_TIME(avg(hour(End_Time) * 3600 + (minute(End_Time) * 60) + second(End_Time))),'%H:%i:%s') as End_Time, SUM(Nosale) as Nosale, AVG(((Visited-Un_planed)/Planned)*100) as pjp_comply, AVG((Nosale/Visited)*100) as NosalePersen, AVG(((Productive)/(Planned+Un_planed))*100) AS Productive_Call, SUM(Total_Sale) as Total_Sale FROM m_efos a INNER JOIN m_conces b ON a.id_conces = b.id_conces WHERE month(Journey_Date) = $bln AND year(Journey_Date)=$th GROUP BY a.id_conces;");
 			return $hsl->result_array();
 		}
 		// Summary
 		
 		// Sales
 		public function selectupdateseles() {
 			$hsl = $this->db->query("SELECT Emp_Code, Salesman, Status, Username, Password FROM m_selesman");
 			return $hsl->result_array();
 		}

 		public function hapussales($id) {
			$query = $this->db->query("DELETE FROM m_selesman WHERE Emp_Code='$id'");
			return $query;
		}

		public function editsales($id) {
			$query = $this->db->query("UPDATE FROM m_selesman WHERE Emp_Code='$id'");
			return $query;

		}

		public function savesales($Emp_Code, $Salesman, $Status, $Username, $Password) {
			$query = $this->db->query("INSERT INTO m_selesman VALUES ('$Emp_Code', '$Salesman', '$Status', '$Username', '$Password')");
			return $query;
		}

		// Sales
	}
?>