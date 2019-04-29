<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dokter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_dokter');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_dokter->getDokter();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_dokter->getDokterWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_dokter'	=>	$this->input->post(''),
			'id_user'	=>	$this->input->post('id_user'),
			'id_klinik'	=>	$this->input->post('id_klinik'),
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'jk'	=>	$this->input->post('jk')
		);
		$data=$this->M_dokter->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_dokter'	=>	$this->input->post('id_dokter'),
			'id_user'	=>	$this->input->post('id_user'),
			'id_klinik'	=>	$this->input->post('id_klinik'),
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'jk'	=>	$this->input->post('jk')
		);
		$where=$this->input->post('id_dokter');
		$data=$this->M_dokter->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_dokter->delete($where);
		echo json_encode($data);
	}
}