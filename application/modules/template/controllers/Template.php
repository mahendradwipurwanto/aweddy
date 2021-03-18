<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_template']);
	}

	public function Template_error($data){
		$data['appname']			= "";
		$data['description']	= "";
		$data['logo']					= "logo.png";
		$this->load->view('template_error', $data);
	}

	public function Template_login($data){
		$data['appname']			= "";
		$data['description']	= "";
		$data['logo']					= "logo.png";
		$this->load->view('template_login', $data);
	}

	public function Template_daftar($data){
		$data['appname']			= "";
		$data['description']	= "";
		$data['logo']					= "logo.png";
		$this->load->view('template_daftar', $data);
	}

	public function Template_main($data){
		$data['appname']			= "";
		$data['description']	= "";
		$data['logo']					= "logo.png";
		$this->load->view('template_main', $data);
	}

}
