<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function cek_aktivasi($kode_user){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE KODE_USER = '$kode_user'");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

	public function cek_queue($kode_queue){
		$query = $this->db->query("SELECT * FROM TB_QUEUE WHERE KODE_QUEUE = '$kode_queue'");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
	}

}
