<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tindakan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_tindakan');
		$this->load->model('M_login');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_tindakan->getTindakan();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_tindakan->getTindakanWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$uname = $this->session->userdata('username');
		$id_dokter = $this->M_login->getIdUser($uname)->id;
		$dat = array(
			'id_tindakan'	=>	$this->input->post(''),
			'id_dokter'	=>	$id_dokter,
			'id_perawat'	=>	$this->input->post('id_perawat'),
			'id_periksa'	=>	$this->input->post('id_periksa'),
			'id_ruangan'	=>	$this->input->post('id_ruangan'),
			'tgl_tindakan'	=>	$this->input->post('tgl_tindakan'),
			'id_icd9'	=>	$this->input->post('id_icd9'),
			'catatan'	=>	$this->input->post('catatan')
		);
		$data=$this->M_tindakan->insert($dat);
		redirect('C_menudokter/tindakan');
	}

	public function update(){
		$dat=array(
			'id_tindakan'	=>	$this->input->post('id_tindakan'),
			'id_dokter'	=>	$this->input->post('id_dokter'),
			'id_perawat'	=>	$this->input->post('id_perawat'),
			'id_periksa'	=>	$this->input->post('id_periksa'),
			'id_ruangan'	=>	$this->input->post('id_ruangan'),
			'tgl_tindakan'	=>	$this->input->post('tgl_tindakan'),
			'id_icd9'	=>	$this->input->post('id_icd9'),
			'catatan'	=>	$this->input->post('catatan')
		);
		$where=$this->input->post('id_tindakan');
		$data=$this->M_tindakan->update($dat, $where);
		echo json_encode($data);
	}

	public function delete($id_tindakan){
		$data=$this->M_tindakan->delete($id_tindakan);
		redirect('C_menudokter/tindakan');
	}
}