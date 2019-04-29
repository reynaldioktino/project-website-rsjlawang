<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_detailresep extends CI_Controller {

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

	public function getAjax($id_resep)
	{
		//$id_resep = $this->uri->segment(4);
		$data['data'] = $this->M_detailResep->getDetailResep($id_resep);
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_detailResep->getDetailResepWhereIdEdit($id);
        echo json_encode($data);
    }

	public function update(){
		$dat=array(
			'id_obat'	=>	$this->input->post('id_obat'),
			'aturan'	=>	$this->input->post('aturan')
		);
		$where=$this->input->post('id');
		$data=$this->M_detailResep->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_detailResep->delete($where);
		echo json_encode($data);
	}
	
}