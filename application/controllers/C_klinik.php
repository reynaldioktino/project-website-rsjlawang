<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_klinik extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_klinik');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_klinik->getKlinik();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_klinik->getKlinikWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_klinik' => $this->input->post(''),
			'kode'	=>	$this->input->post('kode'),
			'nama'	=>	$this->input->post('nama')
		);
		$data=$this->M_klinik->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'kode'=>$this->input->post('kode'),
			'nama'=>$this->input->post('nama'),
		);
		$where=$this->input->post('id_klinik');
		$data=$this->M_klinik->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_klinik->delete($where);
		echo json_encode($data);
	}
}