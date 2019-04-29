<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_antrian extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_antrian');
		$this->load->model('M_icd10');
		$this->load->model('M_pendaftaran');
		$this->load->model('M_obat');
		$this->load->model('M_dokter');
		$this->load->model('M_periksa');
		$this->load->model('M_resep');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_antrian->getPendaftaran();
		echo json_encode($data);
	}

	public function proses($id) {
		$maxid = $this->M_periksa->getMaxId();
		$data['id_periksa'] = "PER00".$maxid;
		$maxid1 = $this->M_resep->getMaxId();
		$data['kode_resep'] = "RSP0".$maxid1;
		$data['pasien'] = $this->M_pendaftaran->getPendaftaranId($id);
		$data['icd10'] = $this->M_icd10->getIcd10();
		$data['obat'] = $this->M_obat->getObat();
		$data['id_pendaftaran'] = $id;
		$uname = $this->session->userdata('username');
		$data['dokter'] = $this->M_dokter->namaDokter($uname);
		//$this->M_antrian->updateStatus($id);
		$this->load->view('dokter/periksa', $data);
	}
}