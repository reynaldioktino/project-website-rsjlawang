<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menudokter extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('M_dokter');
		$this->load->model('M_icd9');
		$this->load->model('M_perawat');
		$this->load->model('M_periksa');
		$this->load->model('M_ruangan');
		$this->load->model('M_icd10');
	}

	public function index()
	{
		$this->load->view('dokter/index');
	}

	public function icd9()
	{
		$this->load->view('dokter/icd9');
	}

	public function icd10()
	{
		$this->load->view('dokter/icd10');
	}

	public function antrian() {
		$this->load->view('dokter/antrian');
	}

	public function periksa() {
		$data['icd10'] = $this->M_icd10->listIcd10();
		$this->load->view('dokter/dataperiksa', $data);
	}

	public function tindakan() {
		$uname = $this->session->userdata('username');
		$data['dokter'] = $this->M_dokter->namaDokter($uname);
		$data['icd9'] = $this->M_icd9->listIcd9();
		$data['dokterlist'] = $this->M_dokter->listDokter();
		$data['perawat'] = $this->M_perawat->listPerawat();
		$data['periksa'] = $this->M_periksa->listPeriksa();
		$data['ruangan'] = $this->M_ruangan->listRuang();
		$this->load->view('dokter/tindakan', $data);
	}

}