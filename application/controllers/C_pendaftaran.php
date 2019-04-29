<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pendaftaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_pendaftaran');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_pendaftaran->getPendaftaran();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_pendaftaran->getPendaftaranWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_pendaftaran'	=>	$this->input->post(''),
			'no_pendaftaran'	=>	$this->input->post('no_pendaftaran'),
			'id_pasien'	=>	$this->input->post('id_pasien'),
			'rujukan'	=>	$this->input->post('rujukan'),
			'id_klinik'	=>	$this->input->post('id_klinik'),
			'tgl_masuk'	=>	$this->input->post('tgl_masuk'),
			'status'	=>	"antri",
			'no_antrian'	=>	$this->input->post('no_antrian')
		);
		$data=$this->M_pendaftaran->insert($dat);
		redirect('C_admin/pendaftaran');
	}

	public function update(){
		$dat=array(
			'id_pendaftaran'	=>	$this->input->post('id_pendaftaran'),
			'no_pendaftaran'	=>	$this->input->post('no_pendaftaran'),
			'id_pasien'	=>	$this->input->post('id_pasien'),
			'rujukan'	=>	$this->input->post('rujukan'),
			'id_klinik'	=>	$this->input->post('id_klinik'),
			'tgl_masuk'	=>	$this->input->post('tgl_masuk'),
			'status'	=>	$this->input->post('status'),
			'no_antrian'	=>	$this->input->post('no_antrian')
		);
		$where=$this->input->post('id_pendaftaran');
		$data=$this->M_pendaftaran->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->uri->segment('3');
		$data=$this->M_pendaftaran->delete($where);
		redirect('C_admin/pendaftaran');
	}

	public function antrian() {
		
	}
}