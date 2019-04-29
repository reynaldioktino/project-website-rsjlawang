<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menuperawat extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_pendaftaran');
		$this->load->model('M_ruangan');
	}

	public function index()
	{
		$this->load->view('perawat/index');
	}

	public function pasienmasuk() {
		$data['pendaftaran'] = $this->M_pendaftaran->listPendaftaran();
		$data['ruang'] = $this->M_ruangan->listRuang();
		$this->load->view('perawat/pasienmasuk', $data);
	}

	public function pindahruangan() {
		$this->load->view('perawat/pindahruangan');
	}

	public function pasienkeluar() {
		$this->load->view('perawat/pasienkeluar');
	}

}