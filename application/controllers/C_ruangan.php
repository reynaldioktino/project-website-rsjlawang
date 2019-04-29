<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ruangan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_ruangan');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_ruangan->getRuang();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_ruangan->getRuangWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_ruangan'	=>	$this->input->post('id_ruangan'),
			'nama'	=>	$this->input->post('nama'),
			'kapasitas'	=>	$this->input->post('kapasitas'),
		);
		$data=$this->M_ruangan->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_ruangan'=>$this->input->post('id_ruangan'),
			'nama'=>$this->input->post('nama'),
			'kapasitas'=>$this->input->post('kapasitas')
		);
		$where=$this->input->post('id_ruangan');
		$data=$this->M_ruangan->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_ruangan->delete($where);
		echo json_encode($data);
	}
}