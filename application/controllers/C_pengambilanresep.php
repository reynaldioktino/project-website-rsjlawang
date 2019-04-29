<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengambilanresep extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_resep');
		$this->load->model('M_detailResep');
		$this->load->model('M_pendaftaran');
		$this->load->model('M_obat');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_resep->getResep();
		echo json_encode($data);
	}

	public function detailresep($kode_resep) {
		$data['resep'] = $this->M_resep->getResepWhereId($kode_resep);
		$id_resep = $this->M_resep->getIdResep($kode_resep)->id_resep;
		$data['obat'] = $this->M_detailResep->getObatWhereIdResep($id_resep);
		$this->load->view('apoteker/detailresep', $data);
	}

	public function ambilresep() {
		$id_resep = $this->input->post('id_resep');
		$data = array (
			'status'	=> "Konfirmasi"
		);
		$update = $this->M_resep->update($data, $id_resep);
		redirect('C_menuapoteker/pengambilanresep');
	}
}