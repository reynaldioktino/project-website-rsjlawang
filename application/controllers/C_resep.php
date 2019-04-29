<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_resep extends CI_Controller {

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

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_resep->getResepWhereIdEdit($id);
        echo json_encode($data);
    }

	public function update(){
		$dat=array(
			'kode'=>$this->input->post('kode'),
			'keterangan'=>$this->input->post('keterangan'),
			'status'=>$this->input->post('status')
		);
		$where=$this->input->post('id_resep');
		$data=$this->M_resep->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_resep->delete($where);
		echo json_encode($data);
	}
	
}