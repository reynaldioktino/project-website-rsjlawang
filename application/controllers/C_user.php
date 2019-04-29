<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index()
	{
		
	}

	public function getAjax()
	{
		$data['data'] = $this->M_user->getUser();
		echo json_encode($data);
	}

	public function where(){
        $id=$this->input->get('id');
        $data=$this->M_user->getUserWhereId($id);
        echo json_encode($data);
    }

	public function add(){
		$dat = array(
			'username'	=>	$this->input->post('username'),
			'password'	=>	md5($this->input->post('password')),
			'level'	=>	$this->input->post('level'),
		);
		$data=$this->M_user->insert($dat);
		echo json_encode($data);
	}

	public function update(){
		$dat=array(
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password')),
			'level'=>$this->input->post('level')
		);
		$where=$this->input->post('id');
		$data=$this->M_user->update($dat, $where);
		echo json_encode($data);
	}

	public function delete(){
		$where=$this->input->post('kode');
		$data=$this->M_user->delete($where);
		echo json_encode($data);
	}
}