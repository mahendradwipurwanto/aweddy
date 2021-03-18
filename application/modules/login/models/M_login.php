<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function get_paket($kode_paket){
		$query = $this->db->query("SELECT * FROM TB_PAKET WHERE KODE_PAKET = '$kode_paket'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_paket_d($kode_paket){
		$query = $this->db->query("SELECT * FROM TB_PAKET_D WHERE KODE_PAKET = '$kode_paket' ORDER BY POST ASC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function paket_user($kode_user){
		$query = $this->db->query("SELECT * FROM TB_QUEUE a LEFT JOIN TB_PAKET b ON a.KODE_PAKET = b.KODE_PAKET WHERE a.KODE_USER = '$kode_user'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_theme($kode_paket){
		$query = $this->db->query("SELECT * FROM TB_TEMA WHERE KODE_PAKET = '$kode_paket'");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_auth($email){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE EMAIL = '$email'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function cek_kode($kode_user){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE KODE_USER = '$kode_user'");
		return $query->num_rows();
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

	public function val_queue($kode_queue){
		$query = $this->db->query("SELECT * FROM TB_QUEUE WHERE KODE_QUEUE = '$kode_queue'");
		return $query->num_rows();
	}

	public function aktivasi_kode($kode_aktivasi){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE KODE_AKTIVASI = '$kode_aktivasi'");
		return $query->num_rows();
	}


	//PUSH TO DB

	public function del_user($kode_user){
		$this->db->where('KODE_USER', $kode_user);
		$this->db->delete('TB_AUTH');
	}

	public function register(){

		do {
			$kode_user 			= "USR_".substr(md5(time()), 0, 6);
		} while ($this->cek_kode($kode_user) > 0);

		do {
			$kode_aktivasi	= random_string('numeric', 6);
		} while ($this->cek_aktivasi($kode_aktivasi) > 0);

		$NAMA 				= htmlspecialchars($this->input->post('nama'), true);
		$EMAIL				= htmlspecialchars($this->input->post('email'), true);
		$PASSWORD			= htmlspecialchars($this->input->post('password'), true);
		$HP						= htmlspecialchars($this->input->post('hp'), true);
		$KODE_PAKET		= htmlspecialchars($this->input->post('kode_paket'), true);

		$auth = array(
			'KODE_USER' 			=> $kode_user,
			'KODE_AKTIVASI' 	=> $kode_aktivasi,
			'STATUS_AKTIVASI' => 0,
			'NAMA' 						=> $NAMA,
			'EMAIL' 					=> $EMAIL,
			'HP' 							=> "62".$HP,
			'PASSWORD'		 		=> password_hash($PASSWORD, PASSWORD_DEFAULT),
			'ROLE'						=> 1
		);

		$this->db->insert('TB_AUTH', $auth);

		if ($this->db->affected_rows() == true) {

			do {
				$kode_queue 			= "QUE_".substr(md5(time()), 0, 6);
			} while ($this->val_queue($kode_queue) > 0);

			$auth = array(
				'KODE_QUEUE' 			=> $kode_queue,
				'KODE_USER'  			=> $kode_user,
				'KODE_PAKET' 			=> $KODE_PAKET,
				'STATUS_QUEUE'		=> 0
			);

			$this->db->insert('TB_QUEUE', $auth);
			return ($this->db->affected_rows() != 1) ? false : true;

		}else {
			$this->del_user($kode_user);
			return false;
		}

	}

	public function aktivasi_akun($kode_user){
		$data = array('STATUS_AKTIVASI' => 1);

		$this->db->where('KODE_USER', $kode_user);
		$this->db->update('TB_AUTH', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
