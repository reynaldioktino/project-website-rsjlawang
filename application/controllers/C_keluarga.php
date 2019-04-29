<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_keluarga extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_keluarga');
		$this->load->model('M_pasien');
	}

	public function index()
	{
		if($this->session->userdata('level') == "0") {  
			redirect(base_url('C_admin'));  
		} else if ($this->session->userdata('level') == "2") {
			redirect(base_url('C_perawat')); 
		} else if ($this->session->userdata('level') == "1") {
			redirect(base_url('C_dokter'));
		} else if ($this->session->userdata('level') == "3") {
			redirect(base_url('C_apoteker'));
		}
		$this->load->view('keluarga/index');
	}

	public function getAjax()
	{
		$data['data'] = $this->M_keluarga->getKeluarga();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_keluarga->getKeluargaWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id'	=>	$this->input->post('id'),
			'id_pasien'	=>	$this->input->post('id_pasien'),
			'id_user'	=>	$this->input->post('id_user'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'hubungan'	=>	$this->input->post('hubungan')
		);
		$data=$this->M_keluarga->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id'	=>	$this->input->post('id'),
			'id_pasien'	=>	$this->input->post('id_pasien'),
			'id_user'	=>	$this->input->post('id_user'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'hubungan'	=>	$this->input->post('hubungan')
		);
		$where=$this->input->post('id');
		$data=$this->M_keluarga->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_keluarga->delete($where);
		echo json_encode($data);
	}
}