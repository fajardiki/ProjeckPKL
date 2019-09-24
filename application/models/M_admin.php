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
			$hsl = $this->db->query("SELECT * FROM m_efos WHERE Date_Update='$date'");
			return $hsl->result_array();
		}

		public function selectallfost() {
 			$hsl = $this->db->query('SELECT WEEK(Journey_Date) as Week, SUM(Planned) as Planned, SUM(Productive) as Productive, SUM(Nosale) as Nosale FROM m_efos GROUP BY WEEK(Journey_Date)');
 			return $hsl->result_array();
 		}
	}
?>