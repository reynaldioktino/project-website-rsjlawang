<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menuapoteker extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('apoteker/index');
	}

	public function pengambilanresep() {
		$this->load->view('apoteker/pengambilanresep');
	}

}