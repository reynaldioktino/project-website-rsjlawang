<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menukeluarga extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('keluarga/index');
	}

	public function laporan() {
		$this->load->view('keluarga/laporan');
	}
}