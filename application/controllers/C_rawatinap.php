<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rawatinap extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_rawatinap');
		$this->load->model('M_ruangan');
		$this->load->model('M_pendaftaran');
		$this->load->model('M_obat');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_rawatinap->getRawatinap();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_rawatinap->getRawatinapWhereIdEdit($id);
        echo json_encode($data);
    }

	public function update(){
		$dat=array(
			'id_rawatinap'=>$this->input->post('id_rawatinap'),
			'tgl_masuk'=>$this->input->post('tgl_masuk'),
			'tgl_keluar'=>$this->input->post('tgl_keluar'),
			'status'	=>	$this->input->post('status'),
			'keterangan'	=>	$this->input->post('keterangan'),
		);
		$where=$this->input->post('id_rawatinap');
		$data=$this->M_rawatinap->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_rawatinap->delete($where);
		echo json_encode($data);
	}
}