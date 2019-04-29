<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_apoteker extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_apoteker');
	}

	public function index()
	{
		if($this->session->userdata('level') == "0") {  
			redirect(base_url('C_admin'));  
		} else if ($this->session->userdata('level') == "2") {
			redirect(base_url('C_perawat')); 
		} else if ($this->session->userdata('level') == "1") {
			redirect(base_url('C_dokter'));
		} else if ($this->session->userdata('level') == "4") {
			redirect(base_url('C_keluarga'));
		}
		$this->load->view('apoteker/index');
	}

	public function getAjax()
	{
		$data['data'] = $this->M_apoteker->getApoteker();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_apoteker->getApotekerWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'id'	=>	$this->input->post('id'),
			'id_user'	=>	$this->input->post('id_user'),
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'jk'	=>	$this->input->post('jk')
		);
		$data=$this->M_apoteker->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'id'	=>	$this->input->post('id'),
			'id_user'	=>	$this->input->post('id_user'),
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'alamat'	=>	$this->input->post('alamat'),
			'no_tlp'	=>	$this->input->post('no_tlp'),
			'jk'	=>	$this->input->post('jk')
		);
		$where=$this->input->post('id');
		$data=$this->M_apoteker->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_apoteker->delete($where);
		echo json_encode($data);
	}
}