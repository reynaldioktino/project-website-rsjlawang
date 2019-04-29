<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('M_login');
		$this->load->library(array('session'));
		$this->load->library('user_agent'); //deklarasi mengaktifkan library pagination 
	} 

	public function index()
	{
		if($this->session->userdata('level') == "0") {  
			redirect(base_url('C_admin'));  
		} else if ($this->session->userdata('level') == "1") {
			redirect(base_url('C_menu1')); 
		} else if ($this->session->userdata('level') == "2") {
			redirect(base_url('C_menu2')); 
		} else if ($this->session->userdata('level') == "3") {
			redirect(base_url('C_menu3'));
		}
	}

	function aksi_login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$cek=$this->M_login->cek_login($username,$password);
		if($cek>0){//jika ada ditabel
			$data_session=array(
					'username'=>$cek->username,
					'level'=> $cek->level
				);
			$this->session->set_userdata($data_session);  
			if($this->session->userdata('level')==0) {   
				redirect('C_admin');  
			}elseif($this->session->userdata('level')==1) {   
				redirect('C_menudokter');  
			}elseif($this->session->userdata('level')==2) {   
				redirect('C_menuperawat');  
			}elseif($this->session->userdata('level')==3) {
				redirect('C_menuapoteker');
			}elseif($this->session->userdata('level')==4) {
				redirect('C_menukeluarga');
			}

		}else{
			echo "<script type=\"text/javascript\"> alert('username dan password salah!'); </script>";
			redirect('C_login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('C_menu');
	}
}