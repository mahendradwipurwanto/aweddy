<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_dashboard']);
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap login ke akun anda, untuk melanjutkan");
			redirect('login');
		}

		$pengguna 	= $this->M_dashboard->cek_aktivasi($this->session->userdata('kode_user'));
		$queue 			= $this->M_dashboard->cek_queue($this->session->userdata('kode_user'));

		if ($pengguna->STATUS_AKTIVASI == 0) {
			redirect(site_url('hold-verification'));
		}elseif ($queue->STATUS_QUEUE == 0) {
			$this->session->set_flashdata('success', 'Harap isi data diri pernikahan, untuk dapat melanjutkan ke dashboard !!');
			redirect(site_url('isi-data-pernikahan'));
		}
	}

	public function index(){
		$data['module'] 		= "dashboard";
		$data['fileview'] 	= "dashboard";
		echo Modules::run('template/Template_main', $data);
	}

}
