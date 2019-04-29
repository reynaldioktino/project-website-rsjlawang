<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pasien extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_pasien');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_pasien->getPasien();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_pasien->getPasienWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_pasien'	=>	$this->input->post(''),
			'no_rm'	=>	$this->input->post('no_rm'),
			'no_ktp'	=>	$this->input->post('no_ktp'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'jk'	=>	$this->input->post('jk'),
			'tempat_lahir'	=>	$this->input->post('tempat_lahir'),
			'tanggal_lahir'	=>	$this->input->post('tanggal_lahir'),
			'umur'	=>	$this->input->post('umur'),
			'status'	=>	$this->input->post('status'),
			'pendidikan'	=>	$this->input->post('pendidikan'),
			'pekerjaan'	=>	$this->input->post('pekerjaan')
		);
		$data=$this->M_pasien->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_pasien'	=>	$this->input->post('id_pasien'),
			'no_rm'	=>	$this->input->post('no_rm'),
			'no_ktp'	=>	$this->input->post('no_ktp'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'jk'	=>	$this->input->post('jk'),
			'tempat_lahir'	=>	$this->input->post('tempat_lahir'),
			'tanggal_lahir'	=>	$this->input->post('tanggal_lahir'),
			'umur'	=>	$this->input->post('umur'),
			'status'	=>	$this->input->post('status'),
			'pendidikan'	=>	$this->input->post('pendidikan'),
			'pekerjaan'	=>	$this->input->post('pekerjaan')
		);
		$where=$this->input->post('id_pasien');
		$data=$this->M_pasien->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_pasien->delete($where);
		echo json_encode($data);
	}
}