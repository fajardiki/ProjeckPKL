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

		public function getefos($date) {
			$hsl = $this->db->query("SELECT * FROM m_efos a INNER JOIN m_selesman b ON a.Emp_Code = b.Emp_Code INNER JOIN m_ruote c ON a.District_Code = c.District_Code WHERE Date_Update='$date'");
			return $hsl->result_array();
		}

		public function selectallfost() {
 			$hsl = $this->db->query('SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos WHERE WEEK(Journey_Date) = WEEK(CURDATE()) GROUP BY WEEK(Journey_Date)');
 			return $hsl->result_array();
 		}

 		public function selectalltime() {
 			$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(Time_in_Market) as TimeInMarket, AVG(Spent) as Spent, AVG(Time_Per_Outlet) as TimePerOutlet FROM m_efos WHERE WEEK(Journey_Date) = WEEK(CURDATE()) GROUP BY WEEK(Journey_Date);");

 			return $hsl->result_array();
 		}

 		public function selectallpjp() {
 			$hsl = $this->db->query("SELECT WEEK(Journey_Date) as Week, AVG(((Visited-Un_planed)/Planned)*100) AS PJP_COMPLY, AVG(((Visited-Geo_mismatch)/Visited)*100) AS GEOMATCH, AVG(((Productive)/(Planned+Un_planed))*100) AS PRODUCTIVE_CALL FROM m_efos WHERE WEEK(Journey_Date) = WEEK(CURDATE()) GROUP BY WEEK(Journey_Date);");
 			return $hsl->result_array();
 		}

 		public function selectefos() {
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
			return $query;
		}
	}
?>