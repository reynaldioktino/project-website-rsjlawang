<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_perawat extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_perawat');
		$this->load->model('M_user');
	}

	public function index()
	{
		if($this->session->userdata('level') == "0") {  
			redirect(base_url('C_admin'));  
		} else if ($this->session->userdata('level') == "3") {
			redirect(base_url('C_apoteker')); 
		} else if ($this->session->userdata('level') == "1") {
			redirect(base_url('C_dokter'));
		} else if ($this->session->userdata('level') == "4") {
			redirect(base_url('C_keluarga'));
		}
		$this->load->view('perawat/index');
	}

	public function getAjax()
	{
		$data['data'] = $this->M_perawat->getPerawat();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_perawat->getPerawatWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id_perawat'	=>	$this->input->post('id_perawat'),
			'id_user'	=>	$this->input->post('id_user'),
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'jk'	=>	$this->input->post('jk')
		);
		$data=$this->M_perawat->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id_perawat'	=>	$this->input->post('id_perawat'),
			'id_user'	=>	$this->input->post('id_user'),
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'jk'	=>	$this->input->post('jk')
		);
		$where=$this->input->post('id_perawat');
		$data=$this->M_perawat->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_perawat->delete($where);
		echo json_encode($data);
	}
}