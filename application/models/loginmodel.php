<?php 

	class Loginmodel extends CI_model{

		public function valid_login($username, $password){

			//$password = md5($password);

			$q = $this->db->where(['username'=>$username,'password'=>$password])->get('users');

			if( $q->num_rows() )
				return $q->row()->id;
			else
				return FALSE;
		}
	}

?>