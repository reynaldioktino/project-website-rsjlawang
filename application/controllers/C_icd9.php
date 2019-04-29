<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_icd9 extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_icd9');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_icd9->getIcd9();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_icd9->getIcd9WhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id'	=>	$this->input->post('id'),
			'kode'	=>	$this->input->post('kode'),
			'keterangan'	=>	$this->input->post('keterangan'),
		);
		$data=$this->M_icd9->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id'=>$this->input->post('id'),
			'kode'=>$this->input->post('kode'),
			'keterangan'=>$this->input->post('keterangan')
		);
		$where=$this->input->post('id');
		$data=$this->M_icd9->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('id');
		$data=$this->M_icd9->delete($where);
		echo json_encode($data);
	}
}