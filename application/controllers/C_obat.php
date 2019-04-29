<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_obat extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_obat');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_obat->getObat();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_obat->getObatWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id' => $this->input->post(''),
			'nama'	=>	$this->input->post('nama')
		);
		$data=$this->M_obat->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'nama'=>$this->input->post('nama')
		);
		$where=$this->input->post('id');
		$data=$this->M_obat->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_obat->delete($where);
		echo json_encode($data);
	}
}