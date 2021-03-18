<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_auto']);
	}

	public function test(){

		$msg = 'My secret message';

		$encrypted_string = $this->encrypt->encode($msg);

		echo "Encryption:".$encrypted_string;

		echo "\nDecryption".$this->encrypt->decode($encrypted_string);

		
	}

	public function test2(){
		echo random_string('numeric', 6);
	}

	public function index(){
		$data['module'] 	= "Auto";
		$data['fileview'] 	= "auto";
		echo Modules::run('template/template_main', $data);
	}

	public function error404(){
		$data['module'] 	= "auto";
		$data['fileview'] 	= "error404";
		echo Modules::run('template/template_error', $data);
	}

}
