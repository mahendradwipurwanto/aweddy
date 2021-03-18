<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_login']);
		$this->load->library('mailer');
	}

	//TESTING AREA

	public function testwiz(){

		echo $this->input->post('satu');
		echo $this->input->post('dua');
		echo $_FILES['tiga']['name'];
		echo $this->input->post('empat');

	}

	public function test(){
		$data['mail']				= "mahendradwipurwanto@gmail.com";

		$data['module'] 		= "login";
		$data['fileview'] 	= "waiting";
		echo Modules::run('template/Template_daftar', $data);
	}

	public function hash(){
		$pass = "141219";
		echo password_hash($pass, PASSWORD_DEFAULT);

	}

	//CALL VIEW

	public function index(){
		$data['module'] 		= "login";
		$data['fileview'] 	= "login";
		echo Modules::run('template/Template_login', $data);
	}

	public function package(){

		$data['kasih']			= $this->M_login->get_paket("KH9K9");
		$data['d_kasih']		= $this->M_login->get_paket_d("KH9K9");

		$data['sayang']			= $this->M_login->get_paket("SY5K9");
		$data['d_sayang']		= $this->M_login->get_paket_d("SY5K9");

		$data['cinta']			= $this->M_login->get_paket("CT1K9");
		$data['d_cinta']		= $this->M_login->get_paket_d("CT1K9");

		$data['module'] 		= "login";
		$data['fileview'] 	= "package";
		echo Modules::run('template/Template_daftar', $data);
	}

	public function daftar($kode_paket){
		if ($this->M_login->get_paket($kode_paket) == TRUE) {
			$data['paket']			= $this->M_login->get_paket($kode_paket);

			$data['module'] 		= "login";
			$data['fileview'] 		= "daftar";
			echo Modules::run('template/Template_daftar', $data);
		}else {
			$this->session->set_flashdata('error', "Tidak dapat menemukan paket yang anda pilih");
			redirect($this->agent->referrer());
		}
	}

	public function waiting(){
		if ($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')) {
			$email 		= $this->session->userdata('email');

			if ($this->M_login->cek_aktivasi($this->session->userdata('kode_user')) == FALSE) {
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengambil data anda !!');
				redirect(site_url('login'));
			}else {
				$aktivasi = $this->M_login->cek_aktivasi($this->session->userdata('kode_user'));

				if ($aktivasi->STATUS_AKTIVASI == 0) {
					if ($this->send_aktivasi($email, $aktivasi->KODE_AKTIVASI) == TRUE) {

						$data['mail']									= $email;

						$data['module'] 		= "login";
						$data['fileview'] 	= "waiting";
						echo Modules::run('template/Template_daftar', $data);

					}else {
						$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirimkan pesan ke email anda !!');
						redirect(site_url('hold-verification'));
					}
				}else {
					$this->session->set_flashdata('success', 'Harap isi data diri pernikahan, untuk dapat melanjutkan ke dashboard !!');
					redirect(site_url('isi-data-pernikahan'));
				}
			}

		}else {
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->unset_userdata('redirect');
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}
	}

	public function aktivasi_email(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$email 		= $this->session->userdata('email');

			if ($this->M_login->cek_aktivasi($this->session->userdata('kode_user')) == FALSE) {
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengambil data anda !!');
				redirect(site_url('login'));
			}else {
				$aktivasi = $this->M_login->cek_aktivasi($this->session->userdata('kode_user'));

				if ($aktivasi->STATUS_AKTIVASI == 0) {
					if ($this->send_aktivasi($email, $aktivasi->KODE_AKTIVASI) == TRUE) {

						$data['mail']									= $email;
						$data['kode_aktivasi']				= $aktivasi->KODE_AKTIVASI;

						$data['module'] 		= "login";
						$data['fileview'] 	= "aktivasi";
						echo Modules::run('template/Template_daftar', $data);

					}else {
						$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirimkan pesan ke email anda !!');
						redirect(site_url('hold-verification'));
					}
				}else {
					$this->session->set_flashdata('success', 'Harap isi data diri pernikahan, untuk dapat melanjutkan ke dashboard !!');
					redirect(site_url('isi-data-pernikahan'));
				}
			}
		}else {
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->unset_userdata('redirect');
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}
	}

	public function data_pernikahan(){
		if ($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')) {

			$aktivasi = $this->M_login->cek_aktivasi($this->session->userdata('kode_user'));

			if ($aktivasi->STATUS_AKTIVASI == 0) {
				$this->session->set_flashdata('error', 'Harap melakukan aktivasi email terlebih dahulu !!');
				redirect(site_url('hold-verification'));
			}else {
				$data['kode_user']	= $this->session->userdata('kode_user');
				$data['nama']				= $this->session->userdata('nama');
				$paket 							= $this->M_login->paket_user($this->session->userdata('kode_user'));
				$data['paket']		  = $paket;
				$data['theme']		  = $this->M_login->get_theme($paket->KODE_PAKET);

				$data['module'] 		= "login";
				$data['fileview'] 	= "data_pernikahan";
				echo Modules::run('template/Template_daftar', $data);
			}
		}else {
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->unset_userdata('redirect');
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}
	}

	//PROCESS

	function auth(){
		$email   			= htmlspecialchars($this->input->post('email', true));
		$pass        	= htmlspecialchars($this->input->post('password'), true);

		if ($this->M_login->get_auth($email) == FALSE) {
			$this->session->set_flashdata('error', 'Pengguna tidak terdaftar !!');
			redirect('login');
		}else{

			$pengguna = $this->M_login->get_auth($email);

			if(password_verify($pass, $pengguna->PASSWORD)){
				$sessiondata = array(
					'kode_user'     => $pengguna->KODE_USER,
					'email'         => $pengguna->EMAIL,
					'nama'       		=> $pengguna->NAMA,
					'role'       		=> $pengguna->ROLE,
					'logged_in' 		=> TRUE
				);

				$this->session->set_userdata($sessiondata);

				if ($pengguna->ROLE == 0) {
					if ($this->session->userdata('redirect')) {
						$this->session->set_flashdata('success', 'Hai, anda telah login. Silahkan melanjutkan aktivitas anda !!');
						redirect($this->session->userdata('redirect'));
					} else {
						$this->session->set_flashdata('success', "Selamat Datang, {$pengguna->NAMA}");
						redirect(site_url('dashboard'));
					}
				}elseif ($pengguna->ROLE == 1) {

					$aktivasi = $this->M_login->cek_aktivasi($pengguna->KODE_USER);

					if ($aktivasi->STATUS_AKTIVASI == 0) {
						$this->session->set_flashdata('error', 'Harap melakukan aktivasi email terlebih dahulu !!');
						redirect(site_url('hold-verification'));
					}else{
						$queue = $this->M_login->cek_queue($pengguna->KODE_USER);

						if ($queue->STATUS_QUEUE == 0) {
							$this->session->set_flashdata('success', 'Harap isi data diri pernikahan, untuk dapat melanjutkan ke dashboard !!');
							redirect(site_url('isi-data-pernikahan'));
						}else{
							if ($this->session->userdata('redirect')) {
								$this->session->set_flashdata('success', 'Hai, anda telah login. Silahkan melanjutkan aktivitas anda !!');
								redirect($this->session->userdata('redirect'));
							} else {
								$this->session->set_flashdata('success', "Selamat Datang, {$pengguna->NAMA}");
								redirect(site_url('dashboard'));
							}
						}
					}
				}else{
					$this->session->set_flashdata('error', 'Hak akses bermasalah !!');
					redirect($this->agent->referrer());
				}

			}else{
				$this->session->set_flashdata('error', 'Password yang anda masukkan SALAH !!');
				redirect($this->agent->referrer());
			}
		}
	}

	public function register(){
		$email        = htmlspecialchars($this->input->post('email'), true);
		$kode_paket   = htmlspecialchars($this->input->post('kode_paket'), true);

		if ($this->input->post('score') > 37.5) {

			if ($this->M_login->get_auth($email) == FALSE) {

				if ($this->M_login->register() == TRUE) {

					$pengguna = $this->M_login->get_auth($email);

					$sessiondata = array(
						'kode_user'     => $pengguna->KODE_USER,
						'email'         => $pengguna->EMAIL,
						'nama'       		=> $pengguna->NAMA,
						'role'       		=> $pengguna->ROLE,
						'logged_in' 		=> TRUE
					);

					$this->session->set_userdata($sessiondata);

					redirect(site_url('email-verification'));

				}else {
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mendaftarkan diri anda !!');
					redirect($this->agent->referrer());
				}

			}else{
				$this->session->set_flashdata('error', 'Email telah digunakan !!');
				redirect($this->agent->referrer());
			}
		}else{
			$this->session->set_flashdata('error', 'Kombinasi password anda tidak mencukupi !!');
			redirect($this->agent->referrer());
		}
	}

	function aktivasi_akun(){

		if ($this->session->userdata('logged_in') == TRUE || $this->session->userdata('logged_in')) {

			$kode_aktivasi = $this->input->post('kode_aktivasi');

			if ($this->M_login->aktivasi_kode(str_replace('-', '', $kode_aktivasi)) > 0) {
				if ($this->M_login->aktivasi_akun($this->session->userdata('kode_user')) == TRUE) {
					$this->session->set_flashdata('success', 'Berhasil aktivasi akun, harap isi data pernikahan anda !!');
					redirect(site_url('isi-data-pernikahan'));
				}else {
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mencoba meng-aktivasi akun anda !!');
					redirect($this->agent->referrer());
				}
			}else {
				$this->session->set_flashdata('error', 'Kode yang anda masukkan salah, cek kembali email anda !!');
				redirect($this->agent->referrer());
			}

		}else {
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->unset_userdata('redirect');
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}

	}


	function send_aktivasi($email, $kode_aktivasi){

		$message = "Kode aktivasi anda <b>{$kode_aktivasi}</b>";

		$mail = array(
			'to' 				=> $email,
			'subject'		=> "Kode Aktivasi Akun AWeddy anda",
			'message'		=> $message
		);

		if ($this->mailer->send($mail) == TRUE) {
			return true;
		}else {
			return false;
		}
	}

	function kirim_pendaftaran(){

	}

	public function lupapin(){
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Berhasil keluar!');
		redirect(base_url());
	}

}
