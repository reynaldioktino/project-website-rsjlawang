<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_icd10 extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_icd10');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_icd10->getIcd10();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_icd10->getIcd10WhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id'	=>	$this->input->post('id'),
			'icd_kode'	=>	$this->input->post('icd_kode'),
			'jenis_penyakit'	=>	$this->input->post('jenis_penyakit'),
			'sebabpenyakit'	=>	$this->input->post('sebabpenyakit'),
		);
		$data=$this->M_icd10->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id'=>$this->input->post('id'),
			'icd_kode'=>$this->input->post('icd_kode'),
			'jenis_penyakit'=>$this->input->post('jenis_penyakit'),
			'sebabpenyakit'	=>	$this->input->post('sebabpenyakit'),
		);
		$where=$this->input->post('id');
		$data=$this->M_icd10->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_icd10->delete($where);
		echo json_encode($data);
	}
}