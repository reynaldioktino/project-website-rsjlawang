<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_periksa extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_periksa');
		$this->load->model('M_pendaftaran');
		$this->load->model('M_resep');
		$this->load->model('M_detailResep');
		$this->load->model('M_resep');
		$this->load->model('M_diagnosaSekunder');
		$this->load->model('M_antrian');
	}

	public function getAjax()
	{
		$data['data'] = $this->M_periksa->getPeriksa();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_periksa->getPeriksaWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$kode_periksa = $this->input->post('kode');
		$username = $this->session->userdata('username');
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$id_dokter = $this->M_login->getIdUser($username)->id;
		$id_pendaftaran = $this->M_pendaftaran->getIdPendaftaran($no_pendaftaran)->id_pendaftaran;
		$periksa = array(
			'id_periksa'	=>	$this->input->post(''),
			'kode'	=>	$kode_periksa,
			'id_pendaftaran'	=>	$id_pendaftaran,
			'id_dokter'	=>	$id_dokter,
			'tgl_periksa'	=>	$this->input->post('tgl_periksa'),
			'keluhan'	=>	$this->input->post('keluhan'),
			'id_icd10'	=>	$this->input->post('id_icd10'),
			'catatan'	=>	$this->input->post('catatan'),
			'kondisi_umum'	=>	$this->input->post('kondisi_umum'),
			'foto'	=>	"foto.jpg"
		);
		$dataPeriksa = $this->M_periksa->insert($periksa);
		$id_periksa = $this->M_periksa->getIdPeriksa($kode_periksa)->id_periksa;


		$diagnosa = array(
			'id'	=>	$this->input->post(''),
			'id_periksa'	=>	$id_periksa,
			'id_icd10'	=>	$this->input->post('id_icd10_sekunder'),
		);
		$dataDiagnosa = $this->M_diagnosaSekunder->insert($diagnosa);


		$kode_resep = $this->input->post('kode_resep');	
		$resep = array(
			'id_resep'	=>	$this->input->post(''),
			'kode'	=>	$kode_resep,
			'id_periksa'	=>	$id_periksa,
			'keterangan'	=>	$this->input->post('keterangan'),
			'status'	=>	"Pending",
		);
		$dataresep = $this->M_resep->insert($resep);


		$id_resep = $this->M_resep->getIdResep($kode_resep)->id_resep;
		$detailResep = array(
			'id'	=>	$this->input->post(''),
			'id_resep'	=>	$id_resep,
			'id_obat'	=>	$this->input->post('obat'),
			'aturan'	=>	$this->input->post('aturan')
		);
		$datadetailResep = $this->M_detailResep->insert($detailResep);


		$updateStatus = $this->M_antrian->updateStatus($id_pendaftaran);

		redirect('C_menudokter/antrian');
	}

	public function update(){
		$dat=array(
			'id_periksa'=>$this->input->post('id_periksa'),
			'tgl_periksa'=>$this->input->post('tgl_periksa'),
			'keluhan'=>$this->input->post('keluhan'),
			'id_icd10'=>$this->input->post('id_icd10'),
			'catatan'=>$this->input->post('catatan'),
			'kondisi_umum'=>$this->input->post('kondisi_umum')
		);
		$where=$this->input->post('id_periksa');
		$data=$this->M_periksa->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_periksa->delete($where);
		echo json_encode($data);
	}
}