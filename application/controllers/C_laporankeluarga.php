<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporankeluarga extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_keluarga');
		$this->load->model('M_pasien');
		$this->load->model('M_user');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$uname = $this->session->userdata('username');
		$id_user = $this->M_user->getIdUser($uname);
		$id_pasien = $this->M_pasien->getIdWhereKeluarga($id_user);
		//var_dump($id_pasien);
		$data['data'] = $this->M_keluarga->getLaporan($id_pasien);
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_keluarga->getRuangWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_ruangan'	=>	$this->input->post('id_ruangan'),
			'nama'	=>	$this->input->post('nama'),
			'kapasitas'	=>	$this->input->post('kapasitas'),
		);
		$data=$this->M_keluarga->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_ruangan'=>$this->input->post('id_ruangan'),
			'nama'=>$this->input->post('nama'),
			'kapasitas'=>$this->input->post('kapasitas')
		);
		$where=$this->input->post('id_ruangan');
		$data=$this->M_keluarga->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_keluarga->delete($where);
		echo json_encode($data);
	}
}